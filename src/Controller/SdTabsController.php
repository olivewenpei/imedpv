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
             * ShowDetail method
             *
             * @return \Cake\Http\Response|void
             */
            public function showdetails($caseNo, $version = 1,$tabid = 1)
            {
                $writePermission= 0;
                $userinfo = $this->request->session()->read('Auth.User');
                $sdCasesTable = TableRegistry::get('SdCases');
                $sdCases = $sdCasesTable->find()->where(['caseNo'=>$caseNo,'version_no'=>$version])->contain(['SdProductWorkflows.SdProducts'])->first();
                $caseId = $sdCases['id'];
                // if(empty($caseId)){
                //     $this->Flash->error(__('Cannot find this case.'));
                //     $this->redirect($this->referer());
                //     return;
                // }
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $error =[];
                    $requstData = $this->request->getData();
                    $sdFieldValues = TableRegistry::get('SdFieldValues');
                    foreach($requstData['sd_field_values'] as $sectionValueK => $sectionValue) {
                        foreach($sectionValue as $sectionFieldK =>$sectionFieldValue){
                            if($sectionFieldValue['id']!=null){//add judging whether updateing Using Validate
                                $sdFieldValueEntity = $sdFieldValues->get($sectionFieldValue['id']);/**add last-updated time */
                                $sdFieldValues->patchEntity($sdFieldValueEntity,$sectionFieldValue);
                                if(!$sdFieldValues->save($sdFieldValueEntity)) echo "error in updating!" ;
                            }elseif(!empty($sectionFieldValue['field_value'])){
                                $sdFieldValueEntity = $sdFieldValues->newEntity();
                                $dataSet = [
                                    'sd_case_id' => $caseId,
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
                $currentActivityId = $sdCases['sd_workflow_activity_id'];

                //User not allow to this activity
                $assignments = TableRegistry::get('SdUserAssignments')
                        ->find()->select(['sd_workflow_activity_id'])    
                        ->where(['sd_user_id'=>$userinfo['id'],'sd_product_workflow_id'=>$sdCases['sd_product_workflow_id']])->toArray();
                if($sdCases['sd_user_id'] != $userinfo['id']){
                    $writePermission = 0;
                    // if(empty($assignments))
                    // {
                    //     $this->Flash->error(__('You don\'t have permission to view this page'));
                    //     $this->redirect($this->referer());
                    //     return;
                    // } 
                    $activitySectionPermissions = TableRegistry::get('SdActivitySectionPermissions')
                    ->find('list',[
                        'keyField' => 'sd_section_id',
                        'valueField' => 'action'
                    ])
                    ->join([
                        'sections' =>[
                            'table' =>'sd_sections',
                            'type'=>'INNER',
                            'conditions'=>['sections.id = SdActivitySectionPermissions.sd_section_id','sections.sd_tab_id = '.$tabid],
                        ],
                        'ua'=>[
                            'table'=>'sd_user_assignments',
                            'type'=>'INNER',
                            'conditions'=>['ua.sd_product_workflow_id ='.$sdCases['sd_product_workflow_id'],'ua.sd_user_id ='.$userinfo['id'],'ua.sd_workflow_activity_id = SdActivitySectionPermissions.sd_workflow_activity_id']
                        ]
                    ])->toArray();      
                }else{
                    $activitySectionPermissions = TableRegistry::get('SdActivitySectionPermissions')
                    ->find('list',[
                        'keyField' => 'sd_section_id',
                        'valueField' => 'action'
                    ])->where(['sd_workflow_activity_id'=>$currentActivityId])
                    ->join([
                        'sections' =>[
                            'table' =>'sd_sections',
                            'type'=>'INNER',
                            'conditions'=>['sections.id = SdActivitySectionPermissions.sd_section_id','sections.sd_tab_id = '.$tabid],
                        ],
                    ])->toArray();
                    //Section permissions
                    $writePermission = 1;
                }   
                if(!$writePermission){
                    foreach($activitySectionPermissions as $key => $activitySectionPermission){
                        $activitySectionPermissions[$key] = 2;
                    }
                }
                $this->set(compact('activitySectionPermissions'));
                //For readonly status, donot render layout
                $readonly = $this->request->getQuery('readonly');
                if ($readonly!=1) $this->viewBuilder()->layout('main_layout'); else $this->viewBuilder()->layout('readonly_layout');
                $case_versions = $sdCasesTable->find()->where(['caseNo'=>$caseNo])->select(['version_no']);
                $product_name = $sdCases['sd_product_workflow']['sd_product']['product_name'];

                //Fetch tab structures
                $sdTabs = $this->SdTabs->find()->select(['tab_name','display_order'])->where(['status'=>1])->order(['display_order' => 'ASC']);
                $associated = ['SdSectionStructures','SdSectionStructures'=>['SdFields'=>['SdElementTypes','SdFieldValues']]];
                $sdTab = TableRegistry::get('SdSections');
                $sdSections = $sdTab ->find()->where(['sd_tab_id'=>$tabid,'status'=>true])
                                    ->order(['SdSections.section_level'=>'DESC','SdSections.display_order'=>'ASC'])
                                    ->contain(['SdSectionStructures'=>function($q)use($caseId){
                                        return $q->order(['SdSectionStructures.row_no'=>'ASC','SdSectionStructures.field_start_at'=>'ASC'])
                                            ->contain(['SdFields'=>['SdFieldValueLookUps','SdFieldValues'=> function ($q)use($caseId) {
                                                return $q->where(['SdFieldValues.sd_case_id'=>$caseId, 'SdFieldValues.status'=>true]);
                                            }, 'SdElementTypes'=> function($q){
                                            return $q->select('type_name')->where(['SdElementTypes.status'=>true]);
                                                }]]);
                                    }])->toArray();
                foreach($sdSections as $sectionKey => $sdSection){
                    if(!array_key_exists($sdSection['id'],$activitySectionPermissions)) unset($sdSections[$sectionKey]);
                }

                $this->set(compact('sdSections','caseNo','version','tabid','caseId','product_name','case_versions','writePermission'));
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

            /**
            *  Generate PDF files
            *
            */
            public function genFDApdf($caseNo, $version)
            {               
                // $sdCases = TableRegistry::get('SdCases');
                // $cases = $sdCases -> find()
                //             ->select(['SdCases.id'])->where(['version_no'=>$version, 'caseNo'=>$caseNo])
                //             ->first();

                // debug($cases->id);
                $sdMedwatchPositions = TableRegistry::get('SdMedwatchPositions');
                $positions = $sdMedwatchPositions ->find()
                            ->select(['SdMedwatchPositions.id','SdMedwatchPositions.position_top','SdMedwatchPositions.position_left',
                                'SdMedwatchPositions.position_width','SdMedwatchPositions.position_height','SdMedwatchPositions.type','fv.field_value','vl.caption','sc.id'])
                            ->join([
                                'fv' =>[
                                    'table' =>'sd_field_values',
                                    'type'=>'LEFT',
                                    'conditions'=>['SdMedwatchPositions.sd_field_id = fv.sd_field_id','fv.status = 1'],
                                ],
                                'vl'=>[
                                    'table'=>'sd_field_value_look_ups',
                                    'type'=>'LEFT',
                                    'conditions'=>['vl.sd_field_id = SdMedwatchPositions.sd_field_id','vl.value = fv.field_value']
                                ],
                                'sc'=>[
                                    'table'=>'sd_cases',
                                    'type'=>'INNER',
                                    'conditions'=>['sc.version_no = '.$version,'sc.caseNo = \''.$caseNo.'\'','fv.sd_case_id= sc.id']
                                ]
                            ]);
                // debug($positions);
                // Require composer autoload
                //require_once __DIR__ . '../vendor/autoload.php';
               // debug($positions);
                // Require composer autoload
                //require_once __DIR__ . '../vendor/autoload.php';

                $mpdf = new \Mpdf\Mpdf();

                $mpdf->CSSselectMedia='mpdf';
                $mpdf->SetTitle('FDA-MEDWATCH');

                $medwatchdata = $this->SdTabs->find();

                $mpdf->SetImportUse();
                $mpdf->SetDocTemplate('export_template/MEDWATCH.pdf',true);

                // If needs to link external css file, uncomment the next 2 lines
                // $stylesheet = file_get_contents('css/genpdf.css');
                // $mpdf->WriteHTML($stylesheet,1);

                $text = " <style> p {position: absolute;}  </style>";
                foreach($positions as $position_detail)
                {
                    switch($position_detail['type']){
                    case '1':
                        $text =$text.'<p style="top: '.$position_detail['position_top'].'px; left: '.$position_detail['position_left']
                            .'px; width: '.$position_detail['position_width'].'px;  height: '.$position_detail['position_height'].'px; color:red;">'.$position_detail['fv']['field_value'].'</p>';
                        continue;
                        }
                }
                $mpdf->WriteHTML($text);

                $mpdf->AddPage();
                //$test2 = '<img src="img/pdficon.png" />';
                //$mpdf->WriteHTML($test2);

                $mpdf->AddPage();
                //$test3 = '<h1 class="test1">Hello World</h1>';
                //$mpdf->WriteHTML($test3);

                $mpdf->Output();
                // Download a PDF file directly to LOCAL, uncomment while in real useage
                // $mpdf->Output('TEST.pdf', \Mpdf\Output\Destination::DOWNLOAD);


                $this->set(compact('positions'));

            }

            public function test() {
                $this->viewBuilder()->layout('main_layout');

                $sdFieldValuesTable = TableRegistry::get('SdFieldValues');
                $sdFieldValues = $sdFieldValuesTable->find()
                                ->select(['created_time'])
                                ->where(['field_value'=>'asdfa','sd_field_id'=>363])
                                ->all();
                $this->set(compact('sdFieldValues'));

                $sdFieldsTable = TableRegistry::get('sdFields');
                $testValue = $sdFieldsTable->find()
                                ->select(['field_label'])
                                ->where(['id'=>1])
                                ->first();
                $this->set(compact('testValue'));
            }


        }
