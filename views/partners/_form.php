<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Regions;
use kartik\select2\Select2;

?>

<div class="partners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'regions')->widget(Select2::className(), [
    	'data' => ArrayHelper::map(Regions::find()->all(), 'id', 'name'),
    	'options' => ['placeholder' => Yii::t('app', 'Choose...'), 'multiple' => 'multiple'],
    	'pluginOptions' => ['allowClear' => false]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
