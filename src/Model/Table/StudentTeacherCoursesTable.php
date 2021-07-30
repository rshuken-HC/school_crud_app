<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentTeacherCourses Model
 *
 * @property \App\Model\Table\TeacherCoursesTable&\Cake\ORM\Association\BelongsTo $TeacherCourses
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\BelongsTo $Students
 *
 * @method \App\Model\Entity\StudentTeacherCourse newEmptyEntity()
 * @method \App\Model\Entity\StudentTeacherCourse newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse get($primaryKey, $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudentTeacherCourse[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StudentTeacherCoursesTable extends Table
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

        $this->setTable('student_teacher_courses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TeacherCourses', [
            'foreignKey' => 'teacher_course_id',
        ]);
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
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
        $rules->add($rules->existsIn(['teacher_course_id'], 'TeacherCourses'), ['errorField' => 'teacher_course_id']);
        $rules->add($rules->existsIn(['student_id'], 'Students'), ['errorField' => 'student_id']);

        return $rules;
    }
}
