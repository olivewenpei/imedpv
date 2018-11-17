<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdTabs Model
 *
 * @property \App\Model\Table\SdSectionsTable|\Cake\ORM\Association\HasMany $SdSections
 *
 * @method \App\Model\Entity\SdTab get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdTab newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdTab[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdTab|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdTab|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdTab patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdTab[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdTab findOrCreate($search, callable $callback = null, $options = [])
 */
class SdTabsTable extends Table
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

        $this->setTable('sd_tabs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('SdSections', [
            'foreignKey' => 'sd_tab_id'
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
            ->scalar('tab_name')
            ->maxLength('tab_name', 255)
            ->requirePresence('tab_name', 'create')
            ->notEmpty('tab_name');

        $validator
            ->integer('display_order')
            ->requirePresence('display_order', 'create')
            ->notEmpty('display_order');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
