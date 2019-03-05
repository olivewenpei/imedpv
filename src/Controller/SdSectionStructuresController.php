<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SdSectionStructures Controller
 *
 * @property \App\Model\Table\SdSectionStructuresTable $SdSectionStructures
 *
 * @method \App\Model\Entity\SdSectionStructure[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdSectionStructuresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdSections', 'SdFields']
        ];
        $sdSectionStructures = $this->paginate($this->SdSectionStructures);

        $this->set(compact('sdSectionStructures'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Section Structure id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdSectionStructure = $this->SdSectionStructures->get($id, [
            'contain' => ['SdSections', 'SdFields', 'SdSectionValues']
        ]);

        $this->set('sdSectionStructure', $sdSectionStructure);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdSectionStructure = $this->SdSectionStructures->newEntity();
        if ($this->request->is('post')) {
            $sdSectionStructure = $this->SdSectionStructures->patchEntity($sdSectionStructure, $this->request->getData());
            if ($this->SdSectionStructures->save($sdSectionStructure)) {
                $this->Flash->success(__('The sd section structure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd section structure could not be saved. Please, try again.'));
        }
        $sdSections = $this->SdSectionStructures->SdSections->find('list', ['limit' => 200]);
        $sdFields = $this->SdSectionStructures->SdFields->find('list', ['limit' => 200]);
        $this->set(compact('sdSectionStructure', 'sdSections', 'sdFields'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sd Section Structure id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdSectionStructure = $this->SdSectionStructures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdSectionStructure = $this->SdSectionStructures->patchEntity($sdSectionStructure, $this->request->getData());
            if ($this->SdSectionStructures->save($sdSectionStructure)) {
                $this->Flash->success(__('The sd section structure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd section structure could not be saved. Please, try again.'));
        }
        $sdSections = $this->SdSectionStructures->SdSections->find('list', ['limit' => 200]);
        $sdFields = $this->SdSectionStructures->SdFields->find('list', ['limit' => 200]);
        $this->set(compact('sdSectionStructure', 'sdSections', 'sdFields'));
    }
    /**
     * 
     * Search Structure
     * 
     * 
     */
    public function search(){
        
    }
    /**
     * Delete method
     *
     * @param string|null $id Sd Section Structure id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdSectionStructure = $this->SdSectionStructures->get($id);
        if ($this->SdSectionStructures->delete($sdSectionStructure)) {
            $this->Flash->success(__('The sd section structure has been deleted.'));
        } else {
            $this->Flash->error(__('The sd section structure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
