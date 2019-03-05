<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdCaseHistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdCaseHistoriesTable Test Case
 */
class SdCaseHistoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdCaseHistoriesTable
     */
    public $SdCaseHistories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_case_histories',
        'app.sd_cases',
        'app.sd_workflow_activities',
        'app.sd_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdCaseHistories') ? [] : ['className' => SdCaseHistoriesTable::class];
        $this->SdCaseHistories = TableRegistry::getTableLocator()->get('SdCaseHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdCaseHistories);

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
