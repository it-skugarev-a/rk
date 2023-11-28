<?php

namespace app\modules\api\controllers;

use app\services\ProductService;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{

    public $modelClass = 'app\models\Product';

    public ProductService $productService;

    public function __construct($id, $module, ProductService $productService, $config = [])
    {
        $this->productService = $productService;
        parent::__construct($id, $module, $config);
    }

    public function actionSearch($offset = 0, $category = 0)
    {
        return $this->productService->getListProducts($offset, $category);
    }
}
