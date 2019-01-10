<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CcodeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CcodeTable Test Case
 */
class CcodeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CcodeTable
     */
    public $Ccode;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ccode'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ccode') ? [] : ['className' => CcodeTable::class];
        $this->Ccode = TableRegistry::getTableLocator()->get('Ccode', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ccode);

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
