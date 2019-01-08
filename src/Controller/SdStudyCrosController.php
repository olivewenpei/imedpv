<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdStudyCros Controller
 *
 * @property \App\Model\Table\SdStudyCrosTable $SdStudyCros
 *
 * @method \App\Model\Entity\SdStudyCro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdStudyCrosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdStudies']
        ];
        $sdStudyCros = $this->paginate($this->SdStudyCros);

        $this->set(compact('sdStudyCros'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Study Cro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdStudyCro = $this->SdStudyCros->get($id, [
            'contain' => ['SdStudies']
        ]);

        $this->set('sdStudyCro', $sdStudyCro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdStudyCro = $this->SdStudyCros->newEntity();
        if ($this->request->is('post')) {
            $sdStudyCro = $this->SdStudyCros->patchEntity($sdStudyCro, $this->request->getData());
            if ($this->SdStudyCros->save($sdStudyCro)) {
                $this->Flash->success(__('The sd study cro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd study cro could not be saved. Please, try again.'));
        }
        $sdStudies = $this->SdStudyCros->SdStudies->find('list', ['limit' => 200]);
        $this->set(compact('sdStudyCro', 'sdStudies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Study Cro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdStudyCro = $this->SdStudyCros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdStudyCro = $this->SdStudyCros->patchEntity($sdStudyCro, $this->request->getData());
            if ($this->SdStudyCros->save($sdStudyCro)) {
                $this->Flash->success(__('The sd study cro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd study cro could not be saved. Please, try again.'));
        }
        $sdStudies = $this->SdStudyCros->SdStudies->find('list', ['limit' => 200]);
        $this->set(compact('sdStudyCro', 'sdStudies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Study Cro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdStudyCro = $this->SdStudyCros->get($id);
        if ($this->SdStudyCros->delete($sdStudyCro)) {
            $this->Flash->success(__('The sd study cro has been deleted.'));
        } else {
            $this->Flash->error(__('The sd study cro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
