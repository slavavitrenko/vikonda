<?php

use yii\helpers\Html;
?>

<?= $form->field($user, 'type')->radioList([
        'admin' => Yii::t('app', 'Admin'),
        'manager' => Yii::t('app', 'Manager'),
        'partner' => Yii::t('app', 'Partner'),
    ], [
        'id' => 'user-type',
        'class' => 'btn-group form-group',
        'data-toggle' => 'buttons',
        'unselect' => null, // remove hidden field
        'item' => function ($index, $label, $name, $checked, $value) {
            return '<label class="btn btn-primary' . ($checked ? ' active' : '') . '">' .
                Html::radio($name, $checked, ['value' => $value, 'class' => 'project-status-btn']) . $label . '</label>';
        },
]) ?>

<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'password')->passwordInput() ?>
