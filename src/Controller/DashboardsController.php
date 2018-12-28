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
            try{
                $searchResult = $sdCases->find();
                if(!empty($searchKey['searchName'])) $searchResult = $searchResult->where(['caseNo LIKE'=>'%'.$searchKey['searchName'].'%']);
                if(!empty($searchKey['searchProductName'])){
                    $sdProducts = TableRegistry::get('SdProducts');
                    $sdProducts = $sdProducts ->find()->select('id')->where(['study_no  LIKE'=>'%'.$searchKey['searchProductName'].'%']);
                        //get product which study_no matches
                    $sdProducctWorkflow = TableRegistry::get('SdProductWorkflows');
                    $sdProducctWorkflow = $sdProducctWorkflow->find()->select('id')->where(function($exp, $query)use($sdProducts) {
                        $flag = 0;
                        foreach($sdProducts as $SdProductNo =>$SdProductDetail){
                            if($flag = 0) $exp = $exp->or_(['sd_product_id' => $SdProductDetail->id]);
                            else $exp = $exp->add(['sd_product_id' => $SdProductDetail->id]);
                            $flag ++;
                        }
                        return $exp;
                    });
                    $searchResult = $searchResult->where(function ($exp, $query)use($sdProducctWorkflow) {
                        $flag = 0;
                        foreach($sdProducctWorkflow as $sdProducctWorkflowK =>$sdProducctWorkV){
                            if($flag = 0) $exp = $exp->or_(['sd_product_workflow_id' => $sdProducctWorkV->id]);
                            else $exp = $exp->add(['sd_product_workflow_id' => $sdProducctWorkV->id]);
                            $flag ++;
                        }
                        return $exp;
                    });
                }
                $searchResult = $searchResult->contain(['SdProductWorkflows.SdProducts'])->all();
            }catch (\PDOException $e){
                echo "cannot the case find in database";
            }
            echo json_encode($searchResult);
            // $this->set(compact('searchResult'));
            die();
        } else $this->autoRender = true;
    }
}