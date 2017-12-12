<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categories;
use powerkernel\tinymce\TinyMce;
use kartik\select2\Select2;
use app\models\Tag;
?>

<div class="gift-request-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(Categories::find()->all(), 'id', 'title'), ['prompt'=>'Выберите категорию']);
    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'clientOptions' => [
            'height'=>320,
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat code"
        ]
    ]);?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'clientOptions' => [
            'height'=>320,
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste image"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat code"
        ]
    ]);?>

    <?= $form->field($model, 'post_image')->fileInput() ?>

    <?= $form->field($model, 'tag_ids')->widget(Select2::className(), [
        'model' => $model,
        'attribute' => 'tag_ids',
        'data' => ArrayHelper::map(Tag::find()->all(), 'name', 'name'),
        'options' => [
            'multiple' => true,
        ],
        'pluginOptions' => [
            'tags' => true,
        ],
    ]); ?>

    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'facebook')->textInput() ?>
            <?= $form->field($model, 'twitter')->textInput() ?>
            <?= $form->field($model, 'google')->textInput() ?>
            <?= $form->field($model, 'instagram')->textInput() ?>
            <?= $form->field($model, 'pinterest')->textInput() ?>
        </div>
        <div class="col-lg-5" style="margin-top: 2%">
            <?= $form->field($model, 'f_status')->checkbox(['label' => 'Отображать Facebook']) ?>
            <?= $form->field($model, 't_status')->checkbox(['label' => 'Отображать Vkontakte']) ?>
            <?= $form->field($model, 'g_status')->checkbox(['label' => 'Отображать Google']) ?>
            <?= $form->field($model, 'i_status')->checkbox(['label' => 'Отображать Twitter']) ?>
            <?= $form->field($model, 'p_status')->checkbox(['label' => 'Отображать Instagram']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Опубликовать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>