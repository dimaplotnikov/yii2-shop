<?php

namespace common\widgets;
use yii\base\Widget;
use common\models\Category;
use Yii;

class SidebarWidget extends Widget{

    public function init(){
        parent::init();
    }

    public function run(){
        $model = Category::find()->indexBy('id')->all();
        return  $this->render('sidebar',
            ['model' => $model  ]);
    }

} 