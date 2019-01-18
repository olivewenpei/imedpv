<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdProductTypes Controller
 *
 * @property \App\Model\Table\SdProductTypesTable $SdProductTypes
 *
 * @method \App\Model\Entity\SdProductType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdProductTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdProductTypes = $this->paginate($this->SdProductTypes);

        $this->set(compact('sdProductTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Product Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdProductType = $this->SdProductTypes->get($id, [
            'contain' => ['SdProducts']
        ]);

        $this->set('sdProductType', $sdProductType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdProductType = $this->SdProductTypes->newEntity();
        if ($this->request->is('post')) {
            $sdProductType = $this->SdProductTypes->patchEntity($sdProductType, $this->request->getData());
            if ($this->SdProductTypes->save($sdProductType)) {
                $this->Flash->success(__('The sd product type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product type could not be saved. Please, try again.'));
        }
        $this->set(compact('sdProductType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Product Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdProductType = $this->SdProductTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdProductType = $this->SdProductTypes->patchEntity($sdProductType, $this->request->getData());
            if ($this->SdProductTypes->save($sdProductType)) {
                $this->Flash->success(__('The sd product type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product type could not be saved. Please, try again.'));
        }
        $this->set(compact('sdProductType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Product Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdProductType = $this->SdProductTypes->get($id);
        if ($this->SdProductTypes->delete($sdProductType)) {
            $this->Flash->success(__('The sd product type has been deleted.'));
        } else {
            $this->Flash->error(__('The sd product type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
