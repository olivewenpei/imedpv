<?php
namespace App\Controller;

use App\Controller\AppController;

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
            'contain' => ['SdProductWorkflows', 'SdActivities', 'SdUsers']
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
            'contain' => ['SdProductWorkflows', 'SdActivities', 'SdUsers', 'SdCaseGeneralInfos', 'SdFieldValues']
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
        $sdActivities = $this->SdCases->SdActivities->find('list', ['limit' => 200]);
        $sdUsers = $this->SdCases->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdCase', 'sdProductWorkflows', 'sdActivities', 'sdUsers'));
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
        $sdActivities = $this->SdCases->SdActivities->find('list', ['limit' => 200]);
        $sdUsers = $this->SdCases->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdCase', 'sdProductWorkflows', 'sdActivities', 'sdUsers'));
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
}
