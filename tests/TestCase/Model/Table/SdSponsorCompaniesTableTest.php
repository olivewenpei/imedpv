<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SdSponsorCompaniesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SdSponsorCompaniesTable Test Case
 */
class SdSponsorCompaniesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SdSponsorCompaniesTable
     */
    public $SdSponsorCompanies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sd_sponsor_companies',
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
        $config = TableRegistry::getTableLocator()->exists('SdSponsorCompanies') ? [] : ['className' => SdSponsorCompaniesTable::class];
        $this->SdSponsorCompanies = TableRegistry::getTableLocator()->get('SdSponsorCompanies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SdSponsorCompanies);

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
