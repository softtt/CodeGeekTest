<?php

use InstanceCreator;

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

require(__DIR__ . '/components/InstanceCreator.php');

$config = require(__DIR__ . '/config/web.php');

(new yii\web\Application($config))->run();


$creator = new InstanceCreator();

while (1) {

    $instance_flag = rand(0, 9);
    $creator->setFlag($instance_flag);
    $creator->createInstance();

    echo 'ok';

    sleep(10);
}
