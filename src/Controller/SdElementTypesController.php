<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdElementTypes Controller
 *
 * @property \App\Model\Table\SdElementTypesTable $SdElementTypes
 *
 * @method \App\Model\Entity\SdElementType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdElementTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $sdElementTypes = $this->paginate($this->SdElementTypes);

        $this->set(compact('sdElementTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Element Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdElementType = $this->SdElementTypes->get($id, [
            'contain' => ['SdFields']
        ]);

        $this->set('sdElementType', $sdElementType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdElementType = $this->SdElementTypes->newEntity();
        if ($this->request->is('post')) {
            $sdElementType = $this->SdElementTypes->patchEntity($sdElementType, $this->request->getData());
            if ($this->SdElementTypes->save($sdElementType)) {
                $this->Flash->success(__('The sd element type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd element type could not be saved. Please, try again.'));
        }
        $this->set(compact('sdElementType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Element Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdElementType = $this->SdElementTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdElementType = $this->SdElementTypes->patchEntity($sdElementType, $this->request->getData());
            if ($this->SdElementTypes->save($sdElementType)) {
                $this->Flash->success(__('The sd element type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd element type could not be saved. Please, try again.'));
        }
        $this->set(compact('sdElementType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Element Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdElementType = $this->SdElementTypes->get($id);
        if ($this->SdElementTypes->delete($sdElementType)) {
            $this->Flash->success(__('The sd element type has been deleted.'));
        } else {
            $this->Flash->error(__('The sd element type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
