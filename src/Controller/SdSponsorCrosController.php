<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdSponsorCros Controller
 *
 * @property \App\Model\Table\SdSponsorCrosTable $SdSponsorCros
 *
 * @method \App\Model\Entity\SdSponsorCro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdSponsorCrosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdSponsorCros = $this->paginate($this->SdSponsorCros);

        $this->set(compact('sdSponsorCros'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Sponsor Cro id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdSponsorCro = $this->SdSponsorCros->get($id, [
            'contain' => []
        ]);

        $this->set('sdSponsorCro', $sdSponsorCro);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdSponsorCro = $this->SdSponsorCros->newEntity();
        if ($this->request->is('post')) {
            $sdSponsorCro = $this->SdSponsorCros->patchEntity($sdSponsorCro, $this->request->getData());
            if ($this->SdSponsorCros->save($sdSponsorCro)) {
                $this->Flash->success(__('The sd sponsor cro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd sponsor cro could not be saved. Please, try again.'));
        }
        $this->set(compact('sdSponsorCro'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Sponsor Cro id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdSponsorCro = $this->SdSponsorCros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdSponsorCro = $this->SdSponsorCros->patchEntity($sdSponsorCro, $this->request->getData());
            if ($this->SdSponsorCros->save($sdSponsorCro)) {
                $this->Flash->success(__('The sd sponsor cro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd sponsor cro could not be saved. Please, try again.'));
        }
        $this->set(compact('sdSponsorCro'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Sponsor Cro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdSponsorCro = $this->SdSponsorCros->get($id);
        if ($this->SdSponsorCros->delete($sdSponsorCro)) {
            $this->Flash->success(__('The sd sponsor cro has been deleted.'));
        } else {
            $this->Flash->error(__('The sd sponsor cro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
