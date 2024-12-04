<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frutas Model
 *
 * @property \App\Model\Table\VendasTable&\Cake\ORM\Association\HasMany $Vendas
 *
 * @method \App\Model\Entity\Fruta newEmptyEntity()
 * @method \App\Model\Entity\Fruta newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Fruta> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fruta get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Fruta findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Fruta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Fruta> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fruta|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Fruta saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Fruta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fruta>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Fruta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fruta> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Fruta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fruta>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Fruta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Fruta> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FrutasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('frutas');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Vendas', [
            'foreignKey' => 'fruta_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nome')
            ->maxLength('nome', 255)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('classificacao')
            ->maxLength('classificacao', 255)
            ->requirePresence('classificacao', 'create')
            ->notEmptyString('classificacao');

        $validator
            ->boolean('fresca')
            ->requirePresence('fresca', 'create')
            ->notEmptyString('fresca');

        $validator
            ->integer('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmptyString('quantidade');

        $validator
            ->decimal('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        return $validator;
    }
}
