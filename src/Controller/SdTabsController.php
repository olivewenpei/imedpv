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
            public function showdetails($tabid = 1  )
            {
                $userinfo = $this->request->session()->read('Auth.user');
                //TODO Permission related
                $caseId = $this->request->getQuery('caseId');
                $sdTabs = $this->SdTabs->find()->select(['tab_name','display_order'])->where(['status'=>1])->order(['display_order' => 'ASC']);
                $this->viewBuilder()->layout('main_layout');
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
                                    }]);
                if ($this->request->is(['patch', 'post', 'put'])) {
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

            /**
            *  Generate PDF files
            *
            */
            public function genFDApdf($caseId)
            {
                // $sdFieldValuesTable = TableRegistry::get('SdFieldValues');
                // $sdFieldValues = $sdFieldTable ->find()->where(['sd_case_id'=>$caseId,'status'=>true])
                //                     ->order(['id'=>'ASC','set_number'=>'ASC'])
                //                     ->leftJoinWith('SdFields',function($q){
                //                         return $q->where(['SdFields.id'=>'SdFieldValues.id'])
                //                                 ->contain(['SdFields.SdFieldValueLookUps','SdFields.SdElementTypes'=> function($q){
                //                                 return $q->select('type_name')->where(['SdElementTypes.status'=>true]);
                //                                     }]);
                //                     })
                //                     ->group('id');


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


                $test1 = ' <style> p {position: absolute;}  </style>
                        <p style="top: 210px; left: 550px; width: 80px;  height: 15px; color:red;">2019-01-01</p>
                        <p style="top: 203px; left: 230px; width: 30px;  height: 15px;">2019</p>
                        <p style="top: 998px; left: 473px; width: 8px;   height: 10px;">X</p>';
                $mpdf->WriteHTML($test1);

                $mpdf->AddPage();
                //$test2 = '<img src="img/pdficon.png" />';
                //$mpdf->WriteHTML($test2);

                $mpdf->AddPage();
                //$test3 = '<h1 class="test1">Hello World</h1>';
                //$mpdf->WriteHTML($test3);

                $mpdf->Output();
                // Download a PDF file directly to LOCAL, uncomment while in real useage
                // $mpdf->Output('TEST.pdf', \Mpdf\Output\Destination::DOWNLOAD);


                $this->set(compact('sdFieldValues'));

            }


        }
