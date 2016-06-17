<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>


<div class="well">
	<h2><?=$model->name; ?></h2>
	<?=Html::img($model->pictures[0]->src); ?>
</div>