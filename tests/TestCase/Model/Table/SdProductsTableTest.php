<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdProductsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdProductsTable Test Case
 */
class SdProductsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdProductsTable
     */
    public $SdProducts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_products',
        'app.sd_product_types',
        'app.sd_study_types',
        'app.sd_sponsor_companies',
        'app.sd_product_flags',
        'app.sd_product_workflows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdProducts') ? [] : ['className' => SdProductsTable::class];
        $this->SdProducts = TableRegistry::getTableLocator()->get('SdProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdProducts);

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
