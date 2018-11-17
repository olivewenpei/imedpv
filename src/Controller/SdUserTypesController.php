<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdUserTypes Controller
 *
 * @property \App\Model\Table\SdUserTypesTable $SdUserTypes
 *
 * @method \App\Model\Entity\SdUserType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdUserTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdUserTypes = $this->paginate($this->SdUserTypes);

        $this->set(compact('sdUserTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd User Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdUserType = $this->SdUserTypes->get($id, [
            'contain' => ['SdCompanies', 'SdRoles']
        ]);

        $this->set('sdUserType', $sdUserType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdUserType = $this->SdUserTypes->newEntity();
        if ($this->request->is('post')) {
            $sdUserType = $this->SdUserTypes->patchEntity($sdUserType, $this->request->getData());
            if ($this->SdUserTypes->save($sdUserType)) {
                $this->Flash->success(__('The sd user type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd user type could not be saved. Please, try again.'));
        }
        $this->set(compact('sdUserType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd User Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdUserType = $this->SdUserTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdUserType = $this->SdUserTypes->patchEntity($sdUserType, $this->request->getData());
            if ($this->SdUserTypes->save($sdUserType)) {
                $this->Flash->success(__('The sd user type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd user type could not be saved. Please, try again.'));
        }
        $this->set(compact('sdUserType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd User Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdUserType = $this->SdUserTypes->get($id);
        if ($this->SdUserTypes->delete($sdUserType)) {
            $this->Flash->success(__('The sd user type has been deleted.'));
        } else {
            $this->Flash->error(__('The sd user type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
