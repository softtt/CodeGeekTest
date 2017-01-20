<?php
use yii\widgets\Pjax;


Pjax::begin([
    'enablePushState' => false,
    'timeout' => 10000
]) ?>
<?= \yii\widgets\ListView::widget(
    [
        'layout' => "{items}\n{pager}",
        'dataProvider' => $dataProvider,
        'itemView' => '/stripe/list-item.php',

        'pager' => [
            'nextPageLabel' => '>',
            'prevPageLabel' => '<',
        ],
        'itemOptions' => [
            'class' => 'list-view-item'
        ],
    ]
);
?>
<?php \yii\widgets\Pjax::end(); ?>