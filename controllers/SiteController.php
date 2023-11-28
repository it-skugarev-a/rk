<?php

namespace app\controllers;

use app\services\CategoryService;
use app\services\ProductService;
use yii\web\Controller;

class SiteController extends Controller
{

    public CategoryService $categoryService;
    public ProductService $productService;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    public function __construct($id, $module,
                                ProductService $productService,
                                CategoryService $categoryService, $config = [])
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        parent::__construct($id, $module, $config);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'categories' => $this->categoryService->getListCategories(),
            'products' => $this->productService->getListProducts()
        ]);
    }

    public function actionCategory($id)
    {
        return $this->render('index', [
            'categories' => $this->categoryService->getListCategories(),
            'products' => $this->productService->getListProducts(0 ,$id)
        ]);
    }

}
