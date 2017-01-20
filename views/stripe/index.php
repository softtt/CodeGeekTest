<?php

/* @var $this yii\web\View */
use yii\widgets\Pjax;
use yii\helpers\Html;
use app\assets\StripeAsset;
use yii\helpers\Url;
use app\components\InlineHeadScript;

$this->title = 'Stripe';
StripeAsset::register($this);
?>
<?php InlineHeadScript::begin() ?>
<script>
    $(document).ready(function () {
        $('.dropdown').change(function () {
            var instance = $('.instance').val();
            var date = $('.date').val();
           // if (instance == 'empty' && date == 'empty') {
                $('#stripe-content').load('<?=Url::to('index.php?r=stripe%2Ffilter')?>', {instance: instance, date: date});
            
        });
    });
</script>
<?php InlineHeadScript::end() ?>
<div class="heading-container col-lg-9 col-sm-9 col-md-9">
    <div class="row">
        <p class="lead pull-left">Events stripe</p>
        <?php
        \yii\bootstrap\Modal::begin([
            'toggleButton' => [
                'label' => '<i class="glyphicon glyphicon-plus"></i> Statistics',
                'class' => 'btn btn-default pull-right'
            ],
            'closeButton' => [
                'label' => 'Close',
                'class' => 'btn btn-danger btn-sm pull-right',
            ],
            'size' => 'modal-lg',

        ]);
        echo $this->render('/stripe/modal', ['stats' => $statistics]);

        \yii\bootstrap\Modal::end();
        ?>

        <div class="filters-block"></div>
    </div>
</div>
<div class="body-content col-lg-9 col-sm-9 col-md-9">
    <div class="filters-block">

        <div class="row">

            <div id="inputs" class="col-md-9 col-sm-9 col-xs-9">

                <div class="dropdown-header col-md-6 col-sm-6 col-xs-6"><p>Instances</p></div>
                <?= \yii\helpers\Html::dropDownList('instance', $instances['empty'], $instances, ['class' => 'instance dropdown']) ?>
                <div class="dropdown-header col-md-6 col-sm-6 col-xs-6"><p>Dates</p></div>
                <?= \yii\helpers\Html::dropDownList('date', $dates['empty'], $dates, ['class' => 'date dropdown']) ?>
            </div>
        </div>

    </div>

    <div class="row" id="stripe-content">
        <?php Pjax::begin(['enablePushState' => false, 'enableReplaceState' => false]) ?>
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

    </div>