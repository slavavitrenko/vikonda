<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Categories;
use kartik\file\FileInput;

?>

<div class="products-form">

    <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'category_id')->widget(Select2::className(), [
            	'data' => ArrayHelper::map(Categories::find()->where(['<>', 'parent', '0'])->all(), 'id', 'name', 'parentName'),
            	'options' => ['placeholder' => Yii::t('app', 'Choose...')],
            ])->label(Yii::t('app', 'Category')) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'price')?>
        </div>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className(),
        [
            'clientOptions' => [
                'minHeight' => 400,
                'lang' => mb_substr(Yii::$app->language, 0, 2),
                'plugins' => ['clips', 'fontcolor']
            ]
    ])?>

    <?=$form->field($model, 'images[]')->widget(FileInput::className(), [
        'options'=>[
            'multiple'=>true
        ],
        'pluginOptions' => [
            'maxFileCount' => 10
        ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-block btn-lg' : 'btn btn-primary btn-block btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
