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

   private $sites =[

        ];

    public function initialize()
    {
        parent::initialize();
    }

    public function main()
    {


        try {

            $reader = new Reader;
            $resource = $reader->download('palyazatok.org');

            $feeds = $reader->find(
                $resource->getUrl(),
                $resource->getContent()
            );

            print_r($feeds);
        } catch (PicoFeedException $e) {
            // Do something...
        }

    }
}