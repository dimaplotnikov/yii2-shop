<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Product;
use frontend\models\Cart;
use dektrium\user\models\User;
use common\models\Icons;
use common\models\Phone;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ]
        ];
    }

    public function successCallback($client)
    {
        $attributes = $client->getUserAttributes();
        // user login or signup comes here
        /*
        Checking facebook email registered yet?
        Maxsure your registered email when login same with facebook email
        */
        $user = User::find()->where(['email' => $attributes['email']])->one();
        if (!empty($user)) {
            Yii::$app->user->login($user);
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
  public function actionIndex()
  {
      $session = Yii::$app->session;
      $session->open();
      $cartModel = new Cart();
      $icons = Icons::find()->all();
      $phone = Phone::findOne(1);
      Yii::$app->view->params['count'] = $cartModel->getCount();;
      Yii::$app->view->params['price']= $cartModel->getPrice();;
      $hits = Product::find()->where(['hit' => '1'])->limit(5)->all();
      $latest = Product::find()->orderBy('id DESC')->limit(6)->all();
      return $this->render('index',[
        'hits' => $hits ,
        'latest' => $latest,
          'icons' => $icons,
          'phone' => $phone
        ]);
  }
}
