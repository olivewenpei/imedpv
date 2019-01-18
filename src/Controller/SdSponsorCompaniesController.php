<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdSponsorCompanies Controller
 *
 * @property \App\Model\Table\SdSponsorCompaniesTable $SdSponsorCompanies
 *
 * @method \App\Model\Entity\SdSponsorCompany[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdSponsorCompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdSponsorCompanies = $this->paginate($this->SdSponsorCompanies);

        $this->set(compact('sdSponsorCompanies'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Sponsor Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdSponsorCompany = $this->SdSponsorCompanies->get($id, [
            'contain' => ['SdProducts']
        ]);

        $this->set('sdSponsorCompany', $sdSponsorCompany);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdSponsorCompany = $this->SdSponsorCompanies->newEntity();
        if ($this->request->is('post')) {
            $sdSponsorCompany = $this->SdSponsorCompanies->patchEntity($sdSponsorCompany, $this->request->getData());
            if ($this->SdSponsorCompanies->save($sdSponsorCompany)) {
                $this->Flash->success(__('The sd sponsor company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd sponsor company could not be saved. Please, try again.'));
        }
        $this->set(compact('sdSponsorCompany'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Sponsor Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdSponsorCompany = $this->SdSponsorCompanies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdSponsorCompany = $this->SdSponsorCompanies->patchEntity($sdSponsorCompany, $this->request->getData());
            if ($this->SdSponsorCompanies->save($sdSponsorCompany)) {
                $this->Flash->success(__('The sd sponsor company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd sponsor company could not be saved. Please, try again.'));
        }
        $this->set(compact('sdSponsorCompany'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Sponsor Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdSponsorCompany = $this->SdSponsorCompanies->get($id);
        if ($this->SdSponsorCompanies->delete($sdSponsorCompany)) {
            $this->Flash->success(__('The sd sponsor company has been deleted.'));
        } else {
            $this->Flash->error(__('The sd sponsor company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
