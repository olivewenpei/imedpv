<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdStudyCrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdStudyCrosTable Test Case
 */
class SdStudyCrosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdStudyCrosTable
     */
    public $SdStudyCros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_study_cros',
        'app.sd_studies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdStudyCros') ? [] : ['className' => SdStudyCrosTable::class];
        $this->SdStudyCros = TableRegistry::getTableLocator()->get('SdStudyCros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdStudyCros);

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
