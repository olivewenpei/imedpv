<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdPhaseRoleSectionPermissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdPhaseRoleSectionPermissionsTable Test Case
 */
class SdPhaseRoleSectionPermissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdPhaseRoleSectionPermissionsTable
     */
    public $SdPhaseRoleSectionPermissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_phase_role_section_permissions',
        'app.sd_phase_role_permissions',
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
        $config = TableRegistry::getTableLocator()->exists('SdPhaseRoleSectionPermissions') ? [] : ['className' => SdPhaseRoleSectionPermissionsTable::class];
        $this->SdPhaseRoleSectionPermissions = TableRegistry::getTableLocator()->get('SdPhaseRoleSectionPermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdPhaseRoleSectionPermissions);

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
