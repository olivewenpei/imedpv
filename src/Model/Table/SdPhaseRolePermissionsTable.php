<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdPhaseRolePermissions Model
 *
 * @property \App\Model\Table\SdPhasesTable|\Cake\ORM\Association\BelongsTo $SdPhases
 * @property \App\Model\Table\SdRolesTable|\Cake\ORM\Association\BelongsTo $SdRoles
 * @property \App\Model\Table\SdPhaseRoleSectionPermissionsTable|\Cake\ORM\Association\HasMany $SdPhaseRoleSectionPermissions
 *
 * @method \App\Model\Entity\SdPhaseRolePermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdPhaseRolePermission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdPhaseRolePermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdPhaseRolePermission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdPhaseRolePermission|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdPhaseRolePermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdPhaseRolePermission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdPhaseRolePermission findOrCreate($search, callable $callback = null, $options = [])
 */
class SdPhaseRolePermissionsTable extends Table
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

        $this->setTable('sd_phase_role_permissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdPhases', [
            'foreignKey' => 'sd_phase_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdRoles', [
            'foreignKey' => 'sd_role_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SdPhaseRoleSectionPermissions', [
            'foreignKey' => 'sd_phase_role_permission_id'
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
        $rules->add($rules->existsIn(['sd_phase_id'], 'SdPhases'));
        $rules->add($rules->existsIn(['sd_role_id'], 'SdRoles'));

        return $rules;
    }
}
