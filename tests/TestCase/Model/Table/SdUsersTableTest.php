<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdUsersTable Test Case
 */
class SdUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdUsersTable
     */
    public $SdUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_users',
        'app.sd_roles',
        'app.sd_companies',
        'app.sd_activity_logs',
        'app.sd_cases',
        'app.sd_product_workflows',
        'app.sd_user_assignments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdUsers') ? [] : ['className' => SdUsersTable::class];
        $this->SdUsers = TableRegistry::getTableLocator()->get('SdUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdUsers);

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
