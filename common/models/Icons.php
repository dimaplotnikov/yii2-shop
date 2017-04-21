<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "icons".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 */
class Icons extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'required'],
            [['name', 'link'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Name',
            'link' => 'Link',
            'image' => 'Icon',
        ];
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
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
}
