<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venda Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $fruta_id
 * @property int $quantidade
 * @property string $desconto
 * @property string $valor_total
 * @property \Cake\I18n\DateTime $created
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Fruta $fruta
 */
class Venda extends Entity
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
        'user_id' => true,
        'fruta_id' => true,
        'quantidade' => true,
        'desconto' => true,
        'valor_total' => true,
        'created' => true,
        'user' => true,
        'fruta' => true,
    ];
}
