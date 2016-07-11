<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Products;

$products = Products::find()->orderBy(['views' => SORT_DESC])->limit(7)->all();

?>

<section id="products" class="section section-popular-prod">
    <h2 class="text-center">Хит продаж</h2>
    <div class="container">
        <div class="products-slider">
            <div id="bee3d" class="bee3D--parent">
            <?php foreach($products as $product) : ?>
                <div class="bee3D--slide">
                    <div class="bee3D--inner">
                        <?=Html::img($product->pictures[0]->src, ['class' => 'img-responsive'])?>
                        <!-- <?=Html::a(Yii::t('app', 'Details'), ['/product/' . $product->id], ['class' => 'btn btn-default btn-sm product-view-btn']); ?> -->
                    </div>
                </div>
                <?php endforeach; ?>
                <span class="bee3D--nav bee3D--nav__prev"></span>
                <span class="bee3D--nav bee3D--nav__next"></span>
            </div>
        </div>
    </div>
</section>