<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ccode Model
 *
 * @method \App\Model\Entity\Ccode get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ccode newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ccode[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ccode|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ccode|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ccode patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ccode[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ccode findOrCreate($search, callable $callback = null, $options = [])
 */
class CcodeTable extends Table
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

        $this->setTable('ccode');
        $this->setDisplayField('CountryCode');
        $this->setPrimaryKey('CountryCode');
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
            ->scalar('CountryCode')
            ->maxLength('CountryCode', 10)
            ->allowEmpty('CountryCode', 'create');

        $validator
            ->scalar('CountryName')
            ->maxLength('CountryName', 80)
            ->allowEmpty('CountryName');

        return $validator;
    }
}
