<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdPhases Controller
 *
 * @property \App\Model\Table\SdPhasesTable $SdPhases
 *
 * @method \App\Model\Entity\SdPhase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdPhasesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdWorkflows']
        ];
        $sdPhases = $this->paginate($this->SdPhases);

        $this->set(compact('sdPhases'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Phase id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdPhase = $this->SdPhases->get($id, [
            'contain' => ['SdWorkflows', 'SdCases', 'SdPhaseRolePermissions', 'SdProductAssignments']
        ]);

        $this->set('sdPhase', $sdPhase);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdPhase = $this->SdPhases->newEntity();
        if ($this->request->is('post')) {
            $sdPhase = $this->SdPhases->patchEntity($sdPhase, $this->request->getData());
            if ($this->SdPhases->save($sdPhase)) {
                $this->Flash->success(__('The sd phase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd phase could not be saved. Please, try again.'));
        }
        $sdWorkflows = $this->SdPhases->SdWorkflows->find('list', ['limit' => 200]);
        $this->set(compact('sdPhase', 'sdWorkflows'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Phase id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdPhase = $this->SdPhases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdPhase = $this->SdPhases->patchEntity($sdPhase, $this->request->getData());
            if ($this->SdPhases->save($sdPhase)) {
                $this->Flash->success(__('The sd phase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd phase could not be saved. Please, try again.'));
        }
        $sdWorkflows = $this->SdPhases->SdWorkflows->find('list', ['limit' => 200]);
        $this->set(compact('sdPhase', 'sdWorkflows'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Phase id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdPhase = $this->SdPhases->get($id);
        if ($this->SdPhases->delete($sdPhase)) {
            $this->Flash->success(__('The sd phase has been deleted.'));
        } else {
            $this->Flash->error(__('The sd phase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
