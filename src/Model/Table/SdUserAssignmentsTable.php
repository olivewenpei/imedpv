<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdUserAssignments Model
 *
 * @property \App\Model\Table\SdProductWorkflowsTable|\Cake\ORM\Association\BelongsTo $SdProductWorkflows
 * @property \App\Model\Table\SdUsersTable|\Cake\ORM\Association\BelongsTo $SdUsers
 * @property \App\Model\Table\SdWorkflowActivitiesTable|\Cake\ORM\Association\BelongsTo $SdWorkflowActivities
 *
 * @method \App\Model\Entity\SdUserAssignment get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdUserAssignment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdUserAssignment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdUserAssignment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdUserAssignment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdUserAssignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdUserAssignment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdUserAssignment findOrCreate($search, callable $callback = null, $options = [])
 */
class SdUserAssignmentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sd_user_assignments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdProductWorkflows', [
            'foreignKey' => 'sd_product_workflow_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdUsers', [
            'foreignKey' => 'sd_user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdWorkflowActivities', [
            'foreignKey' => 'sd_workflow_activity_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['sd_product_workflow_id'], 'SdProductWorkflows'));
        $rules->add($rules->existsIn(['sd_user_id'], 'SdUsers'));
        // $rules->add($rules->existsIn(['sd_workflow_activity_id'], 'SdWorkflowActivities'));

        return $rules;
    }
}
