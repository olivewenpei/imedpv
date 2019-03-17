<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdQueriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdQueriesTable Test Case
 */
class SdQueriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdQueriesTable
     */
    public $SdQueries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_queries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdQueries') ? [] : ['className' => SdQueriesTable::class];
        $this->SdQueries = TableRegistry::getTableLocator()->get('SdQueries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdQueries);

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
