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

    <?= $form->field($model, 'category_id')->widget(Select2::className(), [
    	'data' => ArrayHelper::map(Categories::find()->all(), 'id', 'name'),
    	'options' => ['placeholder' => Yii::t('app', 'Choose...')],
    ])->label(Yii::t('app', 'Category')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'images[]')->widget(FileInput::className(), [
        'options'=>[
            'multiple'=>true
        ],
        'pluginOptions' => [
            'maxFileCount' => 10
        ]
    ])?>

    <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className(),
        [
            'clientOptions' => [
                'minHeight' => 400,
                'lang' => mb_substr(Yii::$app->language, 0, 2),
                'plugins' => ['clips', 'fontcolor']
            ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
