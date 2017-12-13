<?php
/**
 * Created by PhpStorm.
 * User: mihaly
 * Date: 2017.12.13.
 * Time: 8:31
 */

namespace App\Shell;


use Cake\Console\Shell;
use PicoFeed\Reader\Reader;
use PicoFeed\PicoFeedException;


class RssShell extends Shell
{

    private $sites = [
        'http://www.pafi.hu/',
        'https://www.palyazat.gov.hu/',
        'http://eupalyazatiportal.hu/',
        'https://palyazatmenedzser.hu/',
        'http://palyazatok.org/'
    ];

    private $feeds = [];

    public function initialize()
    {
        parent::initialize();
    }

    public function main()
    {
        $this->loadFeeds();
        foreach($this->sites as $site){
            var_dump($this->feeds[$site]);
        }
    }

    private function loadFeeds()
    {
        foreach ($this->sites as $site) {
            try {

                $reader = new Reader;
                $resource = $reader->download($site);

                $feeds = $reader->find(
                    $resource->getUrl(),
                    $resource->getContent()
                );

                $this->feeds[$site] = $feeds;
            } catch (PicoFeedException $e) {
                // Do something...
            }
        }
    }
}