<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeacherCoursesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeacherCoursesTable Test Case
 */
class TeacherCoursesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TeacherCoursesTable
     */
    protected $TeacherCourses;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.TeacherCourses',
        'app.Courses',
        'app.Teachers',
        'app.StudentTeacherCourses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TeacherCourses') ? [] : ['className' => TeacherCoursesTable::class];
        $this->TeacherCourses = $this->getTableLocator()->get('TeacherCourses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->TeacherCourses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TeacherCoursesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\TeacherCoursesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
