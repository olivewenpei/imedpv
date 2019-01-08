<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdProductAssignments Model
 *
 * @property \App\Model\Table\SdProductsTable|\Cake\ORM\Association\BelongsTo $SdProducts
 * @property \App\Model\Table\SdPhasesTable|\Cake\ORM\Association\BelongsTo $SdPhases
 * @property \App\Model\Table\SdCompaniesTable|\Cake\ORM\Association\BelongsTo $SdCompanies
 *
 * @method \App\Model\Entity\SdProductAssignment get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdProductAssignment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdProductAssignment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdProductAssignment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdProductAssignment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdProductAssignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdProductAssignment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdProductAssignment findOrCreate($search, callable $callback = null, $options = [])
 */
class SdProductAssignmentsTable extends Table
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

        $this->setTable('sd_product_assignments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdProducts', [
            'foreignKey' => 'sd_product_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdPhases', [
            'foreignKey' => 'sd_phase_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdCompanies', [
            'foreignKey' => 'sd_company_id',
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
        $rules->add($rules->existsIn(['sd_product_id'], 'SdProducts'));
        $rules->add($rules->existsIn(['sd_phase_id'], 'SdPhases'));
        $rules->add($rules->existsIn(['sd_company_id'], 'SdCompanies'));

        return $rules;
    }
}
