<?php
namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;


class Categories extends Widget
{
    public $items;

    public function run(){
        if(! $this->items) return Yii::t('app','No one categories found');
        $title = Html::tag('h4', Html::tag('span', Yii::t('app', 'Categories')), ['class' => 'title']);
        $items = $this->renderItems();
        return Html::tag('div', $title . $items, ['class' => 'widget']);

    }
    public function renderItems(){
        $content = '';
        foreach($this->items as $item){
            $content .= Html::tag('', Html::a($item->title, ['/site/category','slug'=>$item->slug]));
        }
        return Html::tag('ul', $content);
    }
}