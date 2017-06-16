<?php

use yii\widgets\ListView;
use app\models\Categoriesblog;
use app\widgets\Categories as CategoriesWidget;
use yii\helpers\Html;
use app\widgets\pagesOut;

?>

<!--Виджет вывода записей-->
<?= ListView::widget([
    'dataProvider'=>$dataProvider ,
    'itemView' => 'items/posts_item',
    'layout' => "{items}\n{pager}",
    'viewParams' => [
        'lang' => $lang
    ]
]) ?>

