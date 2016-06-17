<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->widget(Select2::className(), [
    	'data' => ArrayHelper::map(Categories::find()->where(['parent' => '0'])->all(), 'id', 'name'),
    	'options' => ['placeholder' => Yii::t('app', 'Root category')],
    	'pluginOptions' => ['allowClear' => true]
    ])->label(Yii::t('app', 'Parent category')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'visible')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
