<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
    <div class="container">
        <?php if( Yii::$app->session->hasFlash('success') ): ?>
            <div class="alert alert-success alert-dismissible" style="margin-top:20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success'); ?>
            </div>
        <?php endif;?>

        <?php if( Yii::$app->session->hasFlash('error') ): ?>
            <div class="alert alert-danger alert-dismissible" style="margin-top:20px" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>
        <?php endif;?>
        <?php if(!empty($session['cart'])): ?>
            <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            <tbody>
            <?php foreach($session['cart'] as $id => $item):  ?>
                <tr>
                    <td><?= \yii\helpers\Html::img("/admin{$item['img']}") ?></td>
                    <td><a target="_blank" href="<?= Url::to(['product/view','slug' => $item['slug']]) ?>"><?= $item['name']?></a></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['price'] * $item['qty']?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">Итого:</td>
                <td><?= $session['cart.qty'] ?></td>
            </tr>
            <tr>
                <td colspan="4">На сумму:</td>
                <td><?= $session['cart.sum'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <hr/>
            <?php if (Yii::$app->user->isGuest): ?>
                <?php $form = ActiveForm::begin() ?>
                <?= $form->field($order, 'name') ?>
                <?= $form->field($order, 'email') ?>
                <?= $form->field($order, 'phone') ?>
                <?= $form->field($order, 'address') ?>
                <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end() ?>
            <?php else: ?>
                <?php $email = Yii::$app->user->identity->email; ?>
                <?php $profile = \dektrium\user\models\Profile::findOne(Yii::$app->user->identity->getId()); ?>
                <?php $form = ActiveForm::begin() ?>
                <?= $form->field($order, 'name', ['inputOptions' => ['value' => $profile->name, 'class' => 'form-control']]); ?>
                <?= $form->field($order, 'email', ['inputOptions' => ['value' => $email, 'class' => 'form-control']]); ?>
                <?= $form->field($order, 'phone') ?>
                <?= $form->field($order, 'address') ?>
                <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
                <?php ActiveForm::end() ?>
            <?php endif; ?>
        <?php else: ?>
            <h3>Корзина пуста</h3>
        <?php endif; ?>
    </div>