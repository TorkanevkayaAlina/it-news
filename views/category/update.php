<?php
use yii\helpers\Html;

$this->title = 'Редактирование категории';
?>

<div class="container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="category-update">

            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_category-form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>
    <div class="col-md-4"></div>
</div>