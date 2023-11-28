<?php

namespace app\services;

use app\models\Product;

class ProductService
{

    public function getListProducts($offset = 0, $category = 0): array
    {
        $query = Product::find()
            ->offset($offset)
            ->limit(10);
        if($category) {
            $query
                ->innerJoinWith(['productCategories'], false)
                ->andWhere(['product_category.category_id' => $category]);

        }
        return $query->all();
    }

}
