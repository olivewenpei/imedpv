<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdActivityLogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdActivityLogTable Test Case
 */
class SdActivityLogTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdActivityLogTable
     */
    public $SdActivityLog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_activity_log',
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
        $config = TableRegistry::getTableLocator()->exists('SdActivityLog') ? [] : ['className' => SdActivityLogTable::class];
        $this->SdActivityLog = TableRegistry::getTableLocator()->get('SdActivityLog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdActivityLog);

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
