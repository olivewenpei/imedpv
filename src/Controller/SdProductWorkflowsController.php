<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * SdProductWorkflows Controller
 *
 * @property \App\Model\Table\SdProductWorkflowsTable $SdProductWorkflows
 *
 * @method \App\Model\Entity\SdProductWorkflow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdProductWorkflowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdWorkflows', 'SdUsers']
        ];
        $sdProductWorkflows = $this->paginate($this->SdProductWorkflows);

        $this->set(compact('sdProductWorkflows'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Product Workflow id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdProductWorkflow = $this->SdProductWorkflows->get($id, [
            'contain' => ['SdWorkflows', 'SdUsers', 'SdProducts', 'SdCases']
        ]);

        $this->set('sdProductWorkflow', $sdProductWorkflow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdProductWorkflow = $this->SdProductWorkflows->newEntity();
        if ($this->request->is('post')) {
            $sdProductWorkflow = $this->SdProductWorkflows->patchEntity($sdProductWorkflow, $this->request->getData());
            if ($this->SdProductWorkflows->save($sdProductWorkflow)) {
                $this->Flash->success(__('The sd product workflow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product workflow could not be saved. Please, try again.'));
        }
        $sdWorkflows = $this->SdProductWorkflows->SdWorkflows->find('list', ['limit' => 200]);
        $sdUsers = $this->SdProductWorkflows->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdProductWorkflow', 'sdWorkflows', 'sdUsers'));
    }

    /*
     * Create a new entry for product-workflow
     */
    public function create()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {            
            $product_workflow_data = $this->request->getData();
            $product_workflow_data['sd_workflow_id'] = $sd_workflow_id;
            $product_workflow_data['sd_product_id'] = $postedData['product_id'];
            $product_workflow_data['sd_user_id'] = 2;
            debug($product_workflow_data);
            $sdProductWorkflow = $this->SdProductWorkflows->newEntity();
            $sdProductWorkflow = $this->SdProductWorkflows->patchEntity($sdProductWorkflow, $product_workflow_data);
            
            if ($this->SdProductWorkflows->save($sdProductWorkflow)) {
                echo "All data were saved!";
            }
            else
                echo "Something is wrong";
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Product Workflow id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdProductWorkflow = $this->SdProductWorkflows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdProductWorkflow = $this->SdProductWorkflows->patchEntity($sdProductWorkflow, $this->request->getData());
            if ($this->SdProductWorkflows->save($sdProductWorkflow)) {
                $this->Flash->success(__('The sd product workflow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product workflow could not be saved. Please, try again.'));
        }
        $sdWorkflows = $this->SdProductWorkflows->SdWorkflows->find('list', ['limit' => 200]);
        $sdUsers = $this->SdProductWorkflows->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdProductWorkflow', 'sdWorkflows', 'sdUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Product Workflow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdProductWorkflow = $this->SdProductWorkflows->get($id);
        if ($this->SdProductWorkflows->delete($sdProductWorkflow)) {
            $this->Flash->success(__('The sd product workflow has been deleted.'));
        } else {
            $this->Flash->error(__('The sd product workflow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
