<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\StudentTeacherCoursesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\StudentTeacherCoursesController Test Case
 *
 * @uses \App\Controller\StudentTeacherCoursesController
 */
class StudentTeacherCoursesControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\StudentTeacherCoursesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\StudentTeacherCoursesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\StudentTeacherCoursesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\StudentTeacherCoursesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\StudentTeacherCoursesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
