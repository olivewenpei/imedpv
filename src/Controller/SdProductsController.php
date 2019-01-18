<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdProducts Controller
 *
 * @property \App\Model\Table\SdProductsTable $SdProducts
 *
 * @method \App\Model\Entity\SdProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdProducts = $this->paginate($this->SdProducts);

        $this->set(compact('sdProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdProduct = $this->SdProducts->get($id, [
            'contain' => ['SdProductWorkflows']
        ]);

        $this->set('sdProduct', $sdProduct);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdProduct = $this->SdProducts->newEntity();
        if ($this->request->is('post')) {
            $sdProduct = $this->SdProducts->patchEntity($sdProduct, $this->request->getData());
            if ($this->SdProducts->save($sdProduct)) {
                $this->Flash->success(__('The sd product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product could not be saved. Please, try again.'));
        }
        $this->set(compact('sdProduct'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdProduct = $this->SdProducts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdProduct = $this->SdProducts->patchEntity($sdProduct, $this->request->getData());
            if ($this->SdProducts->save($sdProduct)) {
                $this->Flash->success(__('The sd product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd product could not be saved. Please, try again.'));
        }
        $this->set(compact('sdProduct'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdProduct = $this->SdProducts->get($id);
        if ($this->SdProducts->delete($sdProduct)) {
            $this->Flash->success(__('The sd product has been deleted.'));
        } else {
            $this->Flash->error(__('The sd product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
