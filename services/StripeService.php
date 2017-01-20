<?php

namespace app\services;

use app\models\Event;
use app\models\Movie;
use app\models\Music;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;

class StripeService
{
    public static function getStripeDataProvider()
    {
        $events = Event::find()->all();
        $music = Music::find()->all();
        $movies = Movie::find()->all();

        $music = array_merge($music, $movies);
        $data = array_merge($music, $events);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $dataProvider;
    }

    public static function getDateFilteredStripeDataProvider($date)
    {
        $events = Event::find()->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 ' . $date . ')')->all();
        $music = Music::find()->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 ' . $date . ')')->all();
        $movies = Movie::find()->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 ' . $date . ')')->all();

        $music = array_merge($music, $movies);
        $data = array_merge($music, $events);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 5,
                'params' => [
                    'date' => $date
                ]
            ],
        ]);

        return $dataProvider;
    }

    public static function getStatistics()
    {
        $statistics = [];

        $statistics['total'] = Event::find()->count() + Music::find()->count() + Movie::find()->count();

        $statistics['dailyEventsTotal'] = Event::find()->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)')->count();
        $statistics['dailyMusicTotal'] = Music::find()->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)')->count();
        $statistics['dailyMovieTotal'] = Movie::find()->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)')->count();

        $statistics['dailyTotal'] = $statistics['dailyEventsTotal'] + $statistics['dailyMusicTotal'] + $statistics['dailyMovieTotal'];

        return $statistics;
    }

    public static function getInstancesList()
    {
        return ['empty' => 'all', 'movies' => 'movies', 'music' => 'music', 'events' => 'events'];
    }

    public static function getDatesList()
    {
        return ['empty' => 'all', 'hour' => 'HOUR', 'day' => 'DAY', 'month' => 'MONTH'];
    }

    public static function getFilteresStripeDataprovider($date, $instance)
    {

        if (!isset($date) || $date == 'empty') {
            switch ($instance) {
                case 'movies' :
                    $data = Movie::find()->all();
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $data,
                        'pagination' => [
                            'pageSize' => 5,
                        ],
                    ]);
                    break;
                case 'music' :
                    $data = Music::find()->all();
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $data,
                        'pagination' => [
                            'pageSize' => 5,
                        ],
                    ]);
                    break;
                case 'events' :
                    $data = Event::find()->all();
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $data,
                        'pagination' => [
                            'pageSize' => 5,
                        ],
                    ]);
                    break;
                default :
                    $dataProvider = self::getStripeDataProvider();
                    break;
            }
        } else {
            switch ($instance) {
                case 'movies' :
                    $data = Movie::find()->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 ' . $date . ')')->all();
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $data,
                        'pagination' => [
                            'pageSize' => 5,
                        ],
                    ]);
                    break;
                case 'music' :
                    $data = Music::find()->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 ' . $date . ')')->all();
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $data,
                        'pagination' => [
                            'pageSize' => 5,
                        ],
                    ]);
                    break;
                case 'events' :
                    $data = Event::find()->where('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 ' . $date . ')')->all();
                    $dataProvider = new ArrayDataProvider([
                        'allModels' => $data,
                        'pagination' => [
                            'pageSize' => 5,
                        ],
                    ]);
                    break;
                default :
                    $dataProvider = self::getDateFilteredStripeDataProvider($date);
                    break;
            }
        }

        return $dataProvider;
    }
}