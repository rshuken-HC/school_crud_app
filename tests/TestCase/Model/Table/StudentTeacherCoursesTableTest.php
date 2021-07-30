<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentTeacherCoursesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentTeacherCoursesTable Test Case
 */
class StudentTeacherCoursesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentTeacherCoursesTable
     */
    protected $StudentTeacherCourses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StudentTeacherCourses',
        'app.TeacherCourses',
        'app.Students',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StudentTeacherCourses') ? [] : ['className' => StudentTeacherCoursesTable::class];
        $this->StudentTeacherCourses = $this->getTableLocator()->get('StudentTeacherCourses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StudentTeacherCourses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StudentTeacherCoursesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StudentTeacherCoursesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
