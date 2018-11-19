<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;

use App\Controller\AppController;
use App\Controller\SdSectionController;

class DashboardsController extends AppController {
    public function index (){
        $this->viewBuilder()->layout('main_layout');
        $userinfo = $this->request->session()->read('Auth.user');
        if($this->request->is('POST')){
            $this->autoRender = false;
            $searchKey = $this->request->getData();
            $SdCases = TableRegistry::get('SdCases');
            try{
                $searchResult = $SdCases->find();
                if(!empty($searchKey['searchName'])) $searchResult = $searchResult->where(['caseNo LIKE'=>'%'.$searchKey['searchName'].'%']);
                if(!empty($searchKey['searchProductName'])){
                    $SdProducts = TableRegistry::get('SdProducts');
                    $SdProducts = $SdProducts ->find()->select('id')->where(['study_no  LIKE'=>'%'.$searchKey['searchProductName'].'%']);
                    $searchResult = $searchResult->where(function ($exp, $query)use($SdProducts) {
                        $flag = 0;
                        foreach($SdProducts as $SdProductNo =>$SdProductDetail){
                            if($flag = 0) $exp = $exp->or_(['sd_product_id' => $SdProductDetail->id]);
                            else $exp = $exp->add(['sd_product_id' => $SdProductDetail->id]);
                            $flag ++;
                        }
                        return $exp;
                    });                
                }
                $searchResult = $searchResult->contain(['SdProducts'=>['fields'=>['SdProducts.study_no']]])->all();
            }catch (\PDOException $e){
                echo "cannot the case find in database";
            }
            echo json_encode($searchResult);
            // $this->set(compact('searchResult'));
            die();
        } else $this->autoRender = true;
    }
}