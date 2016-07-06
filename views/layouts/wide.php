<?php

use yii\widgets\Breadcrumbs;

$partnerRegions = \yii\helpers\ArrayHelper::map(\app\models\PartnersRegions::find()->select(['region_id'])->asArray()->all(), 'region_id', 'region_id');
$regions = \app\models\Regions::find()->where(['NOT IN', 'regions.id', $partnerRegions])->all();

if($regions){
	Yii::$app->session->setFlash('danger', Yii::t('app', 'This regions doesn`t have partner: {regions}', ['regions' => '<span class="lead">' . implode(', ', \yii\helpers\ArrayHelper::map($regions, 'id', 'name')) . '</span>']));
}

?>
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<?=$this->render('@app/views/layouts/sidebar', \app\components\OrdersCount::count()); ?>
		</div>
		<div class="col-sm-9">
			<?= \app\widgets\Alert::widget(); ?>
			<?= $content ?>
		</div>
	</div>
</div>