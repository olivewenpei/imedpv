<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdSectionValues Model
 *
 * @property \App\Model\Table\SdSectionStructuresTable|\Cake\ORM\Association\BelongsTo $SdSectionStructures
 * @property |\Cake\ORM\Association\HasMany $SdActivityLogs
 *
 * @method \App\Model\Entity\SdSectionValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdSectionValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdSectionValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdSectionValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdSectionValue|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdSectionValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdSectionValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdSectionValue findOrCreate($search, callable $callback = null, $options = [])
 */
class SdSectionValuesTable extends Table
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

        $this->setTable('sd_section_values');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdSectionStructures', [
            'foreignKey' => 'sd_section_structure_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SdActivityLogs', [
            'foreignKey' => 'sd_section_value_id'
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
            ->scalar('case_no')
            ->maxLength('case_no', 100)
            ->requirePresence('case_no', 'create')
            ->notEmpty('case_no');

        $validator
            ->scalar('version_no')
            ->maxLength('version_no', 100)
            ->requirePresence('version_no', 'create')
            ->notEmpty('version_no');

        $validator
            ->integer('set_number')
            ->requirePresence('set_number', 'create')
            ->notEmpty('set_number');

        $validator
            ->scalar('field_value')
            ->requirePresence('field_value', 'create')
            ->notEmpty('field_value');

        $validator
            ->dateTime('created_time')
            ->requirePresence('created_time', 'create')
            ->notEmpty('created_time');

        $validator
            ->boolean('status')
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
        $rules->add($rules->existsIn(['sd_section_structure_id'], 'SdSectionStructures'));

        return $rules;
    }
}
