<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdFields Controller
 *
 * @property \App\Model\Table\SdFieldsTable $SdFields
 *
 * @method \App\Model\Entity\SdField[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdFieldsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdElementTypes']
        ];
        $sdFields = $this->paginate($this->SdFields);

        $this->set(compact('sdFields'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Field id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdField = $this->SdFields->get($id, [
            'contain' => ['SdElementTypes', 'SdSectionStructures']
        ]);

        $this->set('sdField', $sdField);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdField = $this->SdFields->newEntity();
        if ($this->request->is('post')) {
            $sdField = $this->SdFields->patchEntity($sdField, $this->request->getData());
            if ($this->SdFields->save($sdField)) {
                $this->Flash->success(__('The sd field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd field could not be saved. Please, try again.'));
        }
        $sdElementTypes = $this->SdFields->SdElementTypes->find('list', ['limit' => 200]);
        $this->set(compact('sdField', 'sdElementTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Field id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdField = $this->SdFields->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdField = $this->SdFields->patchEntity($sdField, $this->request->getData());
            if ($this->SdFields->save($sdField)) {
                $this->Flash->success(__('The sd field has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd field could not be saved. Please, try again.'));
        }
        $sdElementTypes = $this->SdFields->SdElementTypes->find('list', ['limit' => 200]);
        $this->set(compact('sdField', 'sdElementTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Field id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdField = $this->SdFields->get($id);
        if ($this->SdFields->delete($sdField)) {
            $this->Flash->success(__('The sd field has been deleted.'));
        } else {
            $this->Flash->error(__('The sd field could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
