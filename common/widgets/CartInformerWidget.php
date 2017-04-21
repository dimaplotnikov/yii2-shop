<?php

namespace common\widgets;

use yii\helpers\Html;
use frontend\models\Cart;

class CartInformerWidget extends \yii\base\Widget {

    public $text = NULL;
    public $offerUrl = NULL;
    public $htmlTag = 'a';

    public function init() {
        parent::init();
    }

    public function run() {
//        $session = Yii::$app->session;
//        $session->open();
        $cartModel = new Cart();
        $this->text = str_replace(['{c}', '{p}'],
            [' <h3> <span class="">'.$cartModel->getPrice().'</span></h3>', '<p class="  ">'.$cartModel->getCount().'</p>'],
            $this->text
         );
        return Html::tag($this->htmlTag, $this->text, [
            'href' => $this->offerUrl,
        ]);
    }

}
