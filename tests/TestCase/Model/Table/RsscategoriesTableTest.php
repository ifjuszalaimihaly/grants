<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RsscategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RsscategoriesTable Test Case
 */
class RsscategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RsscategoriesTable
     */
    public $Rsscategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rsscategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rsscategories') ? [] : ['className' => RsscategoriesTable::class];
        $this->Rsscategories = TableRegistry::get('Rsscategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rsscategories);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
