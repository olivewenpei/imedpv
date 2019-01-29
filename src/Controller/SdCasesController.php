<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * SdCases Controller
 *
 * @property \App\Model\Table\SdCasesTable $SdCases
 *
 * @method \App\Model\Entity\SdCase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdCasesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdProductWorkflows', 'SdWorkflowActivities', 'SdUsers']
        ];
        $sdCases = $this->paginate($this->SdCases);

        $this->set(compact('sdCases'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Case id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdCase = $this->SdCases->get($id, [
            'contain' => ['SdProductWorkflows', 'SdWorkflowActivities', 'SdUsers', 'SdCaseGeneralInfos', 'SdFieldValues']
        ]);

        $this->set('sdCase', $sdCase);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdCase = $this->SdCases->newEntity();
        if ($this->request->is('post')) {
            $sdCase = $this->SdCases->patchEntity($sdCase, $this->request->getData());
            if ($this->SdCases->save($sdCase)) {
                $this->Flash->success(__('The sd case has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd case could not be saved. Please, try again.'));
        }
        $sdProductWorkflows = $this->SdCases->SdProductWorkflows->find('list', ['limit' => 200]);
        $sdWorkflowActivities = $this->SdCases->SdWorkflowActivities->find('list', ['limit' => 200]);
        $sdUsers = $this->SdCases->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdCase', 'sdProductWorkflows', 'sdWorkflowActivities', 'sdUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Case id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdCase = $this->SdCases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdCase = $this->SdCases->patchEntity($sdCase, $this->request->getData());
            if ($this->SdCases->save($sdCase)) {
                $this->Flash->success(__('The sd case has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd case could not be saved. Please, try again.'));
        }
        $sdProductWorkflows = $this->SdCases->SdProductWorkflows->find('list', ['limit' => 200]);
        $sdWorkflowActivities = $this->SdCases->SdWorkflowActivities->find('list', ['limit' => 200]);
        $sdUsers = $this->SdCases->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdCase', 'sdProductWorkflows', 'sdWorkflowActivities', 'sdUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Case id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdCase = $this->SdCases->get($id);
        if ($this->SdCases->delete($sdCase)) {
            $this->Flash->success(__('The sd case has been deleted.'));
        } else {
            $this->Flash->error(__('The sd case could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Register SAE method / Add case
     *
     *
     */
    public function saeregistration()
    {
        $this->viewBuilder()->layout('main_layout');
        $userinfo = $this->request->session()->read('Auth.user');
        //TODO Permission related
        $productInfo = TableRegistry::get('SdProducts')
            ->find()
            ->select(['id','product_name'])
            ->contain(['SdProductWorkflows.SdWorkflows'=>['fields'=>['SdWorkflows.name']]])
            ->group(['SdProducts.id']);
        $randNo = $this->caseNoGenerator();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestData = $this->request->getData();
            $sdFieldValueTable = TableRegistry::get('SdFieldValues');
            $requestDataField = $requestData['field_value'];
            /**
             * save case
             */
            $requestDataCase = $requestData['case'];
            foreach($requestDataCase['caseNo'] as $key =>$value){
                $sdCase = $this->SdCases->newEntity();
                $savedData = $requestDataCase;
                $savedData['caseNo'] = $value;
                $savedData['status'] = "1";
                $sdCase = $this->SdCases->patchEntity($sdCase, $savedData);
                $savedCase=$this->SdCases->save($sdCase);
                if (!$savedCase) {
                    echo"problem in saving sdCase";
                    return null;
                }
                /**
                 * 
                 * save source into cases
                 */
                foreach($requestDataField as $field_id =>$field_value)
                {
                    $sdFieldValueEntity = $sdFieldValueTable->newEntity();
                    $dataSet = [
                        'sd_case_id' => $savedCase->id,
                        'version_no' => '1',
                        'sd_field_id' => $field_id,
                        'set_number' => '1',
                        'created_time' =>date("Y-m-d H:i:s"),
                        'field_value' =>$field_value,
                        'status' =>'1',
                    ];
                    $sdFieldValueEntity = $sdFieldValueTable->patchEntity($sdFieldValueEntity, $dataSet);
                    if(!$sdFieldValueTable->save($sdFieldValueEntity)) echo "problem in saving sdfields";
                }
            
                /**
                 *
                 * save field into these cases
                 */
                $product_data = TableRegistry::get('SdProducts')
                ->get($requestData['product_id']);
                $sdFieldValueEntity = $sdFieldValueTable->newEntity();
                $dataSet = [
                    'sd_case_id' => $savedCase->id,
                    'version_no' => '1',
                    'sd_field_id' => '176',
                    'set_number' => '1',
                    'created_time' =>date("Y-m-d H:i:s"),
                    'field_value' =>$product_data['product_desc'],
                    'status' =>'1',
                ];
                $sdFieldValueEntity = $sdFieldValueTable->patchEntity($sdFieldValueEntity, $dataSet);
                if(!$sdFieldValueTable->save($sdFieldValueEntity)) echo "problem in saving product_desc sdfields";
                
                $sdFieldValueEntity = $sdFieldValueTable->newEntity();
                $dataSet = [
                    'sd_case_id' => $savedCase->id,
                    'version_no' => '1',
                    'sd_field_id' => '175',
                    'set_number' => '1',
                    'created_time' =>date("Y-m-d H:i:s"),
                    'field_value' =>$product_data['sd_product_flag'],
                    'status' =>'1',
                ];
                $sdFieldValueEntity = $sdFieldValueTable->patchEntity($sdFieldValueEntity, $dataSet);
                if(!$sdFieldValueTable->save($sdFieldValueEntity)) echo "problem in saving sd_product_flag sdfields";

                $sdFieldValueEntity = $sdFieldValueTable->newEntity();
                $dataSet = [
                    'sd_case_id' => $savedCase->id,
                    'version_no' => '1',
                    'sd_field_id' => '282',
                    'set_number' => '1',
                    'created_time' =>date("Y-m-d H:i:s"),
                    'field_value' =>$product_data['sd_product_type_id'],
                    'status' =>'1',
                ];
                $sdFieldValueEntity = $sdFieldValueTable->patchEntity($sdFieldValueEntity, $dataSet);
                if(!$sdFieldValueTable->save($sdFieldValueEntity)) echo "problem in saving sd_product_type_id sdfields";
                // debug($sdFieldValueEntity);
                $sdFieldValueEntity = $sdFieldValueTable->newEntity();
                $dataSet = [
                    'sd_case_id' => $savedCase->id,
                    'version_no' => '1',
                    'sd_field_id' => '283',
                    'set_number' => '1',
                    'created_time' =>date("Y-m-d H:i:s"),
                    'field_value' =>$product_data['WHODD_decode'],
                    'status' =>'1',
                ];
                
                $sdFieldValueEntity = $sdFieldValueTable->patchEntity($sdFieldValueEntity, $dataSet);
                // debug($dataSet);
                if(!$sdFieldValueTable->save($sdFieldValueEntity)) echo "problem in saving WHODD_decode sdfields";

                $sdFieldValueEntity = $sdFieldValueTable->newEntity();
                $dataSet = [
                    'sd_case_id' => $savedCase->id,
                    'version_no' => '1',
                    'sd_field_id' => '344',
                    'set_number' => '1',
                    'created_time' =>date("Y-m-d H:i:s"),
                    'field_value' =>$product_data['WHODD_code'],
                    'status' =>'1',
                ];
                $sdFieldValueEntity = $sdFieldValueTable->patchEntity($sdFieldValueEntity, $dataSet);
                if(!$sdFieldValueTable->save($sdFieldValueEntity)) echo "problem in saving WHODD_code sdfields";

                $sdFieldValueEntity = $sdFieldValueTable->newEntity();
                $dataSet = [
                    'sd_case_id' => $savedCase->id,
                    'version_no' => '1',
                    'sd_field_id' => '389',
                    'set_number' => '1',
                    'created_time' =>date("Y-m-d H:i:s"),
                    'field_value' =>$product_data['WHODD_name'],
                    'status' =>'1',
                ];
                $sdFieldValueEntity = $sdFieldValueTable->patchEntity($sdFieldValueEntity, $dataSet);
                if(!$sdFieldValueTable->save($sdFieldValueEntity)) echo "problem in saving WHODD_name sdfields";

                $sdFieldValueEntity = $sdFieldValueTable->newEntity();
                $dataSet = [
                    'sd_case_id' => $savedCase->id,
                    'version_no' => '1',
                    'sd_field_id' => '284',
                    'set_number' => '1',
                    'created_time' =>date("Y-m-d H:i:s"),
                    'field_value' =>$product_data['mfr_name'],
                    'status' =>'1',
                ];
                $sdFieldValueEntity = $sdFieldValueTable->patchEntity($sdFieldValueEntity, $dataSet);
                if(!$sdFieldValueTable->save($sdFieldValueEntity)) echo "problem in saving mfr_name sdfields";
            }
            return $this->redirect(['action' => 'caselist']);
        }
        $this->set(compact('productInfo','randNo'));
    }

     /**
     * Case number generator function
     *
     * @return string case number
     *
     */
    private function caseNoGenerator(){
        do{$rand_str = rand(0, 99999);
        }while($this->SdCases->find()->where(['caseNo LIKE '=>'%'.$rand_str.'%'])->first()!=null);
        return $rand_str;
    }

    public function caselist(){
        $this->viewBuilder()->layout('main_layout');

    }
}
