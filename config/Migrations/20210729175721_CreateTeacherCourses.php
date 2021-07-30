<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTeacherCourses extends AbstractMigration
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
        $this->table('teacher_courses')
            ->addColumn('course_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('teacher_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('start_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('end_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('start_time', 'time', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('end_time', 'time', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('spring_semester', 'tinyinteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('summer_semester', 'tinyinteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('fall_semester', 'tinyinteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('winter_semester', 'tinyinteger', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'course_id',
                ]
            )
            ->addIndex(
                [
                    'teacher_id',
                ]
            )
            ->create();

        $this->table('teacher_courses')
            ->addForeignKey(
                'course_id',
                'courses',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->addForeignKey(
                'teacher_id',
                'teachers',
                'id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                ]
            )
            ->update();
    }
}
