<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;


/**
 * SdWorkflowActivities Controller
 *
 * @property \App\Model\Table\SdWorkflowActivitiesTable $SdWorkflowActivities
 *
 * @method \App\Model\Entity\SdWorkflowActivity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SdWorkflowActivitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['SdWorkflows']
        ];
        $sdWorkflowActivities = $this->paginate($this->SdWorkflowActivities);

        $this->set(compact('sdWorkflowActivities'));
    }

    /**
     * View method
     *
     * @param string|null $id Sd Workflow Activity id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sdWorkflowActivity = $this->SdWorkflowActivities->get($id, [
            'contain' => ['SdWorkflows', 'SdCases']
        ]);

        $this->set('sdWorkflowActivity', $sdWorkflowActivity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sdWorkflowActivity = $this->SdWorkflowActivities->newEntity();
        if ($this->request->is('post')) {
            $sdWorkflowActivity = $this->SdWorkflowActivities->patchEntity($sdWorkflowActivity, $this->request->getData());
            if ($this->SdWorkflowActivities->save($sdWorkflowActivity)) {
                $this->Flash->success(__('The sd workflow activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd workflow activity could not be saved. Please, try again.'));
        }
        $sdWorkflows = $this->SdWorkflowActivities->SdWorkflows->find('list', ['limit' => 200]);
        $this->set(compact('sdWorkflowActivity', 'sdWorkflows'));
    }

    public function create()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $workflow_type = 0;
            $postedData = $this->request->getData();
            if (!preg_match('/^Default Workflow$/', $postedData['workflow_name']))
            {
                $workflow_type = 1;
            }
            else
            {
                echo json_encode(array('result'=>1, 'product_id'=>$postedData['product_id'], 'sd_workflow_id'=>1));
                die();
            }
            
            $sd_workflows_table = TableRegistry::get('sd_workflows');
            $new_workflow_table = $sd_workflows_table->newEntity();
            $new_workflow_table->name = $postedData['workflow_name'];
            $new_workflow_table->country = $postedData['country'];
            $new_workflow_table->workflow_type = $workflow_type;
            $new_workflow_table->status = 1;
            if (!$sd_workflows_table->save($new_workflow_table))
            {
                echo json_encode(array('result'=>0));
                die();
            }
            $sd_workflow_id = $new_workflow_table->id;

            $saved =false;
            //$sd_workflow_activities = TableRegistry::get('sd_workflow_activities');
            foreach ($postedData['workflow_steps'] as $eachStep)
            {
                $sdWorkflowActivity = $this->SdWorkflowActivities->newEntity();
                $sdWorkflowActivity->sd_workflow_id = $sd_workflow_id;
                $sdWorkflowActivity->order_no = $eachStep['display_order'];
                $sdWorkflowActivity->activity_name = $eachStep['step_name'];
                $sdWorkflowActivity->step_forward = 0;
                $sdWorkflowActivity->step_backward = 0;
                if (!$this->SdWorkflowActivities->save($sdWorkflowActivity))
                {
                    break;
                }
                else
                {
                    $saved = true;
                }
            }
            
            if ($saved)
            {
                echo json_encode(array('result'=>1, 'product_id'=>$postedData['product_id'], 'sd_workflow_id'=>$sd_workflow_id));
                die();
            }
        }
    }
    /**
     * Edit method
     *
     * @param string|null $id Sd Workflow Activity id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sdWorkflowActivity = $this->SdWorkflowActivities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sdWorkflowActivity = $this->SdWorkflowActivities->patchEntity($sdWorkflowActivity, $this->request->getData());
            if ($this->SdWorkflowActivities->save($sdWorkflowActivity)) {
                $this->Flash->success(__('The sd workflow activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sd workflow activity could not be saved. Please, try again.'));
        }
        $sdWorkflows = $this->SdWorkflowActivities->SdWorkflows->find('list', ['limit' => 200]);
        $this->set(compact('sdWorkflowActivity', 'sdWorkflows'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sd Workflow Activity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sdWorkflowActivity = $this->SdWorkflowActivities->get($id);
        if ($this->SdWorkflowActivities->delete($sdWorkflowActivity)) {
            $this->Flash->success(__('The sd workflow activity has been deleted.'));
        } else {
            $this->Flash->error(__('The sd workflow activity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
