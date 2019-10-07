<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Description of ShopAsset
 *
 * @author oem
 */
class ShopAsset extends AssetBundle{
    //put your code here
     public $sourcePath = '@app/modules/shop/web';
//     public $baseUrl = '@app/modules/shop/web';
     //$bundle = $this->getAssetManager()->getBundle('app\assets\ShopAsset'); // получить бандл


//    public $basePath = '@webroot';
//    public $baseUrl = '@web';
    public $css = [
//        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/animate.css',
        'css/main.css',
        'css/responsive.css',
    ];
    public $js = [
//        'js/jquery.js',
//        'js/bootstrap.min.js',
        'js/jquery.scrollUp.min.js',
        'js/price-range.js',
        'js/jquery.prettyPhoto.js',
        'js/jquery.cookie.js',
        'js/jquery.accordion.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}
