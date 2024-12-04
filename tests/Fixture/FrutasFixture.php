<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FrutasFixture
 */
class FrutasFixture extends TestFixture
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
                'nome' => 'Lorem ipsum dolor sit amet',
                'classificacao' => 'Lorem ipsum dolor sit amet',
                'fresca' => 1,
                'quantidade' => 1,
                'valor' => 1.5,
                'created' => 1733313676,
                'modified' => 1733313676,
            ],
        ];
        parent::init();
    }
}
