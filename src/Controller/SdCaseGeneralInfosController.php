<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdCaseGeneralInfos Controller
 *
 * @property \App\Model\Table\SdCaseGeneralInfosTable $SdCaseGeneralInfos
 *
 * @method \App\Model\Entity\SdCaseGeneralInfo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdCaseGeneralInfosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdCases']
        ];
        $sdCaseGeneralInfos = $this->paginate($this->SdCaseGeneralInfos);

        $this->set(compact('sdCaseGeneralInfos'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Case General Info id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdCaseGeneralInfo = $this->SdCaseGeneralInfos->get($id, [
            'contain' => ['SdCases']
        ]);

        $this->set('sdCaseGeneralInfo', $sdCaseGeneralInfo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdCaseGeneralInfo = $this->SdCaseGeneralInfos->newEntity();
        if ($this->request->is('post')) {
            $sdCaseGeneralInfo = $this->SdCaseGeneralInfos->patchEntity($sdCaseGeneralInfo, $this->request->getData());
            if ($this->SdCaseGeneralInfos->save($sdCaseGeneralInfo)) {
                $this->Flash->success(__('The sd case general info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd case general info could not be saved. Please, try again.'));
        }
        $sdCases = $this->SdCaseGeneralInfos->SdCases->find('list', ['limit' => 200]);
        $this->set(compact('sdCaseGeneralInfo', 'sdCases'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Case General Info id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdCaseGeneralInfo = $this->SdCaseGeneralInfos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdCaseGeneralInfo = $this->SdCaseGeneralInfos->patchEntity($sdCaseGeneralInfo, $this->request->getData());
            if ($this->SdCaseGeneralInfos->save($sdCaseGeneralInfo)) {
                $this->Flash->success(__('The sd case general info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd case general info could not be saved. Please, try again.'));
        }
        $sdCases = $this->SdCaseGeneralInfos->SdCases->find('list', ['limit' => 200]);
        $this->set(compact('sdCaseGeneralInfo', 'sdCases'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Case General Info id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdCaseGeneralInfo = $this->SdCaseGeneralInfos->get($id);
        if ($this->SdCaseGeneralInfos->delete($sdCaseGeneralInfo)) {
            $this->Flash->success(__('The sd case general info has been deleted.'));
        } else {
            $this->Flash->error(__('The sd case general info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
