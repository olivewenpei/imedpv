<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;

use App\Controller\AppController;
use App\Controller\SdSectionController;

class DashboardsController extends AppController {
    public function index (){
        $this->viewBuilder()->layout('main_layout');
        $userinfo = $this->request->session()->read('Auth.user');

    }

    public function search(){
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
            //[{"id":2,"caseNo":"1","sd_product_id":0,"sd_phase_id":1,"start_date":"20121111","end_date":"20121111","status":1,"sd_product":{"study_no":"Test Product Study"}}]
            /*
            $searchResult = array(
                0=>array('id'=>2, 'caseNo'=>1),
                1=>array('id'=>4, 'caseNo'=>6)
        );*/

            echo json_encode($searchResult);
            // $this->set(compact('searchResult'));
            die();
        } else $this->autoRender = true;
    }
}