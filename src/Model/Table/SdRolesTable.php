<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdRoles Model
 *
 * @property \App\Model\Table\SdUserTypesTable|\Cake\ORM\Association\BelongsTo $SdUserTypes
 * @property |\Cake\ORM\Association\HasMany $SdPhaseRolePermissions
 * @property \App\Model\Table\SdUsersTable|\Cake\ORM\Association\HasMany $SdUsers
 *
 * @method \App\Model\Entity\SdRole get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdRole newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdRole[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdRole|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdRole|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdRole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdRole[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdRole findOrCreate($search, callable $callback = null, $options = [])
 */
class SdRolesTable extends Table
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

        $this->setTable('sd_roles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdUserTypes', [
            'foreignKey' => 'sd_user_type_id'
        ]);
        $this->hasMany('SdPhaseRolePermissions', [
            'foreignKey' => 'sd_role_id'
        ]);
        $this->hasMany('SdUsers', [
            'foreignKey' => 'sd_role_id'
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
            ->scalar('role_name')
            ->maxLength('role_name', 100)
            ->allowEmpty('role_name');

        $validator
            ->allowEmpty('status');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        $validator
            ->integer('parent_group')
            ->allowEmpty('parent_group');

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
        $rules->add($rules->existsIn(['sd_user_type_id'], 'SdUserTypes'));

        return $rules;
    }
}
