<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdSponsorCallcenters Controller
 *
 * @property \App\Model\Table\SdSponsorCallcentersTable $SdSponsorCallcenters
 *
 * @method \App\Model\Entity\SdSponsorCallcenter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdSponsorCallcentersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdSponsorCallcenters = $this->paginate($this->SdSponsorCallcenters);

        $this->set(compact('sdSponsorCallcenters'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Sponsor Callcenter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdSponsorCallcenter = $this->SdSponsorCallcenters->get($id, [
            'contain' => []
        ]);

        $this->set('sdSponsorCallcenter', $sdSponsorCallcenter);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdSponsorCallcenter = $this->SdSponsorCallcenters->newEntity();
        if ($this->request->is('post')) {
            $sdSponsorCallcenter = $this->SdSponsorCallcenters->patchEntity($sdSponsorCallcenter, $this->request->getData());
            if ($this->SdSponsorCallcenters->save($sdSponsorCallcenter)) {
                $this->Flash->success(__('The sd sponsor callcenter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd sponsor callcenter could not be saved. Please, try again.'));
        }
        $this->set(compact('sdSponsorCallcenter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Sponsor Callcenter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdSponsorCallcenter = $this->SdSponsorCallcenters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdSponsorCallcenter = $this->SdSponsorCallcenters->patchEntity($sdSponsorCallcenter, $this->request->getData());
            if ($this->SdSponsorCallcenters->save($sdSponsorCallcenter)) {
                $this->Flash->success(__('The sd sponsor callcenter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd sponsor callcenter could not be saved. Please, try again.'));
        }
        $this->set(compact('sdSponsorCallcenter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Sponsor Callcenter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdSponsorCallcenter = $this->SdSponsorCallcenters->get($id);
        if ($this->SdSponsorCallcenters->delete($sdSponsorCallcenter)) {
            $this->Flash->success(__('The sd sponsor callcenter has been deleted.'));
        } else {
            $this->Flash->error(__('The sd sponsor callcenter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
