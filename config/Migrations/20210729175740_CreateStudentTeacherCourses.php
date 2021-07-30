<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateStudentTeacherCourses extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('student_teacher_courses')
            ->addColumn('teacher_course_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('student_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'teacher_course_id',
                ]
            )
            ->addIndex(
                [
                    'student_id',
                ]
            )
            ->create();

        $this->table('student_teacher_courses')
            ->addForeignKey(
                'teacher_course_id',
                'teacher_courses',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->addForeignKey(
                'student_id',
                'students',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();
    }
}
