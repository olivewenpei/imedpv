<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdRoles Controller
 *
 * @property \App\Model\Table\SdRolesTable $SdRoles
 *
 * @method \App\Model\Entity\SdRole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdRolesController extends AppController
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
        $sdRoles = $this->paginate($this->SdRoles);

        $this->set(compact('sdRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdRole = $this->SdRoles->get($id, [
            'contain' => ['SdUserTypes', 'SdUsers']
        ]);

        $this->set('sdRole', $sdRole);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdRole = $this->SdRoles->newEntity();
        if ($this->request->is('post')) {
            $sdRole = $this->SdRoles->patchEntity($sdRole, $this->request->getData());
            if ($this->SdRoles->save($sdRole)) {
                $this->Flash->success(__('The sd role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd role could not be saved. Please, try again.'));
        }
        $sdUserTypes = $this->SdRoles->SdUserTypes->find('list', ['limit' => 200]);
        $this->set(compact('sdRole', 'sdUserTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdRole = $this->SdRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdRole = $this->SdRoles->patchEntity($sdRole, $this->request->getData());
            if ($this->SdRoles->save($sdRole)) {
                $this->Flash->success(__('The sd role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd role could not be saved. Please, try again.'));
        }
        $sdUserTypes = $this->SdRoles->SdUserTypes->find('list', ['limit' => 200]);
        $this->set(compact('sdRole', 'sdUserTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdRole = $this->SdRoles->get($id);
        if ($this->SdRoles->delete($sdRole)) {
            $this->Flash->success(__('The sd role has been deleted.'));
        } else {
            $this->Flash->error(__('The sd role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
