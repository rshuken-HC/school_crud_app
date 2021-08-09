<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * TeacherCourses Controller
 *
 * @property \App\Model\Table\TeacherCoursesTable $TeacherCourses
 * @method \App\Model\Entity\TeacherCourse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TeacherCoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('TeacherCourses');
        $this->paginate = [
            'contain' => ['Courses', 'Teachers'],
        ];
        $teacherCourses = $this->paginate($this->TeacherCourses)->toArray();

        $query = $this->TeacherCourses->find();
        $totalStudents = $query->select(['total_students' => $query->func()
            ->count('StudentTeacherCourses.student_id')])
            ->leftJoinWith('StudentTeacherCourses')
            ->group(['StudentTeacherCourses.teacher_course_id'])
            ->enableAutoFields(true)
            ->toArray();

        $finalResult = Hash::combine($totalStudents, '{n}.id', '{n}.total_students');


        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode(['teacherCourses' => $teacherCourses,'totalStudents' => $finalResult ],1));

        //$this->set(compact('teacherCourses', 'finalResult'));

    }

    /**
     * View method
     *
     * @param string|null $id Teacher Course id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teacherCourse = $this->TeacherCourses->get($id, [
            'contain' => ['Courses', 'Teachers', 'StudentTeacherCourses'],
        ]);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(json_encode($teacherCourse,1));

        //$this->set(compact('teacherCourse'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('TeacherCourses');
        $teacherCourse = $this->TeacherCourses->newEmptyEntity();

        if ($this->request->is('post')) {
            $teacherCourse = $this->TeacherCourses->patchEntity($teacherCourse, $this->request->getData());
            if ($this->TeacherCourses->save($teacherCourse)) {
                $this->Flash->success(__('The teacher course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teacher course could not be saved. Please, try again.'));
        }
        $courses = $this->TeacherCourses->Courses->find('list', ['limit' => 200]);
        $teachers = $this->TeacherCourses->Teachers->find('list', ['limit' => 200]);

        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(
                json_encode([
                    'teachers' => $teachers,
                    'teacherCourse' => $teacherCourse,
                    'courses' => $courses
                ],1));

        //$this->set(compact('teacherCourse', 'courses', 'teachers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Teacher Course id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel('TeacherCourses');

        $teacherCourse = $this->TeacherCourses->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $teacherCourse = $this->TeacherCourses->patchEntity($teacherCourse, $this->request->getData());
            if ($this->TeacherCourses->save($teacherCourse)) {
                $this->Flash->success(__('The teacher course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The teacher course could not be saved. Please, try again.'));
        }
        $courses = $this->TeacherCourses->Courses->find('list', ['limit' => 200]);
        $teachers = $this->TeacherCourses->Teachers->find('list', ['limit' => 200]);
        return $this->response
            ->withType('application/json')
            ->withStatus(200)
            ->withStringBody(
                json_encode([
                    'teachers' => $teachers,
                    'teacherCourse' => $teacherCourse,
                    'courses' => $courses
                ],1));

        //$this->set(compact('teacherCourse', 'courses', 'teachers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Teacher Course id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('TeacherCourses');

        $this->request->allowMethod(['post', 'delete']);
        $teacherCourse = $this->TeacherCourses->get($id);
        if ($this->TeacherCourses->delete($teacherCourse)) {
            $this->Flash->success(__('The teacher course has been deleted.'));
        } else {
            $this->Flash->error(__('The teacher course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
