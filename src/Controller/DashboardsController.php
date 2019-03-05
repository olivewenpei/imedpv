<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;

use App\Controller\AppController;
use App\Controller\SdSectionController;

class DashboardsController extends AppController {
    public function index (){
        $this->viewBuilder()->layout('main_layout');
    }

    public function search(){
        $userinfo = $this->request->session()->read('Auth.user');
        if($this->request->is('POST')){
            $this->autoRender = false;
            $searchKey = $this->request->getData();
            $sdCases = TableRegistry::get('SdCases');
            $sdFieldValues = TableRegistry::get('SdFieldValues');
            try{
                $user = TableRegistry::get('SdUsers')->get($searchKey['userId']);
                $searchResult = $sdCases->find()->select([
                    'versions'=>'SdCases.version_no', 
                    'pw.sd_product_id',
                    'submission_due_date'=>'submission_due_date.field_value',
                    'activity_due_date'=>'activity_due_date.field_value',
                    'caseNo',
                    'sd_workflow_activity_id',
                    'pd.product_name',
                    'wa.activity_name'])
                    ->join([
                        'pw' => [
                            'table' => 'sd_product_workflows',
                            'type' => 'LEFT',
                            'conditions' => ['SdCases.sd_product_workflow_id = pw.id'],
                        ],
                        'pd' => [
                            'table' => 'sd_products',
                            'type' => 'LEFT',
                            'conditions' => ['pw.sd_product_id = pd.id'],
                        ],                                            
                        'wa' => [
                            'table' => 'sd_workflow_activities',
                            'type' => 'LEFT',
                            'conditions' => ['wa.id = SdCases.sd_workflow_activity_id'],
                        ],
                        'submission_due_date'=>[
                            'table'=>'sd_field_values',
                            'type'=>'LEFT',
                            'conditions'=>['submission_due_date.sd_field_id = 415','submission_due_date.sd_case_id = SdCases.id','submission_due_date.status = 1']
                        ],
                        'activity_due_date'=>[
                            'table'=>'sd_field_values',
                            'type'=>'LEFT',
                            'conditions'=>['activity_due_date.sd_field_id = 414','activity_due_date.sd_case_id = SdCases.id','activity_due_date.status = 1']
                        ]
                    ])->order(['caseNo'=>'ASC','versions'=>'DESC']);
                if($user['sd_role_id']>2) {
                    $searchResult = $searchResult->join([
                        'ua'=>[
                            'table' =>'sd_user_assignments',
                            'type'=>'INNER',
                            'conditions'=>['ua.sd_product_workflow_id = SdCases.sd_product_workflow_id','ua.sd_user_id = '.$searchKey['userId']]
                        ]
                    ]);}
                if(!empty($searchKey['searchName'])) $searchResult = $searchResult->where(['caseNo LIKE'=>'%'.$searchKey['searchName'].'%']);
                if(!empty($searchKey['searchProductName'])) $searchResult = $searchResult->where(['product_name  LIKE'=>'%'.$searchKey['searchProductName'].'%']);
                $searchResult->all();
                
                // $searchResult = $sdCases->find();
                // if(!empty($searchKey['searchName'])) $searchResult = $searchResult->where(['caseNo LIKE'=>'%'.$searchKey['searchName'].'%']);
                // if(!empty($searchKey['searchProductName'])){
                //     $sdProducts = TableRegistry::get('SdProducts');
                //     $sdProducts = $sdProducts ->find()->select('id')->where(['product_name  LIKE'=>'%'.$searchKey['searchProductName'].'%']);
                //         //get product which study_no matches
                //     $sdProducctWorkflow = TableRegistry::get('SdProductWorkflows');
                //     $sdProducctWorkflow = $sdProducctWorkflow->find()->select('id')->where(function($exp, $query)use($sdProducts) {
                //         $flag = 0;
                //         foreach($sdProducts as $SdProductNo =>$SdProductDetail){
                //             if($flag = 0) $exp = $exp->or_(['sd_product_id' => $SdProductDetail->id]);
                //             else $exp = $exp->activity_due_date(['sd_product_id' => $SdProductDetail->id]);
                //             $flag ++;
                //         }
                //         return $exp;
                //     });
                //     $searchResult = $searchResult->where(function ($exp, $query)use($sdProducctWorkflow) {
                //         $flag = 0;
                //         foreach($sdProducctWorkflow as $sdProducctWorkflowK =>$sdProducctWorkV){
                //             if($flag = 0) $exp = $exp->or_(['sd_product_workflow_id' => $sdProducctWorkV->id]);
                //             else $exp = $exp->activity_due_date(['sd_product_workflow_id' => $sdProducctWorkV->id]);
                //             $flag ++;
                //         }
                //         return $exp;
                //     });
                // }
                // $searchResult = $searchResult->contain(['SdProductWorkflows.SdProducts'])->all();
            }catch (\PDOException $e){
                echo "cannot the case find in database";
            }
            echo json_encode($searchResult);
            // $this->set(compact('searchResult'));
            die();
        } else $this->autoRender = true;
    }
}