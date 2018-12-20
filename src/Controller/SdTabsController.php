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
                $caseNo = $this->request->getQuery('caseNo');
                $setNo = $this->request->getQuery('setNo');
                if(empty($setNo)) $setNo = "1";
                $sdTabs = $this->SdTabs->find()->select(['tab_name','display_order'])->where(['status'=>1])->order(['display_order' => 'ASC']);
                $this->viewBuilder()->layout('main_layout');
                $associated = ['SdSectionStructures','SdSectionStructures'=>['SdFields'=>['SdElementTypes','SdFieldValues']]];
                $sdTab = TableRegistry::get('SdSections',['contain'=>$associated]);
                $sdSections = $sdTab ->find()->where(['sd_tab_id'=>$tabid,'status'=>true])
                                    ->order(['SdSections.section_level'=>'DESC','SdSections.display_order'=>'ASC'])
                                    ->contain(['SdSectionStructures'=>function($q)use($caseNo){
                                        return $q->order(['SdSectionStructures.row_no'=>'ASC','SdSectionStructures.field_start_at'=>'ASC'])
                                            ->contain(['SdFields'=>['SdFieldValueLookUps','SdFieldValues'=> function ($q)use($caseNo) {
                                                return $q->where(['SdFieldValues.sd_case_id'=>$caseNo]);
                                            }, 'SdElementTypes'=> function($q){
                                            return $q->select('type_name')->where(['SdElementTypes.status'=>true]);
                                                }]]);
                                    }]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $requstData = $this->request->getData();
                    $sdFieldValues = TableRegistry::get('SdFieldValues',['contain'=>'SdElementTypes']);
                    foreach($requstData['sd_field_values'] as $sectionValueK => $sectionValue) {
                        foreach($sectionValue as $sectionFieldK =>$sectionFieldValue){
                            if($sectionFieldValue['id']!=null){//add judging whether updateing Using Validate
                                $sdFieldValueEntity = $sdFieldValues->get($sectionFieldValue['id']);/**add last-updated time */
                                $sdFieldValues->patchEntity($sdFieldValueEntity,$sectionFieldValue);
                                if(!$sdFieldValues->save($sdFieldValueEntity)) echo "error in updating!" ;
                            }elseif(!empty($sectionFieldValue['field_value'])){
                                $sdFieldValueEntity = $sdFieldValues->newEntity();
                                $dataSet = [
                                    'sd_case_id' => $caseNo,
                                    'version_no' => '1',
                                    'sd_field_id' => $sectionFieldValue['sd_field_id'],
                                    'set_number' => $sectionFieldValue['set_number'],
                                    'created_time' =>date("Y-m-d H:i:s"),
                                    'field_value' =>$sectionFieldValue['field_value'],
                                    'status' =>'1',
                                ];
                                $sdFieldValueEntity = $sdFieldValues->patchEntity($sdFieldValueEntity, $dataSet);
                                if(!$sdFieldValues->save($sdFieldValueEntity)) echo "error in adding!" ;
                            }
                        }
                    };
                }

                $this->set(compact('sdSections','tabid'));
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
