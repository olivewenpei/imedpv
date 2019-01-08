<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdCaseGeneralInfos Model
 *
 * @property \App\Model\Table\SdCasesTable|\Cake\ORM\Association\BelongsTo $SdCases
 *
 * @method \App\Model\Entity\SdCaseGeneralInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdCaseGeneralInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdCaseGeneralInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdCaseGeneralInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdCaseGeneralInfo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdCaseGeneralInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdCaseGeneralInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdCaseGeneralInfo findOrCreate($search, callable $callback = null, $options = [])
 */
class SdCaseGeneralInfosTable extends Table
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

        $this->setTable('sd_case_general_infos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdCases', [
            'foreignKey' => 'sd_case_id',
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
            ->scalar('case_detail_info')
            ->maxLength('case_detail_info', 11)
            ->requirePresence('case_detail_info', 'create')
            ->notEmpty('case_detail_info');

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
        $rules->add($rules->existsIn(['sd_case_id'], 'SdCases'));

        return $rules;
    }
}
