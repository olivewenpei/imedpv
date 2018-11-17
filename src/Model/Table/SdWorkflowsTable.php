<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdWorkflows Model
 *
 * @property \App\Model\Table\SdPhasesTable|\Cake\ORM\Association\HasMany $SdPhases
 * @property \App\Model\Table\SdProductsTable|\Cake\ORM\Association\HasMany $SdProducts
 *
 * @method \App\Model\Entity\SdWorkflow get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdWorkflow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdWorkflow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdWorkflow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdWorkflow|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdWorkflow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdWorkflow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdWorkflow findOrCreate($search, callable $callback = null, $options = [])
 */
class SdWorkflowsTable extends Table
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

        $this->setTable('sd_workflows');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('SdPhases', [
            'foreignKey' => 'sd_workflow_id'
        ]);
        $this->hasMany('SdProducts', [
            'foreignKey' => 'sd_workflow_id'
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
