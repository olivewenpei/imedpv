<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdProductAssignments Controller
 *
 * @property \App\Model\Table\SdProductAssignmentsTable $SdProductAssignments
 *
 * @method \App\Model\Entity\SdProductAssignment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdProductAssignmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdProducts', 'SdPhases', 'SdCompanies']
        ];
        $sdProductAssignments = $this->paginate($this->SdProductAssignments);

        $this->set(compact('sdProductAssignments'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Product Assignment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdProductAssignment = $this->SdProductAssignments->get($id, [
            'contain' => ['SdProducts', 'SdPhases', 'SdCompanies']
        ]);

        $this->set('sdProductAssignment', $sdProductAssignment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdProductAssignment = $this->SdProductAssignments->newEntity();
        if ($this->request->is('post')) {
            $sdProductAssignment = $this->SdProductAssignments->patchEntity($sdProductAssignment, $this->request->getData());
            if ($this->SdProductAssignments->save($sdProductAssignment)) {
                $this->Flash->success(__('The sd product assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product assignment could not be saved. Please, try again.'));
        }
        $sdProducts = $this->SdProductAssignments->SdProducts->find('list', ['limit' => 200]);
        $sdPhases = $this->SdProductAssignments->SdPhases->find('list', ['limit' => 200]);
        $sdCompanies = $this->SdProductAssignments->SdCompanies->find('list', ['limit' => 200]);
        $this->set(compact('sdProductAssignment', 'sdProducts', 'sdPhases', 'sdCompanies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Product Assignment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdProductAssignment = $this->SdProductAssignments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdProductAssignment = $this->SdProductAssignments->patchEntity($sdProductAssignment, $this->request->getData());
            if ($this->SdProductAssignments->save($sdProductAssignment)) {
                $this->Flash->success(__('The sd product assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product assignment could not be saved. Please, try again.'));
        }
        $sdProducts = $this->SdProductAssignments->SdProducts->find('list', ['limit' => 200]);
        $sdPhases = $this->SdProductAssignments->SdPhases->find('list', ['limit' => 200]);
        $sdCompanies = $this->SdProductAssignments->SdCompanies->find('list', ['limit' => 200]);
        $this->set(compact('sdProductAssignment', 'sdProducts', 'sdPhases', 'sdCompanies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Product Assignment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdProductAssignment = $this->SdProductAssignments->get($id);
        if ($this->SdProductAssignments->delete($sdProductAssignment)) {
            $this->Flash->success(__('The sd product assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The sd product assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
