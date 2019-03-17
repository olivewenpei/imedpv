<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdCaseHistories Controller
 *
 * @property \App\Model\Table\SdCaseHistoriesTable $SdCaseHistories
 *
 * @method \App\Model\Entity\SdCaseHistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdCaseHistoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdCases', 'SdWorkflowActivities', 'SdUsers']
        ];
        $sdCaseHistories = $this->paginate($this->SdCaseHistories);

        $this->set(compact('sdCaseHistories'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Case History id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdCaseHistory = $this->SdCaseHistories->get($id, [
            'contain' => ['SdCases', 'SdWorkflowActivities', 'SdUsers']
        ]);

        $this->set('sdCaseHistory', $sdCaseHistory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdCaseHistory = $this->SdCaseHistories->newEntity();
        if ($this->request->is('post')) {
            $sdCaseHistory = $this->SdCaseHistories->patchEntity($sdCaseHistory, $this->request->getData());
            if ($this->SdCaseHistories->save($sdCaseHistory)) {
                $this->Flash->success(__('The sd case history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd case history could not be saved. Please, try again.'));
        }
        $sdCases = $this->SdCaseHistories->SdCases->find('list', ['limit' => 200]);
        $sdWorkflowActivities = $this->SdCaseHistories->SdWorkflowActivities->find('list', ['limit' => 200]);
        $sdUsers = $this->SdCaseHistories->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdCaseHistory', 'sdCases', 'sdWorkflowActivities', 'sdUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Case History id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdCaseHistory = $this->SdCaseHistories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdCaseHistory = $this->SdCaseHistories->patchEntity($sdCaseHistory, $this->request->getData());
            if ($this->SdCaseHistories->save($sdCaseHistory)) {
                $this->Flash->success(__('The sd case history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd case history could not be saved. Please, try again.'));
        }
        $sdCases = $this->SdCaseHistories->SdCases->find('list', ['limit' => 200]);
        $sdWorkflowActivities = $this->SdCaseHistories->SdWorkflowActivities->find('list', ['limit' => 200]);
        $sdUsers = $this->SdCaseHistories->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdCaseHistory', 'sdCases', 'sdWorkflowActivities', 'sdUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Case History id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdCaseHistory = $this->SdCaseHistories->get($id);
        if ($this->SdCaseHistories->delete($sdCaseHistory)) {
            $this->Flash->success(__('The sd case history has been deleted.'));
        } else {
            $this->Flash->error(__('The sd case history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
