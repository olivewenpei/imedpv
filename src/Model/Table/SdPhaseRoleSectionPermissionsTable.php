<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdPhaseRoleSectionPermissions Model
 *
 * @property \App\Model\Table\SdPhaseRolePermissionsTable|\Cake\ORM\Association\BelongsTo $SdPhaseRolePermissions
 * @property \App\Model\Table\SdSectionsTable|\Cake\ORM\Association\BelongsTo $SdSections
 *
 * @method \App\Model\Entity\SdPhaseRoleSectionPermission get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdPhaseRoleSectionPermission newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdPhaseRoleSectionPermission[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdPhaseRoleSectionPermission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdPhaseRoleSectionPermission|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdPhaseRoleSectionPermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdPhaseRoleSectionPermission[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdPhaseRoleSectionPermission findOrCreate($search, callable $callback = null, $options = [])
 */
class SdPhaseRoleSectionPermissionsTable extends Table
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

        $this->setTable('sd_phase_role_section_permissions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdPhaseRolePermissions', [
            'foreignKey' => 'sd_phase_role_permission_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdSections', [
            'foreignKey' => 'sd_section_id',
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
            ->integer('action')
            ->requirePresence('action', 'create')
            ->notEmpty('action');

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
        $rules->add($rules->existsIn(['sd_phase_role_permission_id'], 'SdPhaseRolePermissions'));
        $rules->add($rules->existsIn(['sd_section_id'], 'SdSections'));

        return $rules;
    }
}
