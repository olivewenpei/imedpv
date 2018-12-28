<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdActivityLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdActivityLogsTable Test Case
 */
class SdActivityLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdActivityLogsTable
     */
    public $SdActivityLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_activity_logs',
        'app.sd_users',
        'app.sd_section_values'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdActivityLogs') ? [] : ['className' => SdActivityLogsTable::class];
        $this->SdActivityLogs = TableRegistry::getTableLocator()->get('SdActivityLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdActivityLogs);

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
