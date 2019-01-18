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


    /**
     * tabid = 1
     *  table
     * @return void
     */
    public function general($caseId)
    {
        $this->loadModel('SdFieldValues');
        $this->loadModel('SdFields');
        $this->loadModel('SdFieldValueLookUps');
        $sourceFields = $this->SdFieldValues->find('list', [
            'keyField' => 'sd_field_id',
            'valueField' => 'field_value',
            'groupField' => 'set_number'
        ])
            ->where(function ($exp, $query) use($caseId){
                $section_strucutre_related = $exp->or_(['sd_field_id'=>'6'])->add(['sd_field_id'=>'362'])->add(['sd_field_id'=>'380'])->add(['sd_field_id'=>'363'])->add(['sd_field_id'=>'364'])->add(['sd_field_id'=>'365'])->add(['sd_field_id'=>'366']);
                return $exp->and_([
                    $section_strucutre_related,
                    'sd_case_id' => $caseId
                ]);
            })->toList();
        $sdFields = $this->SdFields->find('list',[
            'keyField' => 'id',
            'valueField' => 'field_label',
        ])->where(function ($exp, $query){
            return $exp->or_(['id'=>'6'])->add(['id'=>'362'])->add(['id'=>'380'])->add(['id'=>'363'])->add(['id'=>'364'])->add(['id'=>'365'])->add(['id'=>'366']);
        })->toList();
        $sdFieldLookUps = $this->SdFieldValueLookUps->find('list',[
            'keyField' => 'value',
            'valueField' => 'caption',
            'groupField' => 'sd_field_id'
        ])->where(function ($exp, $query){
            return $exp->or_(['sd_field_id'=>'6'])->add(['sd_field_id'=>'362'])->add(['sd_field_id'=>'380'])->add(['sd_field_id'=>'363'])->add(['sd_field_id'=>'364'])->add(['sd_field_id'=>'365'])->add(['sd_field_id'=>'366']);
        })->toList();
        $this->set(compact('sourceFields','sdFields','sdFieldLookUps'));
    }

    /**
     * tabid = 2
     * reporter list table
     * @return void
     */
    public function reporter($caseId)
    {
        $this->loadModel('SdFieldValues');
        $this->loadModel('SdFields');
        $this->loadModel('SdFieldValueLookUps');
        $sourceFields = $this->SdFieldValues->find('list', [
            'keyField' => 'sd_field_id',
            'valueField' => 'field_value',
            'groupField' => 'set_number'
        ])
            ->where(function ($exp, $query) use($caseId){
                $section_strucutre_related = $exp->or_(['sd_field_id'=>'26'])->add(['sd_field_id'=>'28'])->add(['sd_field_id'=>'36'])->add(['sd_field_id'=>'59']);
                return $exp->and_([
                    $section_strucutre_related,
                    'sd_case_id' => $caseId
                ]);
            })->toList();
        $sdFields = $this->SdFields->find('list',[
            'keyField' => 'id',
            'valueField' => 'field_label',
        ])->where(function ($exp, $query){
            return $exp->or_(['id'=>'26'])->add(['id'=>'28'])->add(['id'=>'36'])->add(['id'=>'232']);
        })->toList();

        $sdFieldLookUps = $this->SdFieldValueLookUps->find('list',[
            'keyField' => 'value',
            'valueField' => 'caption',
            'groupField' => 'sd_field_id'
        ])->where(function ($exp, $query){
            return $exp->or_(['sd_field_id'=>'26'])->add(['sd_field_id'=>'28'])->add(['sd_field_id'=>'36'])->add(['sd_field_id'=>'232']);
        })->toList();
        $this->set(compact('sourceFields','sdFields','sdFieldLookUps'));
    }
    /**
     * tabid = 3
     * reporter list table
     * @return void
     */
    public function patient($caseId)
    {
        $this->loadModel('SdFieldValues');
        $this->loadModel('SdFieldValueLookUps');
        $this->loadModel('SdFields');
        $patientInfoValues = $this->SdFieldValues->find('list', [
            'keyField' => 'sd_field_id',
            'valueField' => 'field_value',
            'groupField' => 'set_number'
        ])
            ->where(function ($exp, $query) use($caseId){
                $section_strucutre_related = $exp->or_(['sd_field_id'=>'236'])->add(['sd_field_id'=>'80'])->add(['sd_field_id'=>'81'])->add(['sd_field_id'=>'82'])->add(['sd_field_id'=>'83']);
                return $exp->and_([
                    $section_strucutre_related,
                    'sd_case_id' => $caseId
                ]);
            })->toList();
        $patientInfoFields = $this->SdFields->find('list',[
            'keyField' => 'id',
            'valueField' => 'field_label',
        ])->where(function ($exp, $query){
            return $exp->or_(['id'=>'236'])->add(['id'=>'80'])->add(['id'=>'81'])->add(['id'=>'82'])->add(['id'=>'83']);
        })->toList();
        $patientInfoLookUps = $this->SdFieldValueLookUps->find('list',[
            'keyField' => 'value',
            'valueField' => 'caption',
            'groupField' => 'sd_field_id'
        ])->where(function ($exp, $query){
            return $exp->or_(['sd_field_id'=>'236'])->add(['sd_field_id'=>'80'])->add(['sd_field_id'=>'81'])->add(['sd_field_id'=>'82'])->add(['sd_field_id'=>'83']);
        })->toList();


        $patientDiseaseInfoValues = $this->SdFieldValues->find('list', [
            'keyField' => 'sd_field_id',
            'valueField' => 'field_value',
            'groupField' => 'set_number'
        ])
        ->where(function ($exp, $query) use($caseId){
            $section_strucutre_related = $exp->or_(['sd_field_id'=>'239'])->add(['sd_field_id'=>'99'])->add(['sd_field_id'=>'237'])->add(['sd_field_id'=>'102'])->add(['sd_field_id'=>'240'])->add(['sd_field_id'=>'241']);
            return $exp->and_([
                $section_strucutre_related,
                'sd_case_id' => $caseId
            ]);
        })->toList();

        $patientDiseaseInfoFields = $this->SdFields->find('list',[
            'keyField' => 'id',
            'valueField' => 'field_label',
        ])->where(function ($exp, $query){
            return $exp->or_(['id'=>'239'])->add(['id'=>'237'])->add(['id'=>'99'])->add(['id'=>'102'])->add(['id'=>'240'])->add(['id'=>'241']);
        })->toList();
        $patientDiseaseInfoLookUps = $this->SdFieldValueLookUps->find('list',[
            'keyField' => 'value',
            'valueField' => 'caption',
            'groupField' => 'sd_field_id'
        ])->where(function ($exp, $query){
            return $exp->or_(['sd_field_id'=>'239'])->add(['sd_field_id'=>'99'])->add(['sd_field_id'=>'237'])->add(['sd_field_id'=>'102'])->add(['sd_field_id'=>'240'])->add(['sd_field_id'=>'241']);
        })->toList();



        $childInfoValues = $this->SdFieldValues->find('list', [
            'keyField' => 'sd_field_id',
            'valueField' => 'field_value',
            'groupField' => 'set_number'
        ])
            ->where(function ($exp, $query) use($caseId){
                $section_strucutre_related = $exp->or_(['sd_field_id'=>'263'])->add(['sd_field_id'=>'265'])->add(['sd_field_id'=>'266'])->add(['sd_field_id'=>'268']);
                return $exp->and_([
                    $section_strucutre_related,
                    'sd_case_id' => $caseId
                ]);
            })->toList();

        $childInfoFields = $this->SdFields->find('list',[
            'keyField' => 'id',
            'valueField' => 'field_label',
        ])->where(function ($exp, $query){
            return $exp->or_(['id'=>'263'])->add(['id'=>'265'])->add(['id'=>'266'])->add(['id'=>'268']);
        })->toList();
        $childInfoLookUps = $this->SdFieldValueLookUps->find('list',[
            'keyField' => 'value',
            'valueField' => 'caption',
            'groupField' => 'sd_field_id'
        ])->where(function ($exp, $query){
            return $exp->or_(['sd_field_id'=>'263'])->add(['sd_field_id'=>'265'])->add(['sd_field_id'=>'266'])->add(['sd_field_id'=>'268']);
        })->toList();

        $congentialAnomalyValues = $this->SdFieldValues->find('list', [
            'keyField' => 'sd_field_id',
            'valueField' => 'field_value',
            'groupField' => 'set_number'
        ])
            ->where(function ($exp, $query) use($caseId){
                $section_strucutre_related = $exp->or_(['sd_field_id'=>'273'])->add(['sd_field_id'=>'275'])->add(['sd_field_id'=>'274'])->add(['sd_field_id'=>'276'])->add(['sd_field_id'=>'277']);
                return $exp->and_([
                    $section_strucutre_related,
                    'sd_case_id' => $caseId
                ]);
            })->toList();

        $congentialAnomalyFields = $this->SdFields->find('list',[
            'keyField' => 'id',
            'valueField' => 'field_label',
        ])->where(function ($exp, $query){
            return $exp->or_(['id'=>'273'])->add(['id'=>'275'])->add(['id'=>'274'])->add(['id'=>'276'])->add(['id'=>'277']);
        })->toList();
        $congentialAnomalyLookUps = $this->SdFieldValueLookUps->find('list',[
            'keyField' => 'value',
            'valueField' => 'caption',
            'groupField' => 'sd_field_id'
        ])->where(function ($exp, $query){
            return $exp->or_(['sd_field_id'=>'273'])->add(['sd_field_id'=>'275'])->add(['sd_field_id'=>'274'])->add(['sd_field_id'=>'276'])->add(['sd_field_id'=>'277']);
        })->toList();

        $this->set(compact('patientDiseaseInfoFields','patientDiseaseInfoValues','patientDiseaseInfoLookUps',
                            'patientInfoValues','patientInfoFields','patientInfoLookUps',
                            'congentialAnomalyFields','congentialAnomalyValues','congentialAnomalyLookUps',
                            'childInfoValues','childInfoFields','childInfoLookUps'));
    }
    /*
    */
    public function product($caseId)
    {
        $this->loadModel('SdFieldValues');
        $this->loadModel('SdFieldValueLookUps');
        $this->loadModel('SdFields');
        $sourceFields = $this->SdFieldValues->find('list', [
            'keyField' => 'sd_field_id',
            'valueField' => 'field_value',
            'groupField' => 'set_number'
        ])
            ->where(function ($exp, $query) use($caseId){
                $section_strucutre_related = $exp->or_(['sd_field_id'=>'282'])->add(['sd_field_id'=>'175'])->add(['sd_field_id'=>'176'])->add(['sd_field_id'=>'285']);
                return $exp->and_([
                    $section_strucutre_related,
                    'sd_case_id' => $caseId
                ]);
            })->toList();
        $sdFields = $this->SdFields->find('list',[
            'keyField' => 'id',
            'valueField' => 'field_label',
        ])->where(function ($exp, $query){
            return $exp->or_(['id'=>'282'])->add(['id'=>'175'])->add(['id'=>'176'])->add(['id'=>'285']);
        })->toList();
        $sdFieldLookUps = $this->SdFieldValueLookUps->find('list',[
            'keyField' => 'value',
            'valueField' => 'caption',
            'groupField' => 'sd_field_id'
        ])->where(function ($exp, $query){
            return $exp->or_(['sd_field_id'=>'282'])->add(['sd_field_id'=>'175'])->add(['sd_field_id'=>'176'])->add(['sd_field_id'=>'285']);
        })->contain(['SdFields'])->toList();
        $this->set(compact('sourceFields','sdFields','sdFieldLookUps'));
    }
    /*
    */
    public function event($caseId)
    {
        $this->loadModel('SdFieldValues');
        $this->loadModel('SdFieldValueLookUps');
        $this->loadModel('SdFields');
        $sourceFields = $this->SdFieldValues->find('list', [
            'keyField' => 'sd_field_id',
            'valueField' => 'field_value',
            'groupField' => 'set_number'
        ])
            ->where(function ($exp, $query) use($caseId){
                $section_strucutre_related = $exp->or_(['sd_field_id'=>'149'])->add(['sd_field_id'=>'156'])->add(['sd_field_id'=>'158'])->add(['sd_field_id'=>'154']);
                return $exp->and_([
                    $section_strucutre_related,
                    'sd_case_id' => $caseId
                ]);
            })->toList();
        $sdFields = $this->SdFields->find('list',[
            'keyField' => 'id',
            'valueField' => 'field_label',
        ])->where(function ($exp, $query){
            return $exp->or_(['id'=>'149'])->add(['id'=>'156'])->add(['id'=>'158'])->add(['id'=>'154']);
        })->toList();
        $sdFieldLookUps = $this->SdFieldValueLookUps->find('list',[
            'keyField' => 'value',
            'valueField' => 'caption',
            'groupField' => 'sd_field_id'
        ])->where(function ($exp, $query){
            return $exp->or_(['sd_field_id'=>'149'])->add(['sd_field_id'=>'156'])->add(['sd_field_id'=>'158'])->add(['sd_field_id'=>'154']);
        })->toList();
        $this->set(compact('sourceFields','sdFields','sdFieldLookUps'));
    }
}
