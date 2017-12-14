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
use PicoFeed\Parser\Feed;


class RssShell extends Shell
{

    private $sites = [
        'http://www.pafi.hu/',
        'https://www.palyazat.gov.hu/',
        'http://eupalyazatiportal.hu/',
        'https://palyazatmenedzser.hu/',
        'http://palyazatok.org/'
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Rssfeeds');
        $this->loadModel('Rssfeeditems');
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
                $feed = $parser->execute(); //PicoFeed\Parser\Feed;
                if ($this->Rssfeeds->find('ByGlobalid', ['globalId' => $feed->getId()])->first() == null) {
                    $rssFeed = $this->Rssfeeds->newEntity(); //App\Model\Entity\RssFeed
                    $rssFeed->globalid = $feed->getId();
                    $rssFeed->title = $feed->getTitle();
                    $rssFeed->feedurl = $feed->getFeedUrl();
                    $rssFeed->siteurl = $feed->getSiteUrl();
                    $rssFeed->date = $feed->getDate();
                    $rssFeed->description = $feed->getDescription();
                    $rssFeed->logo = $feed->getLogo();
                    $this->Rssfeeds->save($rssFeed);
                } else {
                    $rssFeed = $this->Rssfeeds->find('ByGlobalid', ['globalId' => $feed->getId()])->first();
                    $oldDate = $rssFeed->date;
                    $newDate = $feed->getDate();
                    if ($newDate > $oldDate) {
                        $rssFeed->date = $newDate;
                        $this->Rssfeeds->save($rssFeed);
                    }
                }
                $this->getFeedItems($feed, $rssFeed->id);
            } catch (PicoFeedException $e) {
                // Do something...
            }
        }
    }

    private function getFeedItems(Feed $feed, int $rssFeedId)
    {
        foreach ($feed->items as $item) {
            $rssFeedItem = $this->Rssfeeditems->newEntity();
            $rssFeedItem->rssfeed_id = $rssFeedId;
            $rssFeedItem->globalid = $item->getId();
            $rssFeedItem->title = $item->getTitle();
            $rssFeedItem->url = $item->getUrl();
            $rssFeedItem->author = $item->getAuthor();
            $rssFeedItem->date = $item->getDate();
            $rssFeedItem->publisheddate = $item->getPublishedDate();
            $rssFeedItem->updateddate = $item->getUpdatedDate();
            $rssFeedItem->content = $item->getContent();
            $this->Rssfeeditems->save($rssFeedItem);
        }
    }
}