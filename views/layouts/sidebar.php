<?php

use kartik\sidenav\SideNav;

$js = '

window.addEventListener("popstate", function(e) {
    getContent(location.href, false);
});


$(document).on("click", "a", function(e){
    var link = $(this);
    var href = $(this).attr("href");
    if(link.attr("data-confirm")){
        if(confirm(link.attr("data-confirm")) == false){
            return false;
        }
    }
    if(link.attr("data-method") == "post"){
        $.post(
            link.attr("href"),
            {},
            function(data){
                getContent(data, true);
            }
        );
        return false;
    }
    if(
            href && !~href.indexOf("sort")
            && !~href.indexOf("#")
            && !~href.indexOf("mailto")
            && !~href.indexOf("://")
            && !~href.indexOf("delete")
            && !~href.indexOf("uploads")
            && !~href.indexOf("debug")
        ){
        e.preventDefault();
        getContent(location.protocol + "//" + location.host + $(this).attr("href"), true);
        $("#main-navbar .active").removeClass("active");
        $(this).parent().addClass("active");
        $(this).parent().parent().parent().addClass("active");
        // $("body").removeClass("sidebar-open");
        return;
    }
});

$(document).on("beforeSubmit", "form", function(){
    var form = $(this);
    if(form.attr("data-type") == "self"){
        return false;
    }
    $.ajax({
        url: form.attr("action"),
        data: form.serialize(),
        method: form.attr("method"),
        complete: function(data){
            if($.parseJSON(data.responseText).length > 2){
                getContent($.parseJSON(data.responseText), true);
            }
        }
    });
    return false;
});

function getContent(url, addEntry, link) {
    $.ajax(url)
    .done(function( data ) {
        $("#main-layout").html(data);
        $("title").html($(".main-title").html());
        if(addEntry == true) {
            history.pushState(null, null, url); 
        }
    })
    .error(function(data){
        ' . ((YII_ENV_DEV) ? ('$("#main-layout").html(data.responseText);') : ('window.location = url;')) . '
    });
}
';

$this->registerJs($js, \yii\web\View::POS_READY);

$items = [];


if(!Yii::$app->user->isGuest){
	if(Yii::$app->user->identity->type == 'admin'){
		$items[] = ['label' => Yii::t('app', 'Orders')
		.
		(($count = \app\models\Orders::find()->where(['<>', 'region_id', '0'])->count()) >= 1 ?
			(' <span class="badge pull-right">' . $count . '</span>')
			:
			''), 'url' => ['/orders/index'], 'active' => Yii::$app->controller->id == 'orders'];
		// $items[] = ['label' => Yii::t('app', 'Partners'), 'url' => ['/partners/index'], 'active' => Yii::$app->controller->id == 'partners'];
		$items[] = ['label' => Yii::t('app', 'Settings'), 'items' => [
			['label' => Yii::t('app', 'Regions'), 'url' => ['/regions/index'], 'active' => Yii::$app->controller->id == 'regions'],
			['label' => Yii::t('app', 'Products'), 'url' => ['/products/index'], 'active' => Yii::$app->controller->id == 'products'],
			['label' => Yii::t('app', 'Categories'), 'url' => ['/categories/index'], 'active' => Yii::$app->controller->id == 'categories'],
			['label' => Yii::t('app', 'All users'), 'url' => ['/user/admin/index'], 'active' => Yii::$app->controller->id == 'admin'],	
		]];

		$items[] = ['label' => Yii::t('app', 'Windows'), 'items' => [
				['label' => Yii::t('app', 'Window types'), 'url' => ['/window-types'], 'active' => Yii::$app->controller->id == 'window-types'],
				['label' => Yii::t('app', 'Profiles'), 'url' => ['/window-profiles'], 'active' => Yii::$app->controller->id == 'window-profiles'],
				['label' => Yii::t('app', 'Glazes'), 'url' => ['/window-glazes'], 'active' => Yii::$app->controller->id == 'window-glazes'],
				['label' => Yii::t('app', 'Furniture'), 'url' => ['/window-furniture'], 'active' => Yii::$app->controller->id == 'window-furniture'],
		]];

		$items[] = ['label' => Yii::t('app', 'Doors'), 'items' => [
			['label' => Yii::t('app', 'Door Types'), 'url' => ['/door-types'], 'active' => Yii::$app->controller->id == 'door-types'],
		]];

	}
}

?>

<?=SideNav::widget([
	'activateParents' => false,
	'encodeLabels' => false,
	'options' => [
		'class' => 'nav nav-pills nav-stacked',
		'id' => 'main-navbar',
	],
	'items' => $items
])?>
