<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdSponsorCallcentersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdSponsorCallcentersTable Test Case
 */
class SdSponsorCallcentersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdSponsorCallcentersTable
     */
    public $SdSponsorCallcenters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_sponsor_callcenters'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SdSponsorCallcenters') ? [] : ['className' => SdSponsorCallcentersTable::class];
        $this->SdSponsorCallcenters = TableRegistry::getTableLocator()->get('SdSponsorCallcenters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdSponsorCallcenters);

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
