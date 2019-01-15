<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdProductTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdProductTypesTable Test Case
 */
class SdProductTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdProductTypesTable
     */
    public $SdProductTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_product_types',
        'app.sd_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdProductTypes') ? [] : ['className' => SdProductTypesTable::class];
        $this->SdProductTypes = TableRegistry::getTableLocator()->get('SdProductTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdProductTypes);

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
