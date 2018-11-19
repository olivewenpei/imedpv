<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdUserAssignments Controller
 *
 * @property \App\Model\Table\SdUserAssignmentsTable $SdUserAssignments
 *
 * @method \App\Model\Entity\SdUserAssignment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdUserAssignmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdStudyAssignments', 'SdUsers']
        ];
        $sdUserAssignments = $this->paginate($this->SdUserAssignments);

        $this->set(compact('sdUserAssignments'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd User Assignment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdUserAssignment = $this->SdUserAssignments->get($id, [
            'contain' => ['SdStudyAssignments', 'SdUsers']
        ]);

        $this->set('sdUserAssignment', $sdUserAssignment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdUserAssignment = $this->SdUserAssignments->newEntity();
        if ($this->request->is('post')) {
            $sdUserAssignment = $this->SdUserAssignments->patchEntity($sdUserAssignment, $this->request->getData());
            if ($this->SdUserAssignments->save($sdUserAssignment)) {
                $this->Flash->success(__('The sd user assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd user assignment could not be saved. Please, try again.'));
        }
        $sdStudyAssignments = $this->SdUserAssignments->SdStudyAssignments->find('list', ['limit' => 200]);
        $sdUsers = $this->SdUserAssignments->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdUserAssignment', 'sdStudyAssignments', 'sdUsers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd User Assignment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdUserAssignment = $this->SdUserAssignments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdUserAssignment = $this->SdUserAssignments->patchEntity($sdUserAssignment, $this->request->getData());
            if ($this->SdUserAssignments->save($sdUserAssignment)) {
                $this->Flash->success(__('The sd user assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd user assignment could not be saved. Please, try again.'));
        }
        $sdStudyAssignments = $this->SdUserAssignments->SdStudyAssignments->find('list', ['limit' => 200]);
        $sdUsers = $this->SdUserAssignments->SdUsers->find('list', ['limit' => 200]);
        $this->set(compact('sdUserAssignment', 'sdStudyAssignments', 'sdUsers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd User Assignment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdUserAssignment = $this->SdUserAssignments->get($id);
        if ($this->SdUserAssignments->delete($sdUserAssignment)) {
            $this->Flash->success(__('The sd user assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The sd user assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
