<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdElementTypes Model
 *
 * @property \App\Model\Table\SdFieldsTable|\Cake\ORM\Association\HasMany $SdFields
 *
 * @method \App\Model\Entity\SdElementType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdElementType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdElementType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdElementType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdElementType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdElementType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdElementType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdElementType findOrCreate($search, callable $callback = null, $options = [])
 */
class SdElementTypesTable extends Table
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

        $this->setTable('sd_element_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('SdFields', [
            'foreignKey' => 'sd_element_type_id'
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
            ->scalar('type_name')
            ->maxLength('type_name', 100)
            ->requirePresence('type_name', 'create')
            ->notEmpty('type_name');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
