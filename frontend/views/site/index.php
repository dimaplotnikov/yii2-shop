<?php
use yii\helpers\Html;

?>
<div class="banner">
	<div class="container">
<div class="banner-bottom">
<div class="banner-bottom-left">
	<h2>B<br>U<br>Y</h2>
</div>
<div class="banner-bottom-right">
	<div  class="callbacks_container">
				<ul class="rslides" id="slider4">
				<li>
							<div class="banner-info">
								<h3>Smart But Casual</h3>
								<p>Start your shopping here...</p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								 <h3>Shop Online</h3>
								<p>Start your shopping here...</p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								<h3>Pack your Bag</h3>
								<p>Start your shopping here...</p>
							</div>
						</li>
					</ul>
				</div>
				<!--banner-->
		 <script>
				// You can also use "$(window).load(function() {"
				$(function () {
					// Slideshow 4
					$("#slider4").responsiveSlides({
						auto: true,
						pager:true,
						nav:false,
						speed: 500,
						namespace: "callbacks",
						before: function () {
							$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
						}
					});

				});
			</script>
</div>
<div class="clearfix"> </div>
</div>
<div class="shop">
	<a style="margin-right: 35px" href="">SHOP COLLECTION NOW</a>
</div>
</div>
	</div>
	<!-- content-section-starts-here -->
	<div class="container">
		<div class="main-content">
			<div class="online-strip">
				<div class="col-md-4 follow-us">
					<h3>follow us :
					<?php foreach($icons as $icon): ?>
						<?php $img = $icon->getImage();?>
						<a href="<?= $icon->link ?>"><?= Html::img("/admin{$img->getUrl()}") ?></a>
					<?php endforeach; ?>
					 </h3>
				</div>
				<div class="col-md-4 shipping-grid">
					<div class="shipping">
						<img src="images/shipping.png" alt="" />
					</div>
					<div class="shipping-text">
						<h3>Free Shipping</h3>
						<p>on orders over $ 199</p>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-4 online-order">
					<p>Order online</p>
					<h3>Tel:<?=$phone->number ?></h3>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="products-grid">
			<header>
				<h3 class="head text-center">Latest Products</h3>
			</header>
				<?php foreach($latest as $lat): ?>
					<?php
					$mainImg = $lat->getImage();
					?>
				<div class="col-md-4 product simpleCart_shelfItem text-center">
					<a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $lat->id]) ?>"><?= Html::img("/admin{$mainImg->getUrl()}") ?></a>
					<a class="product_name" href="<?= \yii\helpers\Url::to(['product/view', 'id' => $lat->id]) ?>"><?= $lat->name ?></a>
					<a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $lat->id]) ?>"><p><i></i> <span class="item_price">$<?= $lat->price ?></span></p></a>
				</div>
				<?php endforeach; ?>
				<div class="clearfix"></div>
			</div>
		</div>

	</div>
<?php if(!empty($hits)): ?>
	<div class="other-products">
	<div class="container">
		<h3 class="like text-center">Featured Collection</h3>
		<ul id="flexiselDemo3">
		<?php foreach ($hits as $hit ): ?>
			<?php
			$mainImg = $hit->getImage();
			?>
				<li><a href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?= Html::img("/admin{$mainImg->getUrl()}") ?></a>
					<div class="product liked-product simpleCart_shelfItem">
						<a class="like_name" href="<?= \yii\helpers\Url::to(['product/view', 'id' => $hit->id]) ?>"><?=$hit->name ?></a>
						<p><a href="<?= \yii\helpers\Url::to(['product/view' , 'id' => $hit->id]) ?>"><i></i> <span class=" item_price">$<?=$hit->price ?></span></a></p>
					</div>
				</li>
		<?php endforeach; ?>
		</ul>

				 </div>
				 </div>
<?php endif; ?>
<script type="text/javascript">
	$(window).load(function() {
		$("#flexiselDemo3").flexisel({
			visibleItems: 4,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 3000,
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
			responsiveBreakpoints: {
				portrait: {
					changePoint:480,
					visibleItems: 1
				},
				landscape: {
					changePoint:640,
					visibleItems: 2
				},
				tablet: {
					changePoint:768,
					visibleItems: 3
				}
			}
		});

	});
</script>
	<!-- content-section-ends-here -->
