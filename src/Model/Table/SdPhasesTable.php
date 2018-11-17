<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdPhases Model
 *
 * @property \App\Model\Table\SdWorkflowsTable|\Cake\ORM\Association\BelongsTo $SdWorkflows
 * @property \App\Model\Table\SdCasesTable|\Cake\ORM\Association\HasMany $SdCases
 * @property \App\Model\Table\SdPhaseRolePermissionsTable|\Cake\ORM\Association\HasMany $SdPhaseRolePermissions
 * @property \App\Model\Table\SdProductAssignmentsTable|\Cake\ORM\Association\HasMany $SdProductAssignments
 *
 * @method \App\Model\Entity\SdPhase get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdPhase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdPhase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdPhase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdPhase|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdPhase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdPhase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdPhase findOrCreate($search, callable $callback = null, $options = [])
 */
class SdPhasesTable extends Table
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

        $this->setTable('sd_phases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdWorkflows', [
            'foreignKey' => 'sd_workflow_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SdCases', [
            'foreignKey' => 'sd_phase_id'
        ]);
        $this->hasMany('SdPhaseRolePermissions', [
            'foreignKey' => 'sd_phase_id'
        ]);
        $this->hasMany('SdProductAssignments', [
            'foreignKey' => 'sd_phase_id'
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

        $validator
            ->integer('order_no')
            ->requirePresence('order_no', 'create')
            ->notEmpty('order_no');

        $validator
            ->integer('step_forward')
            ->requirePresence('step_forward', 'create')
            ->notEmpty('step_forward');

        $validator
            ->integer('step_backward')
            ->requirePresence('step_backward', 'create')
            ->notEmpty('step_backward');

        $validator
            ->scalar('phase_name')
            ->requirePresence('phase_name', 'create')
            ->notEmpty('phase_name');

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
        $rules->add($rules->existsIn(['sd_workflow_id'], 'SdWorkflows'));

        return $rules;
    }
}
