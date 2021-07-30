<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeachersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeachersTable Test Case
 */
class TeachersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TeachersTable
     */
    protected $Teachers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Teachers',
        'app.TeacherCourses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Teachers') ? [] : ['className' => TeachersTable::class];
        $this->Teachers = $this->getTableLocator()->get('Teachers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Teachers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TeachersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
