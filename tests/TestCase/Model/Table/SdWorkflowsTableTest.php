<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdWorkflowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdWorkflowsTable Test Case
 */
class SdWorkflowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdWorkflowsTable
     */
    public $SdWorkflows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_workflows',
        'app.sd_phases',
        'app.sd_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdWorkflows') ? [] : ['className' => SdWorkflowsTable::class];
        $this->SdWorkflows = TableRegistry::getTableLocator()->get('SdWorkflows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdWorkflows);

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
