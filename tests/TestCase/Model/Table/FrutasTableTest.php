<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FrutasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FrutasTable Test Case
 */
class FrutasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FrutasTable
     */
    protected $Frutas;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Frutas',
        'app.Vendas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Frutas') ? [] : ['className' => FrutasTable::class];
        $this->Frutas = $this->getTableLocator()->get('Frutas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Frutas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FrutasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
