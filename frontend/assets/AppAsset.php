<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/bootstrap.css',
        'css/component.css',
        'css/flexslider.css',
        'css/style.css'
    ];

    public $js = [
        'js/jquery.min.js',
        'js/jquery.flexisel.js',
        'js/jquery.flexslider.js',
        //'js/bootstrap-3.1.1.min.js',
        'js/cbpViewModeSwitch.js',
        'js/classie.js',
        'js/responsive-tabs.js',
        'js/responsiveslides.min.js',
        'js/main.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        //'common\assets\Html5shiv',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
