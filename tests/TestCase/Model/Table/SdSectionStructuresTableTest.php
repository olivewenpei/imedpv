<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdSectionStructuresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdSectionStructuresTable Test Case
 */
class SdSectionStructuresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdSectionStructuresTable
     */
    public $SdSectionStructures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_section_structures',
        'app.sd_sections',
        'app.sd_fields',
        'app.sd_section_values'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdSectionStructures') ? [] : ['className' => SdSectionStructuresTable::class];
        $this->SdSectionStructures = TableRegistry::getTableLocator()->get('SdSectionStructures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdSectionStructures);

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
