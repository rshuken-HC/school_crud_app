<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Student;
use Cake\I18n\Date;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TeacherCourses Model
 *
 * @property \App\Model\Table\CoursesTable&\Cake\ORM\Association\BelongsTo $Courses
 * @property \App\Model\Table\TeachersTable&\Cake\ORM\Association\BelongsTo $Teachers
 * @property \App\Model\Table\StudentTeacherCoursesTable&\Cake\ORM\Association\HasMany $StudentTeacherCourses
 *
 * @method \App\Model\Entity\TeacherCourse newEmptyEntity()
 * @method \App\Model\Entity\TeacherCourse newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TeacherCourse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TeacherCourse get($primaryKey, $options = [])
 * @method \App\Model\Entity\TeacherCourse findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TeacherCourse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TeacherCourse[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TeacherCourse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TeacherCourse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TeacherCourse[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TeacherCourse[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TeacherCourse[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TeacherCourse[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TeacherCoursesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('teacher_courses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
        ]);
        $this->belongsTo('Teachers', [
            'foreignKey' => 'teacher_id',
        ]);
        $this->hasMany('StudentTeacherCourses', [
            'foreignKey' => 'teacher_course_id',
        ]);
        $this->hasOne('TeacherAssistants', [
            'foreignKey' => 'teacher_assistant_id',
        ]);
    }

    public function findTotalCredits(Query $query, $options)
    {
        return $query
            ->formatResults(function ($results, $query) {
                return $results->map(function ($row) use ($query) {
                    $row->total_credits = $this->getTotalCredits($row);
                    $row->total_credits_current = $this->getTotalCredits($row, true);
                    return $row;
                });
            });
    }

    public function getTotalCredits(Student $student, $current = false): int
    {
        $q = $this->StudentTeacherCourses->find()
            ->where(['student_id' => $student->id])
            ->contain(['TeacherCourses', 'TeacherCourses.Courses'])
            ->select(['credits_sum' => 'SUM(Courses.credits)']);
        if ($current) {
            $q->where([
                'TeacherCourses.start_date <=' => new Date(),
                'TeacherCourses.end_date >=' => new Date(),
            ]);
        }
        $res = $q->first();
        return (int)$res->credits_sum;
    }


    public function findTotalStudents(Query $query, $options)
    {
        return $query
            ->formatResults(function ($results) {
                return $results->map(function ($result) {
                    $result->total_students = $this->StudentTeacherCourses->find()->where(['teacher_course_id' =>
                        $result->id])->count();
                    $result->all_my_contacts = "Email: " . $result->email . " Tel: " . $result->phone;


                    return $result;
                });
            });
    }

    public function findAssociations(Query $query, $options)
    {
        return $query->contain([
            'Courses' => function ($q) {
                return $q->select(['id', 'title']);
            },
            'Teachers',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        $validator
            ->date('start_date')
            ->allowEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->allowEmptyDate('end_date');

        $validator
            ->time('start_time')
            ->allowEmptyTime('start_time');

        $validator
            ->time('end_time')
            ->allowEmptyTime('end_time');

        $validator
            ->allowEmptyString('spring_semester');

        $validator
            ->allowEmptyString('summer_semester');

        $validator
            ->allowEmptyString('fall_semester');

        $validator
            ->allowEmptyString('winter_semester');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['course_id'], 'Courses'), ['errorField' => 'course_id']);
        $rules->add($rules->existsIn(['teacher_id'], 'Teachers'), ['errorField' => 'teacher_id']);

        return $rules;
    }
}
