<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdMedwatchPositionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdMedwatchPositionsTable Test Case
 */
class SdMedwatchPositionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdMedwatchPositionsTable
     */
    public $SdMedwatchPositions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_medwatch_positions',
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
        $config = TableRegistry::getTableLocator()->exists('SdMedwatchPositions') ? [] : ['className' => SdMedwatchPositionsTable::class];
        $this->SdMedwatchPositions = TableRegistry::getTableLocator()->get('SdMedwatchPositions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdMedwatchPositions);

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
