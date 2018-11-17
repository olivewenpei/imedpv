<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdPhasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdPhasesTable Test Case
 */
class SdPhasesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdPhasesTable
     */
    public $SdPhases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_phases',
        'app.sd_workflows',
        'app.sd_cases',
        'app.sd_phase_role_permissions',
        'app.sd_product_assignments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdPhases') ? [] : ['className' => SdPhasesTable::class];
        $this->SdPhases = TableRegistry::getTableLocator()->get('SdPhases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdPhases);

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
