<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsInfoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsInfoTable Test Case
 */
class ProjectsInfoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectsInfoTable
     */
    public $ProjectsInfo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projectsinfo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProjectsInfo') ? [] : ['className' => 'App\Model\Table\ProjectsInfoTable'];
        $this->ProjectsInfo = TableRegistry::get('ProjectsInfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsInfo);

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
