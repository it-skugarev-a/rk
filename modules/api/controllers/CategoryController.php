<?php

namespace app\modules\api\controllers;

use app\services\CategoryService;
use yii\rest\ActiveController;

class CategoryController extends ActiveController
{

    public $modelClass = 'app\models\Category';

    public CategoryService $categoryService;

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index']);

        return $actions;
    }

    public function __construct($id, $module, CategoryService $categoryService, $config = [])
    {
        $this->categoryService = $categoryService;
        parent::__construct($id, $module, $config);
    }


    public function actionIndex()
    {
        return $this->categoryService->getListCategories();
    }

}
