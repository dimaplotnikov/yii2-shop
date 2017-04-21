<?php

namespace common\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function getTree()
    {
        $return = [];
        $categories = Category::find()->orderBy('id')->asArray()->all();
        foreach ($categories as $level1) {
            $return[$level1['id']] = $level1;
            $return[$level1['id']]['childs'] = array();
            if ($level1['parent_id'] == null) {
                foreach ($categories as $level2) {
                    if ($level2['parent_id'] == $level1['id']) {
                        $return[$level1['id']]['childs'][] = $level2;
                    }
                }
            }
        }

        return $return;
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

}
