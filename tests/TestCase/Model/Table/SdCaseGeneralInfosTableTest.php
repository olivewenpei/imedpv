<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdCaseGeneralInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdCaseGeneralInfosTable Test Case
 */
class SdCaseGeneralInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdCaseGeneralInfosTable
     */
    public $SdCaseGeneralInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_case_general_infos',
        'app.sd_cases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdCaseGeneralInfos') ? [] : ['className' => SdCaseGeneralInfosTable::class];
        $this->SdCaseGeneralInfos = TableRegistry::getTableLocator()->get('SdCaseGeneralInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdCaseGeneralInfos);

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
