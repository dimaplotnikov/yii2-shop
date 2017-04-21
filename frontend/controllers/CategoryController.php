<?php

namespace frontend\controllers;
use common\models\Category;
use common\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use frontend\models\Cart;

class CategoryController extends \yii\web\Controller{
//  public function actionIndex()
//  {
//    $hits = Product::find()->where(['hit' => '1'])->limit(5)->all();
//    $latest = Product::find()->orderBy('id DESC')->limit(6)->all();
//    return $this->render('index',[
//      'hits' => $hits ,
//      'latest' => $latest,
//    ]);
//  }

  public function actionView($id){
   // $id = Yii::$app->request->get('id');
    //$products = Product::find()->where(['category_id' => $id])->all();
    $query = Product::find()->where(['category_id' => $id]);
    $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
    $products= $query->offset($pages->offset)->limit($pages->limit)->all();
    $name = Category::find()->select('name')->where(['id' => $id])->one();
    return $this->render('view',[
      'products' => $products,
      'pages' => $pages,
      'name' => $name
    ]);
  }

  public function actionSearch()
  {
    $q = trim(Yii::$app->request->get('q'));
    if(!$q)
        return $this->render('search');
    $query = Product::find()->where(['like', 'name', $q]);
    $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
    $products= $query->offset($pages->offset)->limit($pages->limit)->all();
    return $this->render('search', [
          'products' => $products,
          'pages' => $pages,
    ]);
  }
  }
