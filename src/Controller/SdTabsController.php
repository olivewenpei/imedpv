<?php
        namespace App\Controller;
        use Cake\ORM\TableRegistry;

        use App\Controller\AppController;
        use App\Controller\SdSectionController;

        /**
         * SdTabs Controller
         *
         * @property \App\Model\Table\SdTabsTable $SdTabs
         *
         * @method \App\Model\Entity\SdTab[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
         */
        class SdTabsController extends AppController
        {

            /**
             * Index method
             *
             * @return \Cake\Http\Response|void
             */
            public function index()
            {
                $sdTabs = $this->paginate($this->SdTabs);

                $this->set(compact('sdTabs'));
            }

            /**
             * Case number generator function
             * 
             * @return string case number 
             * 
             */
            private function caseNoGenerator(){
                
            }

            /**
             * ShowDetail method
             *                  
             * @return \Cake\Http\Response|void
             */
            public function showdetails($tabid = 1  )
            { 
                
                $sdTabs = $this->SdTabs->find()->select(['tab_name','display_order'])->where(['status'=>1])->order(['display_order' => 'ASC']);
                $this->viewBuilder()->layout('main_layout');
                $associated = ['SdSectionStructures','SdSectionStructures'=>['SdFields'=>['SdElementTypes'],'SdSectionValues']];
                $sdTab = TableRegistry::get('SdSections',['contain'=>$associated]);
                $sdFieldValues = TableRegistry::get('SdSectionValues',['contain'=>'SdElementTypes']);
                $sdSections = $sdTab ->find()->where(['sd_tab_id'=>$tabid,'status'=>true])
                                    ->order(['SdSections.section_level'=>'DESC','SdSections.display_order'=>'ASC'])
                                    ->contain(['SdSectionStructures'=>function($q){
                                        return $q->order(['SdSectionStructures.row_no'=>'ASC','SdSectionStructures.field_start_at'=>'ASC'])->contain(['SdFields'=>['SdFieldValueLookUps','SdElementTypes'=> function($q){
                                    return $q->select('type_name')->where(['SdElementTypes.status'=>true]);//display order
                                        }],'SdSectionValues'=> function ($q) {
                                    return $q->where(['SdSectionValues.status' => true]);
                                }]);}]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $patchedSections =$sdTab->patchEntities($sdSections,$this->request->getData(),['associated' =>$associated]);
                    foreach ($patchedSections as $sectionEntity) {
                        foreach($sectionEntity->sd_section_structures as $sectionStructureEntity){
                            foreach($sectionStructureEntity->sd_section_values as $sectionValue){
                                if(array_key_exists('id',$sectionValue)){//add judging whether updateing Using Validate
                                    $sdFieldValueEntity = $sdFieldValues->get($sectionValue['id']);/**add last-updated time */                            
                                    $sdFieldValues->patchEntity($sdFieldValueEntity,$sectionValue);/*debug($sdFieldValueEntity);*/
                                    if(!$sdFieldValues->save($sdFieldValueEntity)) echo "error in updating!" ;
                                }elseif($sectionValue['field_value'] != null){          
                                    $sdFieldValueEntity = $sdFieldValues->newEntity();/**add created time */
                                    $sdFieldValueEntity = $sdFieldValues->patchEntity($sdFieldValueEntity, $sectionValue);/*debug($sdFieldValueEntity);*/
                                    if(!$sdFieldValues->save($sdFieldValueEntity)) echo "error in adding!" ;
                                }
                            }
                        }                   
                    }
                }      
   
                $this->set(compact('sdSections','sdTabs'));
            }
            /**
             * 
             * build_sorter method
             * 
             * 
             * 
             */
            public function build_sorter($key) {
                return function ($a, $b) use ($key) {
                    return strnatcmp($a[$key], $b[$key]);
                };
            }
            
            /**
            * View method
            *
            * @param string|null $id Sd Tab id.
            * @return \Cake\Http\Response|void
            * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
            */
            public function view($id = null)
            {
                $sdTab = $this->SdTabs->get($id, [
                    'contain' => ['SdSections']
                ]);
                $this->set(compact('sdTab'));
            }

            /**
            * Add method
            *
            * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
            */
            public function add()
            {
                $sdTab = $this->SdTabs->newEntity();
                if ($this->request->is('post')) {
                    $sdTab = $this->SdTabs->patchEntity($sdTab, $this->request->getData());
                    if ($this->SdTabs->save($sdTab)) {
                        $this->Flash->success(__('The sd tab has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The sd tab could not be saved. Please, try again.'));
                }
                $this->set(compact('sdTab'));
            }

            /**
            * Edit method
            *
            * @param string|null $id Sd Tab id.
            * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
            * @throws \Cake\Network\Exception\NotFoundException When record not found.
            */
            public function edit($id = null)
            {
                $sdTab = $this->SdTabs->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $sdTab = $this->SdTabs->patchEntity($sdTab, $this->request->getData());
                    debug($sdTab);
                    if ($this->SdTabs->save($sdTab)) {
                        $this->Flash->success(__('The sd tab has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('The sd tab could not be saved. Please, try again.'));
                }
                $this->set(compact('sdTab'));
            }

            /**
            * Delete method
            *
            * @param string|null $id Sd Tab id.
            * @return \Cake\Http\Response|null Redirects to index.
            * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
            */
            public function delete($id = null)
            {
                $this->request->allowMethod(['post', 'delete']);
                $sdTab = $this->SdTabs->get($id);
                if ($this->SdTabs->delete($sdTab)) {
                    $this->Flash->success(__('The sd tab has been deleted.'));
                } else {
                    $this->Flash->error(__('The sd tab could not be deleted. Please, try again.'));
                }

                return $this->redirect(['action' => 'index']);
            }
            /**
            * 
            * 
            */
            public function tabnavbar(){
                $sdTabs = $this->SdTabs->find()->select(['tab_name','display_order'])->where(['status'=>1])->order(['display_order' => 'ASC']);
                $this->set(compact('sdTabs'));
            }

        }
