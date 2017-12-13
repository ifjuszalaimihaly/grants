<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RssfeedsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RssfeedsTable Test Case
 */
class RssfeedsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RssfeedsTable
     */
    public $Rssfeeds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Rssfeeds') ? [] : ['className' => RssfeedsTable::class];
        $this->Rssfeeds = TableRegistry::get('Rssfeeds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rssfeeds);

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
