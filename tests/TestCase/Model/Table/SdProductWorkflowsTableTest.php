<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdProductWorkflowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdProductWorkflowsTable Test Case
 */
class SdProductWorkflowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdProductWorkflowsTable
     */
    public $SdProductWorkflows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_product_workflows',
        'app.sd_products',
        'app.sd_workflows',
        'app.sd_users',
        'app.sd_cases',
        'app.sd_user_assignments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdProductWorkflows') ? [] : ['className' => SdProductWorkflowsTable::class];
        $this->SdProductWorkflows = TableRegistry::getTableLocator()->get('SdProductWorkflows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdProductWorkflows);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
