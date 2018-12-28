<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdActivityLog Controller
 *
 * @property \App\Model\Table\SdActivityLogTable $SdActivityLog
 *
 * @method \App\Model\Entity\SdActivityLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdActivityLogController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdUsers', 'SdSectionValues']
        ];
        $sdActivityLog = $this->paginate($this->SdActivityLog);

        $this->set(compact('sdActivityLog'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Activity Log id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdActivityLog = $this->SdActivityLog->get($id, [
            'contain' => ['SdUsers', 'SdSectionValues']
        ]);

        $this->set('sdActivityLog', $sdActivityLog);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdActivityLog = $this->SdActivityLog->newEntity();
        if ($this->request->is('post')) {
            $sdActivityLog = $this->SdActivityLog->patchEntity($sdActivityLog, $this->request->getData());
            if ($this->SdActivityLog->save($sdActivityLog)) {
                $this->Flash->success(__('The sd activity log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd activity log could not be saved. Please, try again.'));
        }
        $sdUsers = $this->SdActivityLog->SdUsers->find('list', ['limit' => 200]);
        $sdSectionValues = $this->SdActivityLog->SdSectionValues->find('list', ['limit' => 200]);
        $this->set(compact('sdActivityLog', 'sdUsers', 'sdSectionValues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Activity Log id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdActivityLog = $this->SdActivityLog->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdActivityLog = $this->SdActivityLog->patchEntity($sdActivityLog, $this->request->getData());
            if ($this->SdActivityLog->save($sdActivityLog)) {
                $this->Flash->success(__('The sd activity log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd activity log could not be saved. Please, try again.'));
        }
        $sdUsers = $this->SdActivityLog->SdUsers->find('list', ['limit' => 200]);
        $sdSectionValues = $this->SdActivityLog->SdSectionValues->find('list', ['limit' => 200]);
        $this->set(compact('sdActivityLog', 'sdUsers', 'sdSectionValues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Activity Log id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdActivityLog = $this->SdActivityLog->get($id);
        if ($this->SdActivityLog->delete($sdActivityLog)) {
            $this->Flash->success(__('The sd activity log has been deleted.'));
        } else {
            $this->Flash->error(__('The sd activity log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
