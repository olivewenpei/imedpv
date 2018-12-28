<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdTabsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdTabsTable Test Case
 */
class SdTabsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdTabsTable
     */
    public $SdTabs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_tabs',
        'app.sd_sections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdTabs') ? [] : ['className' => SdTabsTable::class];
        $this->SdTabs = TableRegistry::getTableLocator()->get('SdTabs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdTabs);

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
