<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RssfeeditemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RssfeeditemsTable Test Case
 */
class RssfeeditemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RssfeeditemsTable
     */
    public $Rssfeeditems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rssfeeditems',
        'app.rssfeeds'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rssfeeditems') ? [] : ['className' => RssfeeditemsTable::class];
        $this->Rssfeeditems = TableRegistry::get('Rssfeeditems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rssfeeditems);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
