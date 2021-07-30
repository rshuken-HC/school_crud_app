<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StudentTeacherCourses Controller
 *
 * @property \App\Model\Table\StudentTeacherCoursesTable $StudentTeacherCourses
 * @method \App\Model\Entity\StudentTeacherCourse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StudentTeacherCoursesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->loadModel('StudentTeacherCourses');
        $this->paginate = [
            'contain' => ['TeacherCourses', 'Students'],
        ];
        $studentTeacherCourses = $this->paginate($this->StudentTeacherCourses);

        $this->set(compact('studentTeacherCourses'));
    }

    /**
     * View method
     *
     * @param string|null $id Student Teacher Course id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentTeacherCourse = $this->StudentTeacherCourses->get($id, [
            'contain' => ['TeacherCourses', 'Students'],
        ]);

        $this->set(compact('studentTeacherCourse'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('StudentTeacherCourses');
        $studentTeacherCourse = $this->StudentTeacherCourses->newEmptyEntity();
        if ($this->request->is('post')) {
            $studentTeacherCourse = $this->StudentTeacherCourses->patchEntity($studentTeacherCourse, $this->request->getData());
            if ($this->StudentTeacherCourses->save($studentTeacherCourse)) {
                $this->Flash->success(__('The student teacher course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student teacher course could not be saved. Please, try again.'));
        }
        $teacherCourses = $this->StudentTeacherCourses->TeacherCourses->find('list', ['limit' => 200]);
        $students = $this->StudentTeacherCourses->Students->find('list', ['limit' => 200]);
        $this->set(compact('studentTeacherCourse', 'teacherCourses', 'students'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Teacher Course id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // why do I need to add this to each one?
        $this->loadModel('StudentTeacherCourses');
        $studentTeacherCourse = $this->StudentTeacherCourses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentTeacherCourse = $this->StudentTeacherCourses->patchEntity($studentTeacherCourse, $this->request->getData());
            if ($this->StudentTeacherCourses->save($studentTeacherCourse)) {
                $this->Flash->success(__('The student teacher course has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student teacher course could not be saved. Please, try again.'));
        }
        $teacherCourses = $this->StudentTeacherCourses->TeacherCourses->find('list', ['limit' => 200]);
        $students = $this->StudentTeacherCourses->Students->find('list', ['limit' => 200]);
        $this->set(compact('studentTeacherCourse', 'teacherCourses', 'students'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Teacher Course id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('StudentTeacherCourses');

        $this->request->allowMethod(['post', 'delete']);
        $studentTeacherCourse = $this->StudentTeacherCourses->get($id);
        if ($this->StudentTeacherCourses->delete($studentTeacherCourse)) {
            $this->Flash->success(__('The student teacher course has been deleted.'));
        } else {
            $this->Flash->error(__('The student teacher course could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
