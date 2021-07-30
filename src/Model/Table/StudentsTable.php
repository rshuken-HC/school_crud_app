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
 * Students Model
 *
 * @property \App\Model\Table\StudentTeacherCoursesTable&\Cake\ORM\Association\HasMany $StudentTeacherCourses
 *
 * @method \App\Model\Entity\Student newEmptyEntity()
 * @method \App\Model\Entity\Student newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StudentsTable extends Table
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

        $this->setTable('students');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('StudentTeacherCourses', [
            'foreignKey' => 'student_id',
        ]);
    }

    // create method to get total credits for a student

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
        if($current) {
            $q->where([
                'TeacherCourses.start_date <=' => new Date(),
                'TeacherCourses.end_date >=' => new Date(),
            ]);
        }
        $res = $q->first();
        return (int)$res->credits_sum;
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
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->allowEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->allowEmptyString('last_name');

        $validator
            ->scalar('major')
            ->maxLength('major', 255)
            ->allowEmptyString('major');

        return $validator;
    }
}
