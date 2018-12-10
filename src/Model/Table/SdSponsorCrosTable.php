<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdSponsorCros Model
 *
 * @method \App\Model\Entity\SdSponsorCro get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdSponsorCro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdSponsorCro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdSponsorCro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdSponsorCro|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdSponsorCro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdSponsorCro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdSponsorCro findOrCreate($search, callable $callback = null, $options = [])
 */
class SdSponsorCrosTable extends Table
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

        $this->setTable('sd_sponsor_cros');
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
            ->integer('cro_company')
            ->requirePresence('cro_company', 'create')
            ->notEmpty('cro_company');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
