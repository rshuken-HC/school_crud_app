<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCourses extends AbstractMigration
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
        $this->table('courses')
            ->addColumn('title', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('subject', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('credits', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }
}
