<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SdCaseHistories Model
 *
 * @property \App\Model\Table\SdCasesTable|\Cake\ORM\Association\BelongsTo $SdCases
 * @property \App\Model\Table\SdWorkflowActivitiesTable|\Cake\ORM\Association\BelongsTo $SdWorkflowActivities
 * @property \App\Model\Table\SdUsersTable|\Cake\ORM\Association\BelongsTo $SdUsers
 *
 * @method \App\Model\Entity\SdCaseHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\SdCaseHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SdCaseHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SdCaseHistory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdCaseHistory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SdCaseHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SdCaseHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SdCaseHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class SdCaseHistoriesTable extends Table
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

        $this->setTable('sd_case_histories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SdCases', [
            'foreignKey' => 'sd_case_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdWorkflowActivities', [
            'foreignKey' => 'sd_workflow_activity_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SdUsers', [
            'foreignKey' => 'sd_user_id',
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
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmpty('comment');

        $validator
            ->dateTime('enter_time')
            ->requirePresence('enter_time', 'create')
            ->notEmpty('enter_time');

        $validator
            ->dateTime('close_time')
            ->requirePresence('close_time', 'create')
            ->notEmpty('close_time');

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
        $rules->add($rules->existsIn(['sd_case_id'], 'SdCases'));
        $rules->add($rules->existsIn(['sd_workflow_activity_id'], 'SdWorkflowActivities'));
        $rules->add($rules->existsIn(['sd_user_id'], 'SdUsers'));

        return $rules;
    }
}
