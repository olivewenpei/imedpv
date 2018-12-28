<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdPhaseRolePermissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdPhaseRolePermissionsTable Test Case
 */
class SdPhaseRolePermissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdPhaseRolePermissionsTable
     */
    public $SdPhaseRolePermissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_phase_role_permissions',
        'app.sd_phases',
        'app.sd_roles',
        'app.sd_phase_role_section_permissions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdPhaseRolePermissions') ? [] : ['className' => SdPhaseRolePermissionsTable::class];
        $this->SdPhaseRolePermissions = TableRegistry::getTableLocator()->get('SdPhaseRolePermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdPhaseRolePermissions);

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
