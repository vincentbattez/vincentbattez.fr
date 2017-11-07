<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

use App\Model\Entity\ProjectsWeb;
/**
 * ProjectsWeb Model
 *
 * @method \App\Model\Entity\ProjectsWeb get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectsWeb newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectsWeb[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsWeb|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectsWeb patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsWeb[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsWeb findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectsWebTable extends Table
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

        $this->table('projectsweb');
        $this->displayField('name');
        $this->primaryKey('slug');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('slogan', 'create')
            ->notEmpty('slogan');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->requirePresence('content', 'create')
            ->notEmpty('content');

        $validator
            ->integer('type_avis')
            ->requirePresence('type_avis', 'create')
            ->notEmpty('type_avis');

        $validator
            ->requirePresence('avis', 'create')
            ->notEmpty('avis');

        $validator
            ->integer('rating')
            ->requirePresence('rating', 'create')
            ->notEmpty('rating');

        return $validator;
    }
}
