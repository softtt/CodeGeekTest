<?php
/**
 * Created by PhpStorm.
 * User: softtt
 * Date: 18.01.2017
 * Time: 20:57
 */

namespace app\controllers;

use Yii;
use app\services\StripeService;
use yii\web\Controller;

class StripeController extends Controller
{
    /**
     * Displays stripe.
     *
     * @return string
     */
    public function actionIndex()
    {
        $service = new StripeService();
        $dataProvider = $service::getStripeDataProvider();
        $instances = $service::getInstancesList();
        $dates = $service::getDatesList();
        $statistics = StripeService::getStatistics();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'instances' => $instances,
            'dates' => $dates,
            'statistics' => $statistics
        ]);
    }

    public function actionFilter()
    {
        $instance = Yii::$app->request->post('instance');
        if (!$instance) {
            $instance = Yii::$app->request->get('instance');
        }
        $date = Yii::$app->request->post('date');
        if (!$date) {
            $date = Yii::$app->request->get('date');
        }
        $dataProvider = StripeService::getFilteresStripeDataprovider($date, $instance);
        return $this->renderAjax('stripe', ['dataProvider' => $dataProvider]);
    }
}