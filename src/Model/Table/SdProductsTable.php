<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdProducts Model
 *
 * @property \App\Model\Table\SdWorkflowsTable|\Cake\ORM\Association\BelongsTo $SdWorkflows
 * @property |\Cake\ORM\Association\HasMany $SdCases
 * @property \App\Model\Table\SdProductAssignmentsTable|\Cake\ORM\Association\HasMany $SdProductAssignments
 * @property |\Cake\ORM\Association\HasMany $SdStudyCros
 *
 * @method \App\Model\Entity\SdProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdProduct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdProduct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdProduct|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class SdProductsTable extends Table
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

        $this->setTable('sd_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdWorkflows', [
            'foreignKey' => 'sd_workflow_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SdCases', [
            'foreignKey' => 'sd_product_id'
        ]);
        $this->hasMany('SdProductAssignments', [
            'foreignKey' => 'sd_product_id'
        ]);
        $this->hasMany('SdStudyCros', [
            'foreignKey' => 'sd_product_id'
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
            ->integer('product_type')
            ->requirePresence('product_type', 'create')
            ->notEmpty('product_type');

        $validator
            ->scalar('study_no')
            ->requirePresence('study_no', 'create')
            ->notEmpty('study_no');

        $validator
            ->integer('sponsor_company')
            ->requirePresence('sponsor_company', 'create')
            ->notEmpty('sponsor_company');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
