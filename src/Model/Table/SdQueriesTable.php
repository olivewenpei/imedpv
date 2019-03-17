<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdQueries Model
 *
 * @method \App\Model\Entity\SdQuery get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdQuery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdQuery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdQuery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdQuery|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdQuery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdQuery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdQuery findOrCreate($search, callable $callback = null, $options = [])
 */
class SdQueriesTable extends Table
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

        $this->setTable('sd_queries');
        $this->setDisplayField('title');
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
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('content')
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->integer('query_type')
            ->requirePresence('query_type', 'create')
            ->notEmpty('query_type');

        $validator
            ->integer('sender')
            ->requirePresence('sender', 'create')
            ->notEmpty('sender');

        $validator
            ->integer('receiver')
            ->requirePresence('receiver', 'create')
            ->notEmpty('receiver');

        $validator
            ->integer('sender_deleted')
            ->requirePresence('sender_deleted', 'create')
            ->notEmpty('sender_deleted');

        $validator
            ->integer('receiver_status')
            ->requirePresence('receiver_status', 'create')
            ->notEmpty('receiver_status');

        $validator
            ->dateTime('send_date')
            ->requirePresence('send_date', 'create')
            ->notEmpty('send_date');

        $validator
            ->dateTime('read_date')
            ->allowEmpty('read_date');

        $validator
            ->integer('query_status')
            ->requirePresence('query_status', 'create')
            ->notEmpty('query_status');

        return $validator;
    }
}
