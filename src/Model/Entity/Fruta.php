<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fruta Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $classificacao
 * @property bool $fresca
 * @property int $quantidade
 * @property string $valor
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Venda[] $vendas
 */
class Fruta extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nome' => true,
        'classificacao' => true,
        'fresca' => true,
        'quantidade' => true,
        'valor' => true,
        'created' => true,
        'modified' => true,
        'vendas' => true,
    ];
    protected function _setValor($valor)
    {
        return round($valor, 2); 
    }
    protected function _setValorTotal($valorTotal)
    {
        return round($valorTotal, 2); 
    }
}
