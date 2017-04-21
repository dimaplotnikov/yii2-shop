<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container">
<div class="login-page">
    <div class="dreamcrub">
        <ul class="breadcrumbs">
            <li class="home">
                <a href="<?=Url::home() ?>" title="Go to Home Page">Home</a>&nbsp;
                <span>&gt;</span>
            </li>
            <li class="women">
                Login
            </li>
        </ul>
        <ul class="previous">
            <li><?php echo Html::a( 'Back to Previous Page', Yii::$app->request->referrer);?></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="account_grid">
        <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
            <h2>NEW CUSTOMERS</h2>
            <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
            <a class="acount-btn" href="<?=Url::to(['/user/registration/register']); ?>">Create an Account</a>
        </div>
        <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
            <h3>REGISTERED CUSTOMERS</h3>
            <p>If you have an account with us, please log in.</p>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
            ]); ?>
            <form>
                <div>
                    <span>Email Address<label>*</label></span>
                    <?= $form->field($model, 'login', [
                        'inputOptions'=>[
                            'class'=>'text1',
                        ]
                    ])->label(false); ?>
                </div>
                <div>
                    <span>Password<label>*</label></span>
                    <?= $form->field($model, 'password', [
                        'inputOptions'=>[
                            'class'=>'password1',
                        ]
                    ])->passwordInput()->label(false); ?>
                </div>
                <a class="forgot" href="<?=Url::to(['/user/recovery/request']); ?>">Forgot Your Password?</a>
                <?= Html::submitButton('LOGIN', ['class' => 'button1']) ?>
                <?= yii\authclient\widgets\AuthChoice::widget(  [
                    'baseAuthUrl' => ['/site/auth']
                ]) ?>
            </form>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
</div>