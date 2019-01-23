<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * SdProducts Controller
 *
 * @property \App\Model\Table\SdProductsTable $SdProducts
 *
 * @method \App\Model\Entity\SdProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdProductTypes', 'SdSponsorCompanies']
        ];
        $sdProducts = $this->paginate($this->SdProducts);

        $this->set(compact('sdProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdProduct = $this->SdProducts->get($id, [
            'contain' => ['SdProductTypes', 'SdSponsorCompanies', 'SdProductWorkflows']
        ]);

        $this->set('sdProduct', $sdProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdProduct = $this->SdProducts->newEntity();
        if ($this->request->is('post')) {
            $sdProduct = $this->SdProducts->patchEntity($sdProduct, $this->request->getData());
            if ($this->SdProducts->save($sdProduct)) {
                $this->Flash->success(__('The sd product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product could not be saved. Please, try again.'));
        }
        $sdProductTypes = $this->SdProducts->SdProductTypes->find('list', ['limit' => 200]);
        $sdSponsorCompanies = $this->SdProducts->SdSponsorCompanies->find('list', ['limit' => 200]);
        $this->set(compact('sdProduct', 'sdProductTypes', 'sdSponsorCompanies'));
    }

        /**
     * Create new product method
     *
     * @return \Cake\Http\Response|null Redirects on successful create, renders view otherwise.
     */
    public function create()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            //echo json_encode(array('result'=>1)); die();
            $sdProduct = $this->SdProducts->newEntity();
            $sdProduct = $this->SdProducts->patchEntity($sdProduct, $this->request->getData());
            if ($this->SdProducts->save($sdProduct)) {
                echo json_encode(array('result'=>1, 'product_id'=>$sdProduct->id));
            }
            else{
                echo json_encode(array('result'=>0));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdProduct = $this->SdProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdProduct = $this->SdProducts->patchEntity($sdProduct, $this->request->getData());
            if ($this->SdProducts->save($sdProduct)) {
                $this->Flash->success(__('The sd product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product could not be saved. Please, try again.'));
        }
        $sdProductTypes = $this->SdProducts->SdProductTypes->find('list', ['limit' => 200]);
        $sdSponsorCompanies = $this->SdProducts->SdSponsorCompanies->find('list', ['limit' => 200]);
        $this->set(compact('sdProduct', 'sdProductTypes', 'sdSponsorCompanies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdProduct = $this->SdProducts->get($id);
        if ($this->SdProducts->delete($sdProduct)) {
            $this->Flash->success(__('The sd product has been deleted.'));
        } else {
            $this->Flash->error(__('The sd product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function search()
    {
        $this->viewBuilder()->layout('main_layout');
        $product_types = $this->loadProductTypes();
        $sponsors = $this->loadSponsorCompanies();
        $this->set('sdProductTypes', $product_types);
        $this->set('sdSponsors', $sponsors);

    }

    public function addproduct()
    {
        $this->viewBuilder()->layout('main_layout');
        $product_types = $this->loadProductTypes();
        $sponsors = $this->loadSponsorCompanies();
        $this->set('sdProductTypes', $product_types);
        $this->set('sdSponsors', $sponsors);
        $workflow_structure = $this->loadWorkflowsStructure();
        $this->set('workflow_structure', $workflow_structure);
        //debug($sponsors);
        //debug($product_types);

        $sdProduct = $this->SdProducts->newEntity();
        if ($this->request->is('post')) {
            $sdProduct = $this->SdProducts->patchEntity($sdProduct, $this->request->getData());
            //debug($sdProduct);
            if ($this->SdProducts->save($sdProduct)) {
                $this->Flash->success(__('The sd product has been saved.'));

                return $this->redirect(['action' => 'search']);
            }
            $this->Flash->error(__('The sd product could not be saved. Please, try again.'));
        }
        $sdProductTypes = $this->SdProducts->SdProductTypes->find('list', ['limit' => 200]);
        $sdSponsorCompanies = $this->SdProducts->SdSponsorCompanies->find('list', ['limit' => 200]);
        $this->set(compact('sdProduct', 'sdSponsorCompanies'));
    }

    public function loadProductTypes()
    {
        $result = array();
        $product_types = TableRegistry::get("sd_product_types");
        $query = $product_types->find()
                        ->order(['id' => 'ASC']);

        foreach ($query as $product_type){
            $result[] = array("id"=>$product_type->id, "type_name"=>$product_type->type_name);
        }

        return $result;
    }
    /**
     * 
     * 
     * for ajax use
     * fetch related Cro companies
     */
    public function searchCallcenterCompanies()
    {
        $result = array();
        if($this->request->is('POST')){
            $this->autoRender = false;
            $searchKey = $this->request->getData();
            $cro_ids = TableRegistry::get("sd_sponsor_callcenters");
            try{
                $query = $cro_ids->find()
                                ->select(['SdCompanies.id', 'SdCompanies.company_name'])
                                ->join([
                                    'SdCompanies' =>[
                                        'table' =>'sd_companies',
                                        'type'=>'LEFT',
                                        'conditions'=>['SdCompanies.id = sd_sponsor_callcenters.call_center'],
                                    ]]);
                                // ->order(['sponsor_id' => 'ASC'])
                foreach ($query as $company_info){
                    $result[$company_info->SdCompanies['id']] = $company_info->SdCompanies['company_name'];
                } 
            }catch (\PDOException $e){
                echo "cannot the case find in database";
            };
            echo json_encode($result);
            die();
        } else $this->autoRender = true;
    }
    /**
     * 
     * 
     * for ajax use
     * fetch related Cro companies
     */
    public function searchCroCompanies()
    {
        $result = array();
        if($this->request->is('POST')){
            $this->autoRender = false;
            $searchKey = $this->request->getData();
            $cro_ids = TableRegistry::get("sd_sponsor_cros");
            try{
                $query = $cro_ids->find()
                                ->select(['SdCompanies.id', 'SdCompanies.company_name'])
                                ->join([
                                    'SdCompanies' =>[
                                        'table' =>'sd_companies',
                                        'type'=>'LEFT',
                                        'conditions'=>['SdCompanies.id = sd_sponsor_cros.cro_company'],
                                    ]]);
                                // ->order(['sponsor_id' => 'ASC'])
                foreach ($query as $company_info){
                    $result[$company_info->SdCompanies['id']] = $company_info->SdCompanies['company_name'];
                }            
            }catch (\PDOException $e){
                echo "cannot the case find in database";
            };
            echo json_encode($result);
            die();
        } else $this->autoRender = true;
    }
    /**
     * 
     * for add product add workflows
     */
    public function loadWorkflowsStructure()
    {
        $result = array();
        $searchKey = $this->request->getData();
        $default_workflows = TableRegistry::get("sd_workflows");
        $query = $default_workflows->find()
                        ->where(['workflow_type'=>'0'])
                        ->contain('SdWorkflowActivities', function ($q) {
                            return $q->select(['SdWorkflowActivities.id','SdWorkflowActivities.sd_workflow_id','SdWorkflowActivities.activity_name','SdWorkflowActivities.description'])->order(['SdWorkflowActivities.id'=>'ASC']);
                        })
                        ->order(['sd_workflows.id' => 'ASC']);
        foreach ($query as $workflow_info){
            $result[$workflow_info->country] = $workflow_info;
        }
    return $result;
    }
    

    public function loadSponsorCompanies()
    {
        $result = array();
        $sponsor_companies = TableRegistry::get("sd_sponsor_companies");
        $query = $sponsor_companies->find()
                        ->order(['company_name' => 'ASC']);

        foreach ($query as $sponsor_company){
            $result[] = array("id"=>$sponsor_company->id, "company_name"=>$sponsor_company->company_name, "country"=>$sponsor_company->country);
        }

        return $result;
    }
}
