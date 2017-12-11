<?php
use yii\helpers\Html;

$this->title = 'Редактирование новости';
?>

<div class="container">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="post-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_post-form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
    <div class="col-lg-2"></div>
</div>