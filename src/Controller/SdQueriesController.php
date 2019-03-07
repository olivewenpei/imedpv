<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdQueries Controller
 *
 * @property \App\Model\Table\SdQueriesTable $SdQueries
 *
 * @method \App\Model\Entity\SdQuery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdQueriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdQueries = $this->paginate($this->SdQueries);

        $this->set(compact('sdQueries'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Query id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('main_layout');
        $sdQuery = $this->SdQueries->get($id);
        $userinfo = $this->request->session()->read('Auth.User');
        if(($sdQuery['sender']!=$userinfo['id'])&&($sdQuery['receiver']!=$userinfo['id']))
        {
            $this->Flash->error(__('Cannot find this query.'));
            $this->redirect($this->referer());
        }

        if($sdQuery['receiver']==$userinfo['id']){
            if(empty($sdQuery['read_date'])){
                $sdQuery['read_date'] = date("Y-m-d H:i:s");
                $this->SdQueries->save($sdQuery);
            }
        }
        $this->set('sdQuery', $sdQuery);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdQuery = $this->SdQueries->newEntity();
        if ($this->request->is('post')) {
            $sdQuery = $this->SdQueries->patchEntity($sdQuery, $this->request->getData());
            if ($this->SdQueries->save($sdQuery)) {
                $this->Flash->success(__('The sd query has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd query could not be saved. Please, try again.'));
        }
        $this->set(compact('sdQuery'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Query id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdQuery = $this->SdQueries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdQuery = $this->SdQueries->patchEntity($sdQuery, $this->request->getData());
            if ($this->SdQueries->save($sdQuery)) {
                $this->Flash->success(__('The sd query has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd query could not be saved. Please, try again.'));
        }
        $this->set(compact('sdQuery'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Query id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdQuery = $this->SdQueries->get($id);
        if ($this->SdQueries->delete($sdQuery)) {
            $this->Flash->success(__('The sd query has been deleted.'));
        } else {
            $this->Flash->error(__('The sd query could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    /**
     * Query Inbox
     *
     */
    public function queries($type = null){
        $userId = $this->request->getSession()->read('Auth.User.id');
        $this->viewBuilder()->layout('main_layout');
        switch ($type){
            case null:
                $sdQueries = $this->SdQueries->find()->where(['receiver'=>$userId,'receiver_status'=>1]);
                continue;
            case "unread":
                $sdQueries = $this->SdQueries->find()->where(['receiver'=>$userId,'receiver_status'=>1,'read_date IS NULL']);
                continue;
            case "deleted";
                $sdQueries = $this->SdQueries->find()->where(['receiver'=>$userId,'receiver_status'=>0]);
                continue;
            case "flaged";
                $sdQueries = $this->SdQueries->find()->where(['receiver'=>$userId,'receiver_status'=>2]);
                continue;
            case "system":
                $sdQueries = $this->SdQueries->find()->where(['receiver'=>$userId,'receiver_status'=>1,'query_type'=>1]);
                continue;
            case "sent":
                $sdQueries = $this->SdQueries->find()->where(['sender'=>$userId,'sender_deleted'=>0]);
                continue;
        }
        $this->set(compact('sdQueries'));
    }
    /**
     * Query Inbox Query Content
     *
     */
    public function querycontent($id = null)
    {
        $this->viewBuilder()->layout('main_layout');
        $sdQuery = $this->SdQueries->get($id);
        $userinfo = $this->request->session()->read('Auth.User');
        if(($sdQuery['sender']!=$userinfo['id'])&&($sdQuery['receiver']!=$userinfo['id']))
        {
            $this->Flash->error(__('Cannot find this query.'));
            $this->redirect($this->referer());
        }

        if($sdQuery['receiver']==$userinfo['id']){
            if(empty($sdQuery['read_date'])){
                $sdQuery['read_date'] = date("Y-m-d H:i:s");
                $this->SdQueries->save($sdQuery);
            }
        }
        $this->set('sdQuery', $sdQuery);
    }
}
