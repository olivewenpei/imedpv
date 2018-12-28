<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdProductWorkflows Model
 *
 * @property \App\Model\Table\SdProductsTable|\Cake\ORM\Association\BelongsTo $SdProducts
 * @property \App\Model\Table\SdWorkflowsTable|\Cake\ORM\Association\BelongsTo $SdWorkflows
 * @property \App\Model\Table\SdUsersTable|\Cake\ORM\Association\BelongsTo $SdUsers
 * @property \App\Model\Table\SdCasesTable|\Cake\ORM\Association\HasMany $SdCases
 *
 * @method \App\Model\Entity\SdProductWorkflow get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdProductWorkflow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdProductWorkflow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdProductWorkflow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdProductWorkflow|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdProductWorkflow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdProductWorkflow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdProductWorkflow findOrCreate($search, callable $callback = null, $options = [])
 */
class SdProductWorkflowsTable extends Table
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

        $this->setTable('sd_product_workflows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdProducts', [
            'foreignKey' => 'sd_product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdWorkflows', [
            'foreignKey' => 'sd_workflow_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdUsers', [
            'foreignKey' => 'sd_user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SdCases', [
            'foreignKey' => 'sd_product_workflow_id'
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
        $rules->add($rules->existsIn(['sd_product_id'], 'SdProducts'));
        $rules->add($rules->existsIn(['sd_workflow_id'], 'SdWorkflows'));
        $rules->add($rules->existsIn(['sd_user_id'], 'SdUsers'));

        return $rules;
    }
}
