<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdFieldValueLookUpsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdFieldValueLookUpsTable Test Case
 */
class SdFieldValueLookUpsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdFieldValueLookUpsTable
     */
    public $SdFieldValueLookUps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_field_value_look_ups',
        'app.sd_fields'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdFieldValueLookUps') ? [] : ['className' => SdFieldValueLookUpsTable::class];
        $this->SdFieldValueLookUps = TableRegistry::getTableLocator()->get('SdFieldValueLookUps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdFieldValueLookUps);

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
