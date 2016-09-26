<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Products;
use kartik\select2\Select2;


?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-5">
        <div class="row">
            <div class="col-sm-6">
                <?=$form->field($model, 'name')->textInput(['placeholder' => Yii::t('app', 'Name')])->label(false); ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'manufacturer')->widget(Select2::className(), [
                    'data' => ArrayHelper::map(Products::find()->groupBy('manufacturer')->all(), 'manufacturer', 'manufacturer'),
                    'pluginOptions' => [
                        'placeholder' => Yii::t('app', 'Manufacturer'), 
                        'allowClear' => true
                    ]
                ])->label(false) ?>
            </div>
        </div>
        </div>

        <div class="col-sm-1">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
            </div>

        </div>
        <div class="col-sm-6">
            <p class="lead">
            <?=Yii::t('app', 'Sorting'); ?>:
                <?=$dataProvider->sort->link('price', ['label' => Yii::t('app', 'byPrice')]); ?>
                |
                <?=$dataProvider->sort->link('manufacturer', ['label' => Yii::t('app', 'byManufacturer')]); ?>
            </p>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
