<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IssuersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IssuersTable Test Case
 */
class IssuersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IssuersTable
     */
    public $Issuers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.issuers',
        'app.grants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Issuers') ? [] : ['className' => IssuersTable::class];
        $this->Issuers = TableRegistry::get('Issuers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Issuers);

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
