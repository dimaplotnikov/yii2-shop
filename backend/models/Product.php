<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $slug
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 * @property string $made_in
 * @property string $color
 */
class Product extends \yii\db\ActiveRecord
{
    public $image;
    public $gallery;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id'=>'category_id']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'hit', 'new', 'sale', 'slug','made_in','color' ], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale','made_in','color'], 'string'],
            [['price'], 'number'],
            [['name', 'slug', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'category_id' => 'Category',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'slug' => 'Slug',
            'description' => 'Description',
            'image' => 'Main photo',
            'gallery' => 'Gallery',
            'hit' => 'Hit',
            'new' => 'New',
            'sale' => 'Sale',
            'made_in' => 'Made in',
            'color' => 'Color'
        ];
    }
    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
    public function uploadGallery(){ // сохраняет целиком галерею
        if($this->validate()){
            foreach($this->gallery as $file){
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }

}
