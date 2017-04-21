<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/**
 * @var yii\web\View              $this
 * @var yii\widgets\ActiveForm    $form
 * @var dektrium\user\models\User $user
 */
?>
<div class="registration-form">
    <div class="container">
        <div class="dreamcrub">
            <ul class="breadcrumbs">
                <li class="home">
                    <a href="<?=Url::home() ?>" title="Go to Home Page">Home</a>&nbsp;
                    <span>&gt;</span>
                </li>
                <li class="women">
                    Registration
                </li>
            </ul>
            <ul class="previous">
                <li><a href="#">Back to Previous Page</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <h2>Registration</h2>
        <div class="registration-grids">
            <div class="reg-form">
                <div class="reg">
                    <p>Welcome, please enter the following details to continue.</p>
                    <p>If you have previously registered with us, <a href="<?=Url::to(['/user/security/login']); ?>">click here</a></p>
                    <?php $form = ActiveForm::begin([
                        'id' => 'register-form',
                    ]); ?>
                    <form>
                        <ul>
                            <li class="text-info">Nickname: </li>
                                <?= $form->field($model, 'username', [
                                    'inputOptions'=>[
                                        'class'=>'register-form',
                                    ]
                                ])->label(false); ?>
                        </ul>
                        <ul>
                            <li class="text-info">Email: </li>
                            <?= $form->field($model, 'email', [
                                'inputOptions'=>[
                                    'class'=>'register-form',
                                ]
                            ])->label(false); ?>
                        </ul>
                        <ul>
                            <li class="text-info">Password: </li>
                            <?= $form->field($model, 'password', [
                                'inputOptions'=>[
                                    'class'=>'register-form',
                                ]
                            ])->passwordInput()->label(false); ?>
                        </ul>
                        <?= Html::submitButton('REGISTER NOW', ['class' => 'regnow']) ?>
                        <p class="click">By clicking this button, you are agree to my  <a href="#">Policy Terms and Conditions.</a></p>
                    </form>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <div class="reg-right">
                <h3>Completely Free Account</h3>
                <div class="strip"></div>
                <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio
                    libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
                <h3 class="lorem">Lorem ipsum dolor.</h3>
                <div class="strip"></div>
                <p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php
//use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//
///**
// * @var yii\web\View              $this
// * @var yii\widgets\ActiveForm    $form
// * @var dektrium\user\models\User $user
// */
//
//$this->title = Yii::t('user', 'Sign up');
//$this->params['breadcrumbs'][] = $this->title;
//?>
<!--<div class="alert alert-success">-->
<!--    <p>This view file has been overriden!</p>-->
<!--</div>-->
<!--<div class="row">-->
<!--    <div class="col-md-4 col-md-offset-4">-->
<!--        <div class="panel panel-default">-->
<!--            <div class="panel-heading">-->
<!--                <h3 class="panel-title">--><?//= Html::encode($this->title) ?><!--</h3>-->
<!--            </div>-->
<!--            <div class="panel-body">-->
<!--                --><?php //$form = ActiveForm::begin([
//                    'id' => 'registration-form',
//                ]); ?>
<!---->
<!--                --><?//= $form->field($model, 'username') ?>
<!---->
<!--                --><?//= $form->field($model, 'email') ?>
<!---->
<!--                --><?//= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--                --><?//= Html::submitButton(Yii::t('user', 'Sign up'), ['class' => 'btn btn-success btn-block']) ?>
<!---->
<!--                --><?php //ActiveForm::end(); ?>
<!--            </div>-->
<!--        </div>-->
<!--        <p class="text-center">-->
<!--            --><?//= Html::a(Yii::t('user', 'Already registered? Sign in!'), ['/user/security/login']) ?>
<!--        </p>-->
<!--    </div>-->
<!--</div>-->