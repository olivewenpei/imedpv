<?php
namespace App\Controller;

use App\Controller\AppController;

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
            'contain' => ['SdProducts', 'SdWorkflows', 'SdUsers']
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
            'contain' => ['SdProducts', 'SdWorkflows', 'SdUsers', 'SdCases']
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
        $sdProducts = $this->SdProductWorkflows->SdProducts->find('list', ['limit' => 200]);
        $sdWorkflows = $this->SdProductWorkflows->SdWorkflows->find('list', ['limit' => 200]);
        $sdUsers = $this->SdProductWorkflows->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdProductWorkflow', 'sdProducts', 'sdWorkflows', 'sdUsers'));
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
        $sdProducts = $this->SdProductWorkflows->SdProducts->find('list', ['limit' => 200]);
        $sdWorkflows = $this->SdProductWorkflows->SdWorkflows->find('list', ['limit' => 200]);
        $sdUsers = $this->SdProductWorkflows->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdProductWorkflow', 'sdProducts', 'sdWorkflows', 'sdUsers'));
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
