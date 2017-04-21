<?php
/**
 * Created by PhpStorm.
 * User: dimap
 * Date: 25.09.2016
 * Time: 16:35
 */

namespace frontend\controllers;
use Yii;
use common\models\Product;
use frontend\models\Cart;
use yii\web\Controller;
use frontend\models\Order;
use frontend\models\OrderItems;

class CartController extends Controller
{
    public function beforeAction($action) {
        $this->enableCsrfValidation = ($action->id !== "add");
        return parent::beforeAction($action);
    }
    public function actionAdd()
    {
            $id = Yii::$app->request->get('id');
            //$qty = Yii::$app->request->get('qty');
            // $sum = Yii::$app->request->get('sum ');
            $product = Product::findOne($id);
            if (empty($product)) return false;
            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->addToCart($product);
            $this->layout = false;
        return $this->render('cart-modal',[
            'session' => $session,
        ]);
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('cart-modal',[
            'session' => $session,
        ]);
    }
    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal',[
            'session' => $session,
        ]);
    }
    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('view',[
            'session' => $session,
        ]);
    }
    public function actionView()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        if($order->load(Yii::$app->request->post()))
        {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if($order->save())
            {
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят.');
                Yii::$app->mailer->compose('order' , ['session' => $session])
                ->setFrom(['dimela14@mail.ru' => 'final.com'])
                    ->setTo($order->email)
                    ->setSubject('Заказ')
                ->send();
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error', 'Ошибка оформления заказа.');
            }
        }
        return $this->render('view',[
            'session' => $session,
            'order' => $order,
        ]);
    }
    protected function saveOrderItems($items, $order_id)
    {
        foreach($items as $id => $item)
        {
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }
}