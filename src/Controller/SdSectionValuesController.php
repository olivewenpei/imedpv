<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdSectionValues Controller
 *
 * @property \App\Model\Table\SdSectionValuesTable $SdSectionValues
 *
 * @method \App\Model\Entity\SdSectionValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdSectionValuesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdSectionStructures']
        ];
        $sdSectionValues = $this->paginate($this->SdSectionValues);

        $this->set(compact('sdSectionValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Section Value id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdSectionValue = $this->SdSectionValues->get($id, [
            'contain' => ['SdSectionStructures', 'SdActivityLog']
        ]);

        $this->set('sdSectionValue', $sdSectionValue);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdSectionValue = $this->SdSectionValues->newEntity();
        if ($this->request->is('post')) {
            $sdSectionValue = $this->SdSectionValues->patchEntity($sdSectionValue, $this->request->getData());
            if ($this->SdSectionValues->save($sdSectionValue)) {
                $this->Flash->success(__('The sd section value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd section value could not be saved. Please, try again.'));
        }
        $sdSectionStructures = $this->SdSectionValues->SdSectionStructures->find('list', ['limit' => 200]);
        $this->set(compact('sdSectionValue', 'sdSectionStructures'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Section Value id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdSectionValue = $this->SdSectionValues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdSectionValue = $this->SdSectionValues->patchEntity($sdSectionValue, $this->request->getData());
            if ($this->SdSectionValues->save($sdSectionValue)) {
                $this->Flash->success(__('The sd section value has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd section value could not be saved. Please, try again.'));
        }
        $sdSectionStructures = $this->SdSectionValues->SdSectionStructures->find('list', ['limit' => 200]);
        $this->set(compact('sdSectionValue', 'sdSectionStructures'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Section Value id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdSectionValue = $this->SdSectionValues->get($id);
        if ($this->SdSectionValues->delete($sdSectionValue)) {
            $this->Flash->success(__('The sd section value has been deleted.'));
        } else {
            $this->Flash->error(__('The sd section value could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
