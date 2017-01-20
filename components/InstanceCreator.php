<?php

use app\models\Movie;
use app\models\Event;
use app\models\Music;

class InstanceCreator
{
    private $flag;

    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

    public function createInstance()
    {
        if (!isset($this->flag)) {
            return false;
        }
        $dateTime = new DateTime();
        switch ($this->flag) {
            case 0:
                $instance = new Event();
                $instance->setAttributes([
                    'cover' => $this->flag . '.jpg',
                    'name' => 'Eyjafjalljokull explosion',
                    'place' => 'Island',
                    'start_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '2010-03-20')->getTimestamp()),
                    'end_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '2010-07-27')->getTimestamp()),
                ]);
                $instance->save();
                break;
            case 1 :
                $instance = new Movie();
                $instance->setAttributes([
                    'name' => 'La-La-Land',
                    'cover' => $this->flag . '.jpg',
                    'release_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '2016-12-12')->getTimestamp()),
                ]);
                $instance->save();
                break;
            case 2 :
                $instance = new Movie();
                $instance->setAttributes([
                    'name' => 'Drive',
                    'cover' => $this->flag . '.jpg',
                    'release_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '2011-12-12')->getTimestamp()),
                ]);
                $instance->save();
                break;
            case 3:
                $instance = new Movie();
                $instance->setAttributes([
                    'name' => 'Half-Nelson',
                    'cover' => $this->flag . '.jpg',
                    'release_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '2012-12-12')->getTimestamp()),
                ]);
                $instance->save();
                break;
            case 4:
                $instance = new Movie();
                $instance->setAttributes([
                    'name' => 'Lars and the real girl',
                    'cover' => $this->flag . '.jpg',
                    'release_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '2007-12-12')->getTimestamp()),
                ]);
                $instance->save();
                break;
            case 5:
                $instance = new Music();
                $instance->setAttributes([
                    'performer' => 'Dead mans bones',
                    'cover' => $this->flag . '.jpg',
                    'release_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '2009-12-12')->getTimestamp()),
                    'album_name' => 'Dead mans bones (Album)',
                    'name' => 'Flowers grow out of my grave'
                ]);
                $instance->save();
                break;
            case 6:
                $instance = new Music();
                $instance->setAttributes([
                    'performer' => 'David Bowie',
                    'cover' => $this->flag . '.jpg',
                    'release_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '1967-12-12')->getTimestamp()),
                    'album_name' => 'David Bowie (Album)',
                    'name' => 'Please Mr. Gravedigger'
                ]);
                $instance->save();
                break;
            case 7:
                $instance = new Music();
                $instance->setAttributes([
                    'performer' => 'Queen',
                    'cover' => $this->flag . '.jpg',
                    'release_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '1973-12-12')->getTimestamp()),
                    'album_name' => 'Queen (Album)',
                    'name' => 'Great king rat'
                ]);
                $instance->save();
                break;
            case 8:
                $instance = new Music();
                $instance->setAttributes([
                    'performer' => 'The Cure',
                    'cover' => $this->flag . '.jpg',
                    'release_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '2014-12-12')->getTimestamp()),
                    'album_name' => 'The Cure (Album)',
                    'name' => 'The end of the world'
                ]);
                $instance->save();
                break;
            case 9:
                $instance = new Event();
                $instance->setAttributes([
                    'cover' => $this->flag . '.jpg',
                    'name' => 'Krakatoa Explosion',
                    'place' => 'Indonesia',
                    'start_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '1883-05-12')->getTimestamp()),
                    'end_date' => date('Y-m-d', $dateTime::createFromFormat('Y-m-d', '1883-08-27')->getTimestamp()),
                ]);
                $instance->save();
                break;
        }
    }
}