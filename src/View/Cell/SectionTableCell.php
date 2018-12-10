<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * SectionTable cell
 */
class SectionTableCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *  
     * @return void
     */
    public function display()
    {
        $this->loadModel('SdTabs');
        $sdTabs = $this->SdTabs->find()->order(['SdTabs.display_order'=>'ASC']);
        $this->set(compact('sdTabs'));
    }
    public function resource($caseId)
    {
        $this->loadModel('SdFieldValues');
        $sourceFields = $this->SdFieldValues->find('list', [
            'keyField' => 'sd_field_id',
            'valueField' => 'field_value',
            'groupField' => 'set_number'
        ])
            ->where(function ($exp, $query) use($caseId){
                $section_strucutre_related = $exp->or_(['sd_field_id'=>'223'])->add(['sd_field_id'=>'224'])->add(['sd_field_id'=>'10']);
                return $exp->and_([
                    $section_strucutre_related,
                    'sd_case_id' => $caseId
                ]);
            })->toList();
        $this->set(compact('sourceFields'));
    }
}
