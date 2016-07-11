<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;


$this->registerJsFile('http://maps.google.com/maps/api/js');
$js = '

function initMap() {
	var myLatLng = {lat: 49.574519, lng: 34.507636};

	var map = new google.maps.Map(document.getElementById("about_map"), {
		zoom: 16,
		center: myLatLng,
		scrollwheel: false
	});

	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		title: "' . Yii::$app->params['siteName'] . '"
	});
	marker.setMap(map);
}
initMap();
';


$this->registerJs($js, \yii\web\View::POS_READY);

$this->title = Yii::t('app', 'About');

?>

<div class="about-index">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<?=\app\models\Settings::get('about_page')?>
			</div>
			<div class="col-sm-6">
				<h2><?=Yii::t('app', 'Contact Us'); ?></h2>
				<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

				<?= $form->field($model, 'name') ?>

				<?= $form->field($model, 'email') ?>

				<?= $form->field($model, 'subject') ?>

				<?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

				<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
					'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
				]) ?>

				<div class="form-group">
					<?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-default', 'name' => 'contact-button']) ?>
				</div>

				<?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div id="about_map"></div>
</div>