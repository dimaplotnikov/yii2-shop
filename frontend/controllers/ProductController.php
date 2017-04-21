<?php

namespace frontend\controllers;
use common\models\Product;
use Yii;
use yii\data\Pagination;
use frontend\models\Comment;

class ProductController extends \yii\web\Controller{
    public $var = 10;
    public function actionView($slug){
        $product = Product::find()->where(['slug' => $slug])->one();
        if (!Yii::$app->user->isGuest) {
            $user_voting_id = Yii::$app->user->identity->getId();
            $comment = $this->commentProfile($user_voting_id,$product->id);
        }

        $comments = new Comment();
        $comments = $comments->
        find()->
        with('user')->
        where(['product_id' => $product->id])->
        orderBy('created_at DESC')->
        all();
        return $this->render('view',[
            'product' => $product,
            'comments' => $comments,
            'comment' => $comment,
        ]);
    }

    protected function commentProfile($user, $id)
    {
        $comment = new Comment();
        $comment->user_id = $user;
        $comment->product_id = $id;
        if($comment->load(Yii::$app->request->post())){
            $comment->created_at = time();
            $comment->save();
            $comment->text = null;
        }
        return $comment;
    }
}