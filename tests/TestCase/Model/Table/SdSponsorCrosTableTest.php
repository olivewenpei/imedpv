<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdSponsorCrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdSponsorCrosTable Test Case
 */
class SdSponsorCrosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdSponsorCrosTable
     */
    public $SdSponsorCros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_sponsor_cros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdSponsorCros') ? [] : ['className' => SdSponsorCrosTable::class];
        $this->SdSponsorCros = TableRegistry::getTableLocator()->get('SdSponsorCros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdSponsorCros);

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
