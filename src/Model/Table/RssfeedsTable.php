<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rssfeeds Model
 *
 * @method \App\Model\Entity\Rssfeed get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rssfeed newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rssfeed[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rssfeed|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rssfeed patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rssfeed[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rssfeed findOrCreate($search, callable $callback = null, $options = [])
 */
class RssfeedsTable extends Table
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

        $this->setTable('rssfeeds');
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
            ->requirePresence('globalid', 'create')
            ->notEmpty('globalid')
            ->add('globalid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title')
            ->add('title', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('feedurl', 'create')
            ->notEmpty('feedurl');

        $validator
            ->requirePresence('siteurl', 'create')
            ->notEmpty('siteurl');

        $validator
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('logo');

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
        $rules->add($rules->isUnique(['globalid']));
        $rules->add($rules->isUnique(['title']));

        return $rules;
    }
}
