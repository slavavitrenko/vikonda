<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Products;

$products = Products::find()->orderBy(['id' => SORT_ASC])->limit(7)->all();

?>

<section id="products" class="section-new-products">
    <div class="line"></div>
    <h1><?=Yii::t('app', 'Popular items')?></h1>
    <div class="container">
        <div class="products-slider">
            <div id="demo" class="bee3D--parent">
            <?php foreach($products as $product) : ?>
                <div class="bee3D--slide">
                    <div class="bee3D--inner">
                        <?=Html::img($product->pictures[0]->src, ['class' => 'img-responsive']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
                <!-- Navigation Arrows -->
                <span class="bee3D--nav bee3D--nav__prev"></span>
                <span class="bee3D--nav bee3D--nav__next"></span>
            </div>
        </div>
    </div>
</section>