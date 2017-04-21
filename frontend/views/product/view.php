<?php
use yii\helpers\Html;
use common\widgets\SidebarWidget;
use kartik\helpers\Enum;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
?>
    <div class="products-page">
        <div class="products">
            <?= SidebarWidget::widget() ?>
        </div>
        <?php
        $mainImg = $product->getImage();
        $gallery = $product->getImages();
        ?>
        <div class="new-product">
            <div class="col-md-5 zoom-grid">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        foreach($gallery as $img):
                        ?>
                        <li data-thumb="/admin<?=$img->getUrl() ?>">
                            <div class="thumb-image">  <?= Html::img("/admin{$img->getUrl()}") ?> </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 dress-info">
                <div class="dress-name">
                    <h3><?= $product->name ?></h3>
                    <span>$<?=$product->price ?></span>
                    <div class="clearfix"></div>
                    <p><?=$product->content?></p>
                </div>
                <div class="span span1">
                    <div class="clearfix"></div>
                </div>
                <div class="span span2">
                    <p class="left">MADE IN</p>
                    <p class="right">China</p>
                    <div class="clearfix"></div>
                </div>
                <div class="span span3">
                    <p class="left">COLOR</p>
                    <p class="right">White</p>
                    <div class="clearfix"></div>
                </div>
                <div class="purchase">
                    <a class="add-to-cart item_add" data-id="<?=$product->id ?> href="<?=\yii\helpers\Url::to(['cart/add' , 'id' => $product->id]) ?>">Buy</a>
                    <div class="clearfix"></div>
                </div>
                <script src="js/imagezoom.js"></script>
                <!-- FlexSlider -->
                <script defer src="js/jquery.flexslider.js"></script>
                <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
                </script>
            </div>
            <div class="clearfix"></div>
            <div class="reviews-tabs">
                <!-- Main component for a primary marketing message or call to action -->
                <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
                    <li class="test-class active deco-none misc-class"><a style="cursor: default" class="deco-none misc-class" href="#"> Comments</a></li>
                </ul>
                <?php if(!Yii::$app->user->isGuest) : ?>
                    <div class="col-lg-12" style="padding: 0;">


                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($comment, 'text')->textarea()->label(false); ?>

                        <?= Html::hiddenInput('user_id', $comment->user_id); ?>
                        <?= Html::hiddenInput('product_id', $comment->product_id); ?>

                        <div class="form-group visible-lg-inline-block">
                            <?= Html::submitButton('Send', ['class' => 'btn btn-success inline-block']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                <? endif; ?>
                <div class="tab-content responsive hidden-xs hidden-sm">
                    <?php foreach($comments as $c): ?>
                        <div class="row">
                            <div class="col-sm-5"">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong><?=Html::a($c->user->username, \yii\helpers\Url::to(['user/profile/show', 'id' => $c->user_id])) ?></strong>
                                        <span class="text-muted">commented <?= Enum::timeElapsed($c->created_at); ?></span>
                                        <?php if($c->user_id == Yii::$app->user->getId()): ?>
                                            <?php $url_delete=Url::toRoute(['comment/delete', 'comment_id' => $c->id, 'user_id' => $c->user_id]); //настройка роутера на нужный урл
                                            ?>
                                            <a class="btn delete_comment" title="Удалить?" href="<?=$url_delete ?>" data-id="<?=$c->id ?>">
                                                <span class="glyphicon glyphicon-remove"></span></a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="panel-body">
                                        <?= $c->text ?>
                                    </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->
                        </div><!-- /row -->
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
