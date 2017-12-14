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
        $this->loadModel('Rssfeeds');
    }

    public function main()
    {
        $this->loadFeeds();
    }

    private function loadFeeds()
    {
        foreach ($this->sites as $site) {
            try {

                $reader = new Reader;
                $resource = $reader->discover($site);
                $parser = $reader->getParser(
                    $resource->getUrl(),
                    $resource->getContent(),
                    $resource->getEncoding()
                );
                $feed = $parser->execute(); //RSS feed XML
                if($this->Rssfeeds->find('ByGlobalid',['globalId' => $feed->getId()])->toArray() == []) {
                    $rssFeed = $this->Rssfeeds->newEntity(); //Rssfeed model
                    $rssFeed->globalid = $feed->getId();
                    $rssFeed->title =  $feed->getTitle();
                    $rssFeed->feedurl = $feed->getFeedUrl();
                    $rssFeed->siteurl = $feed->getSiteUrl();
                    $rssFeed->date = $feed->getDate();
                    $rssFeed->description = $feed->getDescription();
                    $rssFeed->logo = $feed->getLogo();
                    $this->Rssfeeds->save($rssFeed);
                    $this->feeds[$site] = $feed;
                } else {
                    //debug($this->Rssfeeds->find('ByGlobalid', ['globalId' => $feed->getId()])->first());
                }
            } catch (PicoFeedException $e) {
                // Do something...
            }
        }
    }
}