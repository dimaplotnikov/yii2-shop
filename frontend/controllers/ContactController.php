<?php

namespace frontend\controllers;
use frontend\models\Contact;
use Yii;

class ContactController extends \yii\web\Controller
{


    public function actionIndex()
    {
        $post = Yii::$app->request->post();
        $model = new Contact();
        if($model->load($post)) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
        return $this->render('index',
            [
                'model' => $model,
            ]);
    }

}
