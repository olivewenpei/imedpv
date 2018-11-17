<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdUserTypes Model
 *
 * @property \App\Model\Table\SdCompaniesTable|\Cake\ORM\Association\HasMany $SdCompanies
 * @property \App\Model\Table\SdRolesTable|\Cake\ORM\Association\HasMany $SdRoles
 *
 * @method \App\Model\Entity\SdUserType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdUserType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdUserType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdUserType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdUserType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdUserType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdUserType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdUserType findOrCreate($search, callable $callback = null, $options = [])
 */
class SdUserTypesTable extends Table
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

        $this->setTable('sd_user_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('SdCompanies', [
            'foreignKey' => 'sd_user_type_id'
        ]);
        $this->hasMany('SdRoles', [
            'foreignKey' => 'sd_user_type_id'
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
            ->maxLength('name', 255)
            ->allowEmpty('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->allowEmpty('status');

        return $validator;
    }
}
