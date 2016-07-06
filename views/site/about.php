<?php

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

<div class="container">
	<?=\app\models\Settings::get('about_page')?>
</div>


<!-- Карта -->
<div id="about_map"></div>