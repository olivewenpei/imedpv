<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdUsers Controller
 *
 * @property \App\Model\Table\SdUsersTable $SdUsers
 *
 * @method \App\Model\Entity\SdUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdRoles', 'SdCompanies']
        ];
        $sdUsers = $this->paginate($this->SdUsers);

        $this->set(compact('sdUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdUser = $this->SdUsers->get($id, [
            'contain' => ['SdRoles', 'SdCompanies', 'SdActivityLog']
        ]);

        $this->set('sdUser', $sdUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdUser = $this->SdUsers->newEntity();
        if ($this->request->is('post')) {
            $sdUser = $this->SdUsers->patchEntity($sdUser, $this->request->getData());
            if ($this->SdUsers->save($sdUser)) {
                $this->Flash->success(__('The sd user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd user could not be saved. Please, try again.'));
        }
        $sdRoles = $this->SdUsers->SdRoles->find('list', ['limit' => 200]);
        $sdCompanies = $this->SdUsers->SdCompanies->find('list', ['limit' => 200]);
        $this->set(compact('sdUser', 'sdRoles', 'sdCompanies'));
    }
    /**
     *
     * get user info from cro
     */
    public function searchResource()
    {
        $result = array();
        if($this->request->is('POST')){
            $this->autoRender = false;
            $searchKey = $this->request->getData();
            try{
                $query = $this->SdUsers->find()
                                ->select(['id','firstname', 'lastname'])
                                ->where(['sd_company_id'=>$searchKey['id']])
                                ->order(['id' => 'ASC'])->all();
            }catch (\PDOException $e){
                echo "cannot the case find in database";
            };
            echo json_encode($query);
            die();
        } else $this->autoRender = true;
    }
    /**
     * Edit method
     *
     * @param string|null $id Sd User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdUser = $this->SdUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdUser = $this->SdUsers->patchEntity($sdUser, $this->request->getData());
            if ($this->SdUsers->save($sdUser)) {
                $this->Flash->success(__('The sd user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd user could not be saved. Please, try again.'));
        }
        $sdRoles = $this->SdUsers->SdRoles->find('list', ['limit' => 200]);
        $sdCompanies = $this->SdUsers->SdCompanies->find('list', ['limit' => 200]);
        $this->set(compact('sdUser', 'sdRoles', 'sdCompanies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdUser = $this->SdUsers->get($id);
        if ($this->SdUsers->delete($sdUser)) {
            $this->Flash->success(__('The sd user has been deleted.'));
        } else {
            $this->Flash->error(__('The sd user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout']);
    }

    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function login() {
        $this->viewBuilder()->layout('login');
            if ($this->request->is('post')) {
                $sdUser = $this->Auth->identify();
                if ($sdUser) {
                    $this->Auth->setUser($sdUser);
                    return $this->redirect($this->Auth->redirectUrl(
                        // Set the first page after user logged in
                        ['controller' => 'dashboards','action' => 'index']
                    )
                );
                }else {
                    $this->Flash->error(__('Sorry, your username or password is wrong!'));
                }
            }
    }

    public function myaccount() {
        $this->viewBuilder()->layout('main_layout');

        $userID = $this->request->session()->read('Auth.User.id');
        $this->set(compact('userID'));
    }
}
