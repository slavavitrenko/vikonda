<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

$pluginOptions = [
            'showUpload' => false,
            'initialPreviewAsData'=>true,
            'overwriteInitial'=>true,
            'showUpload' => false,
        ];
if(!empty($model->picture)){
    $pluginOptions['initialPreview'] = '/' . $model->picture;
}

?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'parent')->widget(Select2::className(), [
    	'data' => ArrayHelper::map(Categories::find()->all(), 'id', 'name'),
    	'options' => ['placeholder' => Yii::t('app', 'Root category')],
    	'pluginOptions' => ['allowClear' => true]
    ])->label(Yii::t('app', 'Parent category')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'visible')->checkbox() ?>

    <?=$form->field($model, 'image')->widget(FileInput::className(), [
        'options'=>[
            'multiple' => false
        ],
        'pluginOptions' => $pluginOptions
    ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
