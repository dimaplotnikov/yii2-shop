<?php
use yii\helpers\Html;
use common\widgets\SidebarWidget;
?>
<div class="container">
    <div class="products-page">
        <div class="products">
            <?= SidebarWidget::widget() ?>
        </div>
        <?php if(!empty($products)): ?>
        <div class="new-product">
            <div class="new-product-top">
                <ul class="product-top-list">
                    <li><a href="index.html">Home</a>&nbsp;<span>&gt;</span></li>
                    <li><span class="act">Search</span>&nbsp;</li>
                </ul>
                <p class="back"><?php echo Html::a( 'Back to Previous Page', Yii::$app->request->referrer);?></p>
                <div class="clearfix"></div>
            </div>
            <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                <div class="cbp-vm-options">
                </div>
                <div class="clearfix"></div>
                <ul>
                    <?php foreach($products as $product): ?>
                    <?php
                    $mainImg = $product->getImage();
                    ?>
                    <li>
                        <a class="cbp-vm-image" href="<?= \yii\helpers\Url::to(['product/view', 'slug' => $product->slug]) ?>">

                            <div class="simpleCart_shelfItem">
                                <div class="view view-first">
                                    <div class="inner_content clearfix">
                                        <div class="product_image">
                                            <?= Html::img("/admin{$mainImg->getUrl()}") ?>
                                            <div class="product_container">
                                                <div class="cart-left">
                                                    <p class="title"><?=$product->name ?></p>
                                                </div>
                                                <div class="pricey"><span class="item_price">$<?=$product->price ?></span></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </a>
                        <div class="cbp-vm-details">
                            <?= $product->content  ?>
                        </div>
                        <a class="cbp-vm-icon cbp-vm-add item_add" data-id="<?=$product->id ?>"
                           href="<?= \yii\helpers\Url::to(['cart/add' , 'id' => $product->id]) ?>">Add to cart</a>
            </div>
            </li>
            </li>
            <?php endforeach; ?>
                <div class="clearfix"></div>
</div>

                                <?php echo \yii\widgets\LinkPager::widget(['pagination' => $pages ]);  ?>
            <?php else: ?>
                <h3>Ничего не найдено</h3>
            <?php endif; ?>
            </ul>
        </div>
        <script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
        <script src="js/classie.js" type="text/javascript"></script>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>