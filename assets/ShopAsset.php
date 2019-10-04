<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
     
     public $css = [

	'css/font-awesome.min.css',
	'css/flaticon.css',
	'css/slicknav.min.css',
	'css/jquery-ui.min.css',
	'css/owl.carousel.min.css',
	'css/animate.css',
	'css/style.css',
         
     ];
    public $js = [
        
	    'js/jquery.slicknav.min.js',
	    'js/owl.carousel.min.js',
        'js/jquery.nicescroll.min.js',
	    'js/jquery.zoom.min.js',
	    'js/jquery-ui.min.js',
        'js/jquery.cookie.js',
        'js/jquery.accordion.js',
    	'js/main.js',
        
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
