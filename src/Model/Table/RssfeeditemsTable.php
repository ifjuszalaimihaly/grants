<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rssfeeditems Model
 *
 * @property \App\Model\Table\RssfeedsTable|\Cake\ORM\Association\BelongsTo $Rssfeeds
 *
 * @method \App\Model\Entity\Rssfeeditem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rssfeeditem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rssfeeditem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rssfeeditem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rssfeeditem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rssfeeditem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rssfeeditem findOrCreate($search, callable $callback = null, $options = [])
 */
class RssfeeditemsTable extends Table
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

        $this->setTable('rssfeeditems');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Rssfeeds', [
            'foreignKey' => 'rssfeed_id',
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
            ->requirePresence('globalid', 'create')
            ->notEmpty('globalid')
            ->add('globalid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->requirePresence('author', 'create')
            ->notEmpty('author');

        $validator
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->dateTime('publisheddate')
            ->requirePresence('publisheddate', 'create')
            ->notEmpty('publisheddate');

        $validator
            ->dateTime('updateddate')
            ->requirePresence('updateddate', 'create')
            ->notEmpty('updateddate');

        $validator
            ->requirePresence('content', 'create')
            ->notEmpty('content');

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
        $rules->add($rules->existsIn(['rssfeed_id'], 'Rssfeeds'));

        return $rules;
    }
}
