<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rsscategories Model
 *
 * @method \App\Model\Entity\Rsscategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rsscategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rsscategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rsscategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rsscategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rsscategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rsscategory findOrCreate($search, callable $callback = null, $options = [])
 */
class RsscategoriesTable extends Table
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

        $this->setTable('rsscategories');
        $this->setDisplayField('name');
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
            ->allowEmpty('name');

        return $validator;
    }
}
