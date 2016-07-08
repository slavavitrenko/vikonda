<?php

use yii\helpers\Html;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Regions;

$js = '
    if(' . ($user->type == "partner" ? "true" : "false") . '){
       $(".field-user-regions").slideDown(400);
    }
    else{
       $(".field-user-regions").slideUp(0);
    }

    $("input[name=\'User[type]\']").on("change", function(){
        var val = $("input[name=\'User[type]\']:checked").val();
        if(val != "partner"){ $(".field-user-regions").slideUp(400); }
        else{ $(".field-user-regions").slideDown(400); }
    });
';

$this->registerJs($js, \yii\web\View::POS_READY);

?>

<?= $form->field($user, 'type')->radioList([
        'admin' => Yii::t('app', 'Admin'),
        // 'manager' => Yii::t('app', 'Manager'),
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
<?=$form->field($user, 'regions')->widget(Select2::className(), [
    'data' => ArrayHelper::map(Regions::find()->all(), 'id', 'name'),
    'options' => ['multiple' => true, 'class' => $user->type == 'partner' ? 'hidden' : ''],
]); ?>
<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'password')->passwordInput() ?>
