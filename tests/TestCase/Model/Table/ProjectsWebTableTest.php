<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsWebTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsWebTable Test Case
 */
class ProjectsWebTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectsWebTable
     */
    public $ProjectsWeb;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projectsWeb'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectsWeb') ? [] : ['className' => 'App\Model\Table\ProjectsWebTable'];
        $this->ProjectsWeb = TableRegistry::get('ProjectsWeb', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsWeb);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
