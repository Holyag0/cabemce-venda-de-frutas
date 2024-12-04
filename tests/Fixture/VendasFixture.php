<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendasFixture
 */
class VendasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'fruta_id' => 1,
                'quantidade' => 1,
                'desconto' => 1.5,
                'valor_total' => 1.5,
                'created' => 1733313681,
            ],
        ];
        parent::init();
    }
}
