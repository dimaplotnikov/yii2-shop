<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name
 * @property string $slug
 * @property string $keywords
 * @property string $desciption
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['keywords', 'desciption'], 'string'],
            [['name'], 'string', 'max' => 55],
            [['slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'parent_id' => 'Parent category',
            'name' => 'Name',
            'slug' => 'Slug',
            'keywords' => 'Keywords',
            'desciption' => 'Description',
        ];
    }
}
