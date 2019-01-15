<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdProductTypes Model
 *
 * @property \App\Model\Table\SdProductsTable|\Cake\ORM\Association\HasMany $SdProducts
 *
 * @method \App\Model\Entity\SdProductType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdProductType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdProductType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdProductType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdProductType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdProductType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdProductType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdProductType findOrCreate($search, callable $callback = null, $options = [])
 */
class SdProductTypesTable extends Table
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

        $this->setTable('sd_product_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('SdProducts', [
            'foreignKey' => 'sd_product_type_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('type_name')
            ->maxLength('type_name', 50)
            ->requirePresence('type_name', 'create')
            ->notEmpty('type_name');

        return $validator;
    }
}
