<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Pages;

class pagesOut extends Widget
{

    public function run()
    {
        $pages = Pages::find()
            ->all();
        $item = [];

        foreach ($pages as $page){
            $item[] = ['label' => Yii::t('app', $page->title), 'url' => ['/page/'.$page->slug]];

        }
        return $item;
    }
}
?>