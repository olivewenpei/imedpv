<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdPhaseRoleSectionPermissions Controller
 *
 * @property \App\Model\Table\SdPhaseRoleSectionPermissionsTable $SdPhaseRoleSectionPermissions
 *
 * @method \App\Model\Entity\SdPhaseRoleSectionPermission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdPhaseRoleSectionPermissionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdPhaseRolePermissions', 'SdSections']
        ];
        $sdPhaseRoleSectionPermissions = $this->paginate($this->SdPhaseRoleSectionPermissions);

        $this->set(compact('sdPhaseRoleSectionPermissions'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Phase Role Section Permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdPhaseRoleSectionPermission = $this->SdPhaseRoleSectionPermissions->get($id, [
            'contain' => ['SdPhaseRolePermissions', 'SdSections']
        ]);

        $this->set('sdPhaseRoleSectionPermission', $sdPhaseRoleSectionPermission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdPhaseRoleSectionPermission = $this->SdPhaseRoleSectionPermissions->newEntity();
        if ($this->request->is('post')) {
            $sdPhaseRoleSectionPermission = $this->SdPhaseRoleSectionPermissions->patchEntity($sdPhaseRoleSectionPermission, $this->request->getData());
            if ($this->SdPhaseRoleSectionPermissions->save($sdPhaseRoleSectionPermission)) {
                $this->Flash->success(__('The sd phase role section permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd phase role section permission could not be saved. Please, try again.'));
        }
        $sdPhaseRolePermissions = $this->SdPhaseRoleSectionPermissions->SdPhaseRolePermissions->find('list', ['limit' => 200]);
        $sdSections = $this->SdPhaseRoleSectionPermissions->SdSections->find('list', ['limit' => 200]);
        $this->set(compact('sdPhaseRoleSectionPermission', 'sdPhaseRolePermissions', 'sdSections'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Phase Role Section Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdPhaseRoleSectionPermission = $this->SdPhaseRoleSectionPermissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdPhaseRoleSectionPermission = $this->SdPhaseRoleSectionPermissions->patchEntity($sdPhaseRoleSectionPermission, $this->request->getData());
            if ($this->SdPhaseRoleSectionPermissions->save($sdPhaseRoleSectionPermission)) {
                $this->Flash->success(__('The sd phase role section permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd phase role section permission could not be saved. Please, try again.'));
        }
        $sdPhaseRolePermissions = $this->SdPhaseRoleSectionPermissions->SdPhaseRolePermissions->find('list', ['limit' => 200]);
        $sdSections = $this->SdPhaseRoleSectionPermissions->SdSections->find('list', ['limit' => 200]);
        $this->set(compact('sdPhaseRoleSectionPermission', 'sdPhaseRolePermissions', 'sdSections'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Phase Role Section Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdPhaseRoleSectionPermission = $this->SdPhaseRoleSectionPermissions->get($id);
        if ($this->SdPhaseRoleSectionPermissions->delete($sdPhaseRoleSectionPermission)) {
            $this->Flash->success(__('The sd phase role section permission has been deleted.'));
        } else {
            $this->Flash->error(__('The sd phase role section permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
