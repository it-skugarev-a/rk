<?php

namespace app\widgets;

use yii\base\Widget;

class CategoryWidget extends Widget
{

    public $categories;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('category', [
            'categories' => $this->categories
        ]);
    }
}