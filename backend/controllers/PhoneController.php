<?php
namespace backend\controllers;

use Yii;
use common\models\Phone;

class PhoneController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index',[
            'model' => $this->findModel()
        ]);
    }

    public function actionUpdate()
    {
        $post = Yii::$app->request->post();
        $model = $this->findModel();
        if($model->load($post) && $model->save())
        {
            Yii::$app->session->setFlash('success', 'Данные обновлены');
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    private function findModel()
    {
        return Phone::findOne(1);
    }
}
