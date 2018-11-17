<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdRolesTable Test Case
 */
class SdRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdRolesTable
     */
    public $SdRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_roles',
        'app.sd_user_types',
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
        $config = TableRegistry::getTableLocator()->exists('SdRoles') ? [] : ['className' => SdRolesTable::class];
        $this->SdRoles = TableRegistry::getTableLocator()->get('SdRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdRoles);

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
