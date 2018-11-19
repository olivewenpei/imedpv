<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdCases Model
 *
 * @property \App\Model\Table\SdProductsTable|\Cake\ORM\Association\BelongsTo $SdProducts
 * @property \App\Model\Table\SdPhasesTable|\Cake\ORM\Association\BelongsTo $SdPhases
 *
 * @method \App\Model\Entity\SdCase get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdCase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdCase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdCase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdCase|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdCase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdCase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdCase findOrCreate($search, callable $callback = null, $options = [])
 */
class SdCasesTable extends Table
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

        $this->setTable('sd_cases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdProducts', [
            'foreignKey' => 'sd_product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdPhases', [
            'foreignKey' => 'sd_phase_id',
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

        $validator
            ->scalar('caseNo')
            ->maxLength('caseNo', 22)
            ->requirePresence('caseNo', 'create')
            ->notEmpty('caseNo');

        $validator
            ->scalar('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmpty('start_date');

        $validator
            ->scalar('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmpty('end_date');

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
        $rules->add($rules->existsIn(['sd_product_id'], 'SdProducts'));
        $rules->add($rules->existsIn(['sd_phase_id'], 'SdPhases'));

        return $rules;
    }
}
