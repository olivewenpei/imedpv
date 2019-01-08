<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdProductAssignmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdProductAssignmentsTable Test Case
 */
class SdProductAssignmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdProductAssignmentsTable
     */
    public $SdProductAssignments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_product_assignments',
        'app.sd_products',
        'app.sd_phases',
        'app.sd_companies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdProductAssignments') ? [] : ['className' => SdProductAssignmentsTable::class];
        $this->SdProductAssignments = TableRegistry::getTableLocator()->get('SdProductAssignments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdProductAssignments);

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
