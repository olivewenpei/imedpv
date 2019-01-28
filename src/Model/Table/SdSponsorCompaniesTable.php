<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdSponsorCompanies Model
 *
 * @method \App\Model\Entity\SdSponsorCompany get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdSponsorCompany newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdSponsorCompany[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdSponsorCompany|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdSponsorCompany|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdSponsorCompany patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdSponsorCompany[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdSponsorCompany findOrCreate($search, callable $callback = null, $options = [])
 */
class SdSponsorCompaniesTable extends Table
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

        $this->setTable('sd_sponsor_companies');
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
            ->scalar('company_name')
            ->maxLength('company_name', 255)
            ->allowEmpty('company_name');

        $validator
            ->scalar('country')
            ->maxLength('country', 10)
            ->allowEmpty('country');

        return $validator;
    }
}
