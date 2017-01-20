<?php
use yii\helpers\Url;

?>
<div class="consultant-list-wrapper col-md-12 col-sm-12 col-xs-12" id="<?= $model->id ?>">
    <div class="row">
        <div class="img-cons-list col-md-3 col-sm-3 col-xs-3">
            <img src="<?= \yii\helpers\Url::to('img\\' . $model->cover) ?>" class="avatar-list-item">
        </div>
        <div class="list-item-text pull-right col-md-6 col-sm-6 col-xs-6">
            <div class="info-wrap-list-item">
                <h4><strong><?= isset($model->album_name) ? $model->name . '/' . $model->name : $model->name ?></strong>
                </h4>
                <?php if (isset($model->performer)) {
                    echo $model->performer . '<br>';
                } ?>
                <?php if (isset($model->place)) {
                    echo $model->place . '<br>';
                } ?>
                <?= isset($model->release_date) ? $model->release_date : $model->start_date . ' - ' . $model->end_date ?>
                <br>

            </div>
        </div>
    </div>
</div>
<br>
