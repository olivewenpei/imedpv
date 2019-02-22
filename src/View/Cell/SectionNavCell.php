<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * SectionNav cell
 */
class SectionNavCell extends Cell
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
    public function display($tabid,$caseNo,$readonly=null,$version)
    {
        $this->loadModel('SdTabs');
        $this->loadModel('SdCases');
        $sdCase = $this->SdCases->find()->where(['caseNo'=>$caseNo,'version_no'=>$version])->first();
        $sd_workflow_activity_id = $sdCase['sd_workflow_activity_id'];
        // debug($sd_workflow_activity_id);
        $sdTabs = $this->SdTabs->find()->order(['SdTabs.display_order'=>'ASC'])
            ->contain(['SdSections'=>function($q)use($sd_workflow_activity_id){
                return $q
                    ->where(['SdSections.status'=>1])
                    ->select(['SdSections.sd_tab_id','SdSections.status','SdSections.section_name','SdSections.section_level','SdSections.id'])
                    ->join([
                        'asp'=>[
                            'table'=>'sd_activity_section_permissions',
                            'type'=>'INNER',
                            'conditions'=>['asp.sd_workflow_activity_id ='.$sd_workflow_activity_id, 'asp.sd_section_id = SdSections.id']
                        ]
                    ])
                    ;
            }])->toArray();
        foreach($sdTabs as $key => $sdTab)
        {
            if(empty($sdTab['sd_sections'])) unset($sdTabs[$key]);
        }
        // debug($sdTabs);
        $this->set(compact('sdTabs','tabid','caseNo','readonly','version'));
    }
}
