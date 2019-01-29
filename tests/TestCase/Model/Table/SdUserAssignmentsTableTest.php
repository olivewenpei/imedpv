<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdUserAssignmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdUserAssignmentsTable Test Case
 */
class SdUserAssignmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdUserAssignmentsTable
     */
    public $SdUserAssignments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_user_assignments',
        'app.sd_product_workflows',
        'app.sd_users',
        'app.sd_workflow_activities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdUserAssignments') ? [] : ['className' => SdUserAssignmentsTable::class];
        $this->SdUserAssignments = TableRegistry::getTableLocator()->get('SdUserAssignments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdUserAssignments);

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
