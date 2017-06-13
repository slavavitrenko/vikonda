<?php

use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use app\models\Settings;

use kartik\nav\NavX;
use app\models\Categoriesblog;

?>

<?php
$itemsRight = [];


$catItems = [];
foreach(\app\models\Categories::find()->where(['visible' => '1', 'parent' => 0])->all() as $category){
    $catItem = ['label' => $category->name, 'url' => ['/products/category/', 'id' => $category->id]];
    if($category->child){
        // unset($catItem['url']);
        // $catItem['url'] = '#';
        foreach($category->child as $child){
            $catItem['items'][] = ['label' => $child->name, 'url' => ['/products/category/', 'id' => $category->id]];
        }
    }
    $itemsLeft[] = $catItem;
    $itemsLeft[] = '<li class="divider"></li>';
}
array_pop($itemsLeft);

foreach (Categoriesblog::find()->all() as $category) :
    $itemsLeft[] = ['label' => Yii::t('app', $category->title), 'url' => ['/categoriesblog/category', 'slug' => $category->slug]];
endforeach;

if(!Yii::$app->user->isGuest){
    $itemsLeft[] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['/orders/index'], 'active' => false];
}

$itemsLeft[] = ['label' => Yii::t('app', 'About'), 'url' => ['/site/about'], 'active' => false];
?>

<header>
    <div class="top-cont-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="logo">
                        <a href="<?=Url::to(['/']); ?>"><img class="img-responsive" src="/img/logo.png" alt="logotype"></a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="address">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p><span><?php echo Settings::get('address'); ?></span></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="contacts">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <div class="contact-wrap">
                            <span><?=Settings::get('admin_phone'); ?></span><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default headroom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                echo NavX::widget([
                    'activateParents' => true,
                    'encodeLabels' => false,
                    'options' => ['class' => 'nav navbar-nav nav-pills navbar-left'],
                    'items' => $itemsLeft
                ]);
                ?>

                <?php \yii\widgets\Pjax::begin(['id' => 'cart-container', 'timeout' => 1, 'linkSelector' => false]);
                echo Nav::widget([
                    'activateParents' => true,
                    'encodeLabels' => false,
                    'options' => ['class' => 'nav navbar-nav navbar-right'],
                    'items' => $itemsRight
                ]);
                \yii\widgets\Pjax::end();
                ?>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>