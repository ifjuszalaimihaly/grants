<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rssfeeditem Entity
 *
 * @property int $id
 * @property int $rssfeed_id
 * @property string $globalid
 * @property string $title
 * @property string $url
 * @property string $author
 * @property \Cake\I18n\FrozenTime $date
 * @property \Cake\I18n\FrozenTime $publisheddate
 * @property \Cake\I18n\FrozenTime $updateddate
 * @property string $content
 *
 * @property \App\Model\Entity\Rssfeed $rssfeed
 */
class Rssfeeditem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
