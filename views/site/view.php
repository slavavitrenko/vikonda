<?php

use yii\helpers\Url;

$lang == 'ru' ? $this->title = $model->title_ru : $this->title = $model->title;
$this->params['keywords'] = $model->key_words_ru && $lang == 'ru' ? $model->key_words_ru : $model->key_words;
$this->params['description'] = $model->description_ru && $lang == 'ru' ? $model->description_ru : $model->description;
$this->params['link_ru'] = $lang == 'ru' ? Url::to(['/ru/tender/'.$model->slug.'']) : Url::to(['/tender/'.$model->slug.'']);
$this->params['lang_ru'] = $lang == 'ru'? 'ru' : 'uk';
$this->params['link_uk'] = $lang == 'ru' ? Url::to(['/tender/'.$model->slug.'']) : Url::to(['/ru/tender/'.$model->slug.'']);
$this->params['lang_uk'] = $lang == 'ru'? 'uk' : 'ru';

?>

<h1><?=$model->h1_ru && $lang == 'ru'? $model->h1_ru : $model->h1?></h1>
<p><?=$model->short_text_ru && $lang == 'ru'? $model->short_text_ru : $model->short_text?></p>
<p><?=$model->text_ru && $lang == 'ru'? $model->text_ru : $model->text?></p>
<?php if($model->getLogo()): ?>
    <img alt="UUB" width="100%" src="<?= $model->getLogo() ?>">
<?php endif;?>
