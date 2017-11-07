<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @method \App\Model\Entity\Projects get($primaryKey, $options = [])
 * @method \App\Model\Entity\Projects newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Projects[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Projects|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Projects patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Projects[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Projects findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProjectsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
    }
}
