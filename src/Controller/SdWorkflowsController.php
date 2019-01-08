<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdWorkflows Controller
 *
 * @property \App\Model\Table\SdWorkflowsTable $SdWorkflows
 *
 * @method \App\Model\Entity\SdWorkflow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdWorkflowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdWorkflows = $this->paginate($this->SdWorkflows);

        $this->set(compact('sdWorkflows'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Workflow id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdWorkflow = $this->SdWorkflows->get($id, [
            'contain' => ['SdPhases', 'SdProducts']
        ]);

        $this->set('sdWorkflow', $sdWorkflow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdWorkflow = $this->SdWorkflows->newEntity();
        if ($this->request->is('post')) {
            $sdWorkflow = $this->SdWorkflows->patchEntity($sdWorkflow, $this->request->getData());
            if ($this->SdWorkflows->save($sdWorkflow)) {
                $this->Flash->success(__('The sd workflow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd workflow could not be saved. Please, try again.'));
        }
        $this->set(compact('sdWorkflow'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Workflow id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdWorkflow = $this->SdWorkflows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdWorkflow = $this->SdWorkflows->patchEntity($sdWorkflow, $this->request->getData());
            if ($this->SdWorkflows->save($sdWorkflow)) {
                $this->Flash->success(__('The sd workflow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd workflow could not be saved. Please, try again.'));
        }
        $this->set(compact('sdWorkflow'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Workflow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdWorkflow = $this->SdWorkflows->get($id);
        if ($this->SdWorkflows->delete($sdWorkflow)) {
            $this->Flash->success(__('The sd workflow has been deleted.'));
        } else {
            $this->Flash->error(__('The sd workflow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
