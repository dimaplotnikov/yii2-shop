<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;
use common\models\Category;
use common\widgets\CartInformerWidget;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Pjax;

AppAsset::register($this);
$categories = Category::getTree();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<!--    <script src="js/jquery.js" type="text/javascript"></script>-->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body >
<?php $this->beginBody();?>
<div class="header">
  <div class="header-top-strip">
    <div class="container">
      <div class="header-top-left">
        <ul>
            <?php if(Yii::$app->user->isGuest): ?>
                <li><a href="<?= Url::to(['/user/security/login']); ?>"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
                <li><a href="<?= Url::to(['/user/registration/register']); ?>"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a></li>
            <?php else: ?>
                <li>
                    <?php $username = Yii::$app->user->identity->username; ?>
                    <a href="/user/security/logout" data-method="post"><span class="glyphicon glyphicon-user"> </span>Logout (<?=$username?>)     </a>
                </li>
                <li><a href="<?= Url::to(['/user/settings/profile']); ?>"><span class="glyphicon glyphicon-cog"> </span>My profile</a></li>
            <?php endif; ?>
        </ul>
      </div>
      <div class="header-right">
            <div class="clearfix"> </div>
          </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<!-- header-section-ends -->
    <div class="banner-top">
  <div class="container">
      <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <div class="logo">
        <h1><a href="<?= \yii\helpers\Url::home() ?>"><span>E</span> -Shop</a></h1>
      </div>
    </div>
    <!--/.navbar-header-->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <div class="col-sm-3">
                <div class="input-group">
                    <form method="get" action="<?= Url::to(['/category/search'])  ?>">
                        <input type="text" class="form-control" name="q" placeholder="Search for...">
                    </form>

                </div><!-- /input-group -->
        </div>
        <ul class="nav navbar-nav">
          <?php
          foreach ($categories as $cat) {
            if($cat['parent_id'] == NULL)
            { ?>
              <li class="dropdown">
  		            <a href="<?= yii\helpers\Url::to(['/category/view', 'id' =>$cat['id']]) ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $cat['name']; ?> <b class="caret"></b></a>
                  <ul class="dropdown-menu multi-column">
                    <div class="row">
                      <div class="col-sm-4">
                        <ul class="multi-column-dropdown">
                  <?php foreach($cat['childs'] as $subcat)
                  {?>
                            <li><a href="<?= yii\helpers\Url::to(['/category/view', 'id' =>$subcat['id']]) ?>"><?php echo $subcat['name']; ?></a></li>
                        <?php
                  } ?>
                </ul>
              </div>
              <div class="clearfix"></div>
            </div>
          </ul>
      </li>
            <?php }
          }?>
        </ul>

    </div>
    <!--/.navbar-collapse-->
</nav>
<!--/.navbar-->
</div>
</div>
<!--<div class="container">-->
<div class="container">
<?= $content ?>
<!--</div>-->
</div>
<div class="footer">
<div class="container">
  <div class="copyright text-center">
    <p>© 2015 Eshop. All Rights Reserved | Design by   <a href="http://w3layouts.com">  W3layouts</a></p>
  </div>
</div>
</div>
<!-- JS -->
<script>
    // PRODUCT IMAGE ZOOM
    $("#elevatezoom_big").elevateZoom({
        gallery : "elevatezoom_gallery",
        zoomActivation: "hover",
        zoomType : "window",
        scrollZoom : true,
        zoomWindowFadeIn : 500,
        zoomLensFadeIn: 500,
        imageCrossfade: true,
        zoomWindowWidth : 370,
        zoomWindowHeight : 370,
        zoomWindowOffetx : 15,
        zoomWindowOffety : 0,
        borderSize : 1,
        borderColour : "#e9e9e9"
    });
    $(document).on('click', '.elevatezoom_big_clicker', function() {
        $('.zoomLens').trigger('click');
    });
    // BIG IMAGE FANCYBOX
    $("#elevatezoom_big").bind("click", function() {
        $.fancybox( $('#elevatezoom_big').data('elevateZoom').getGalleryList() );
        return false;
    });
    // THUMBS SLIDER
    var quickViewGallery = new Swiper('#elevatezoom_gallery', {
        // width: 302,
        loop: true,
        speed: 500,
        slidesPerView: 4,
        spaceBetween: 10,
        prevButton: '#elevatezoom_gallery__prev',
        nextButton: '#elevatezoom_gallery__next',
        breakpoints: {
            1199: {
                slidesPerView: 3
            }
        }
    });
</script>

<script>
    var owl = $("#owl-demo");
    owl.owlCarousel({
        items : 4, //10 items above 1000px browser width
        itemsDesktop : [1000,4], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,2], // betweem 900px and 601px
        itemsTablet: [600,1], //2 items between 600 and 0
        itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
    });
    // Custom Navigation Events
    $(".next").click(function(){
        owl.trigger('owl.next');
    })
    $(".prev").click(function(){
        owl.trigger('owl.prev');
    });
    $(document.body).append('<a id="back_top" href="#"></a>');
    $('#back_top').hide();
    $(window).scroll(function(){
        if ( $(this).scrollTop() > 300 ) {
            $('#back_top').fadeIn("slow");
        }
        else {
            $('#back_top').fadeOut("slow");
        };
    });
    $('#back_top').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop : 0},800);
        $('#back_top').fadeOut("slow").stop();
    });
</script>

<script>
    $(window).load(function(){
        $('#current_option').click(function(){
            customOptionsBlock = $("#custom_options");
            if (customOptionsBlock.is(":hidden")) {
                $("#custom_options").show();
            }
            else {
                $("#custom_options").hide();
            }
        });

        $("#custom_options li").click(function(){
            choosenValue = $(this).attr("data-value");
            $("select").val(choosenValue).prop("selected", true);
            $("#current_option span").text($(this).text());
            $("#current_option").attr("data-value", choosenValue);
            $("#custom_options").hide();
        });
    });
</script>
<script>
    $('.item_add').on('click' , function(e)
    {
        e.preventDefault()
        //var id = $(this).attr("data-id")
        var id = $(this).data('id');
        var qty = $('#qty').val();
        var sum = $('#sum').val();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
        url: '/cart/add',
        data: {id: id , qty: qty, sum:sum,_csrf : csrfToken},
        type: 'GET',
        success: function(res){
            if(!res) alert('Ошибка!');
            showCart(res);
        },
        error: function(){
            alert('Error');
        }
    });
    });
    function showCart(cart)
    {
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }

    function getCart()
    {
        $.ajax({
            url: '/cart/show',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error');
            }
        });
        return false;
    }
    $(document).ready(function(){
        $("#cart").delegate(".modal-body .del-item" , "click", function(){
            var id = $(this).data('id');
            $.ajax({
                url: '/cart/del-item',
                data: {id: id},
                type: 'GET',
                success: function(res){
                    if(!res) alert('Ошибка!');
                    showCart(res);
                },
                error: function(){
                    alert('Error');
                }
            });
        });
    });

    function clearCart()
    {
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function(res){
                if(!res) alert('Ошибка!');
                showCart(res);
            },
            error: function(){
                alert('Error');
            }
        });
    }
</script>
<?php \yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продожлить покупки</button>
        <a href="' .\yii\helpers\Url::to(['cart/view']) .'" class="btn btn-success">Оформить заказ</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>',
]);
\yii\bootstrap\Modal::end();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

