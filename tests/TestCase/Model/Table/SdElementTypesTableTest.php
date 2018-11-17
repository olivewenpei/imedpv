<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdElementTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdElementTypesTable Test Case
 */
class SdElementTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdElementTypesTable
     */
    public $SdElementTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_element_types',
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
        $config = TableRegistry::getTableLocator()->exists('SdElementTypes') ? [] : ['className' => SdElementTypesTable::class];
        $this->SdElementTypes = TableRegistry::getTableLocator()->get('SdElementTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdElementTypes);

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
