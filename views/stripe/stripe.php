<?php
use yii\widgets\Pjax;


Pjax::begin([
    'enablePushState' => false,
    'enableReplaceState' => false,
    'id' => 'w0', // checked id on the inspect element
    'timeout' => 10000 // Timeout needed
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