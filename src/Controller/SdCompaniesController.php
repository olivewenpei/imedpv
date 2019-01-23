<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdCompanies Controller
 *
 * @property \App\Model\Table\SdCompaniesTable $SdCompanies
 *
 * @method \App\Model\Entity\SdCompany[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdCompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdUserTypes']
        ];
        $sdCompanies = $this->paginate($this->SdCompanies);

        $this->set(compact('sdCompanies'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdCompany = $this->SdCompanies->get($id, [
            'contain' => ['SdUserTypes', 'SdProductAssignments', 'SdUsers']
        ]);

        $this->set('sdCompany', $sdCompany);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdCompany = $this->SdCompanies->newEntity();
        if ($this->request->is('post')) {
            $sdCompany = $this->SdCompanies->patchEntity($sdCompany, $this->request->getData());
            if ($this->SdCompanies->save($sdCompany)) {
                $this->Flash->success(__('The sd company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd company could not be saved. Please, try again.'));
        }
        $sdUserTypes = $this->SdCompanies->SdUserTypes->find('list', ['limit' => 200]);
        $this->set(compact('sdCompany', 'sdUserTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdCompany = $this->SdCompanies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdCompany = $this->SdCompanies->patchEntity($sdCompany, $this->request->getData());
            if ($this->SdCompanies->save($sdCompany)) {
                $this->Flash->success(__('The sd company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd company could not be saved. Please, try again.'));
        }
        $sdUserTypes = $this->SdCompanies->SdUserTypes->find('list', ['limit' => 200]);
        $this->set(compact('sdCompany', 'sdUserTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdCompany = $this->SdCompanies->get($id);
        if ($this->SdCompanies->delete($sdCompany)) {
            $this->Flash->success(__('The sd company has been deleted.'));
        } else {
            $this->Flash->error(__('The sd company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
