<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdPhaseRolePermissions Controller
 *
 * @property \App\Model\Table\SdPhaseRolePermissionsTable $SdPhaseRolePermissions
 *
 * @method \App\Model\Entity\SdPhaseRolePermission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdPhaseRolePermissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdPhases', 'SdRoles']
        ];
        $sdPhaseRolePermissions = $this->paginate($this->SdPhaseRolePermissions);

        $this->set(compact('sdPhaseRolePermissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Phase Role Permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdPhaseRolePermission = $this->SdPhaseRolePermissions->get($id, [
            'contain' => ['SdPhases', 'SdRoles', 'SdPhaseRoleSectionPermissions']
        ]);

        $this->set('sdPhaseRolePermission', $sdPhaseRolePermission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdPhaseRolePermission = $this->SdPhaseRolePermissions->newEntity();
        if ($this->request->is('post')) {
            $sdPhaseRolePermission = $this->SdPhaseRolePermissions->patchEntity($sdPhaseRolePermission, $this->request->getData());
            if ($this->SdPhaseRolePermissions->save($sdPhaseRolePermission)) {
                $this->Flash->success(__('The sd phase role permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd phase role permission could not be saved. Please, try again.'));
        }
        $sdPhases = $this->SdPhaseRolePermissions->SdPhases->find('list', ['limit' => 200]);
        $sdRoles = $this->SdPhaseRolePermissions->SdRoles->find('list', ['limit' => 200]);
        $this->set(compact('sdPhaseRolePermission', 'sdPhases', 'sdRoles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Phase Role Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdPhaseRolePermission = $this->SdPhaseRolePermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdPhaseRolePermission = $this->SdPhaseRolePermissions->patchEntity($sdPhaseRolePermission, $this->request->getData());
            if ($this->SdPhaseRolePermissions->save($sdPhaseRolePermission)) {
                $this->Flash->success(__('The sd phase role permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd phase role permission could not be saved. Please, try again.'));
        }
        $sdPhases = $this->SdPhaseRolePermissions->SdPhases->find('list', ['limit' => 200]);
        $sdRoles = $this->SdPhaseRolePermissions->SdRoles->find('list', ['limit' => 200]);
        $this->set(compact('sdPhaseRolePermission', 'sdPhases', 'sdRoles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Phase Role Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdPhaseRolePermission = $this->SdPhaseRolePermissions->get($id);
        if ($this->SdPhaseRolePermissions->delete($sdPhaseRolePermission)) {
            $this->Flash->success(__('The sd phase role permission has been deleted.'));
        } else {
            $this->Flash->error(__('The sd phase role permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
