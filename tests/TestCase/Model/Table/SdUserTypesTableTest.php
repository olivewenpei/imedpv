<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdUserTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdUserTypesTable Test Case
 */
class SdUserTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdUserTypesTable
     */
    public $SdUserTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_user_types',
        'app.sd_companies',
        'app.sd_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdUserTypes') ? [] : ['className' => SdUserTypesTable::class];
        $this->SdUserTypes = TableRegistry::getTableLocator()->get('SdUserTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdUserTypes);

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
