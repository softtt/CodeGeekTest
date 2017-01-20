<?php
/**
 * Created by PhpStorm.
 * User: softtt
 * Date: 19.01.2017
 * Time: 17:13
 */

namespace app\assets;


use yii\web\AssetBundle;

class StripeAsset extends AssetBundle
{
    public $js = [
        'js\stripe.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}