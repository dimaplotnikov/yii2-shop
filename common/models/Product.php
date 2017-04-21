<?php
namespace common\models;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}
