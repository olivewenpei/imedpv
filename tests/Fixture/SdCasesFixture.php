<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SdCasesFixture
 *
 */
class SdCasesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'sd_product_workflow_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'caseNo' => ['type' => 'string', 'length' => 22, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'sd_activity_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'current activity', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sd_user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'current working on user id', 'precision' => null, 'autoIncrement' => null],
        'priority' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '1=High,2=Medium,3=Low', 'precision' => null, 'autoIncrement' => null],
        'activity_due_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'submission_due_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'product_type' => ['type' => 'integer', 'length' => 1, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'classification' => ['type' => 'string', 'length' => 6, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1st:Spontaneous, 2nd:Study, 3rd:Literature, 4th: Pregnancy, 5th: Others, 6th: Unkown', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'sd_product_workflow_id' => 1,
                'caseNo' => 'Lorem ipsum dolor si',
                'sd_activity_id' => 1,
                'status' => 1,
                'sd_user_id' => 1,
                'priority' => 1,
                'activity_due_date' => '2019-01-17',
                'submission_due_date' => '2019-01-17',
                'product_type' => 1,
                'classification' => 'Lore'
            ],
        ];
        parent::init();
    }
}
