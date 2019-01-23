<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdSponsorCallcenters Model
 *
 * @method \App\Model\Entity\SdSponsorCallcenter get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdSponsorCallcenter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdSponsorCallcenter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdSponsorCallcenter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdSponsorCallcenter|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdSponsorCallcenter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdSponsorCallcenter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdSponsorCallcenter findOrCreate($search, callable $callback = null, $options = [])
 */
class SdSponsorCallcentersTable extends Table
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

        $this->setTable('sd_sponsor_callcenters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('sponsor')
            ->requirePresence('sponsor', 'create')
            ->notEmpty('sponsor');

        $validator
            ->integer('call_center')
            ->requirePresence('call_center', 'create')
            ->notEmpty('call_center');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
