<?php

namespace app\services;

use app\models\Category;

class CategoryService
{

    public function getListCategories(): array
    {
        $models = Category::find()
            ->andWhere('parent_id is null')
            ->asArray()
            ->all();

        $result = [];
        foreach ($models as $key => $model) {
            $result[$key] = $model;
            $result[$key]['children'] = $this->recursive($model);
        }

        return $result;
    }

    public function recursive($model): array
    {
        $result = [];
        $models = Category::find()
            ->andWhere('parent_id=:parent_id', [
                ':parent_id' => $model['id']
            ])
            ->asArray()
            ->all();
        foreach ($models as $key => $item) {
            $result[$key] = $item;
            $result[$key]['children'] = $this->recursive($item);
        }

        return $result;
    }

}
