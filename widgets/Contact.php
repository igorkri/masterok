<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09.01.19
 * Time: 18:51
 */

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Services;

class Contact extends Widget
{
    
        public function run()
        {
        // $services = Services::find()->select('id_service')->all();
        
        // if($services->id_service == 10){
        //     echo "<div class='call'>";
        //     echo "<div class='phone'>";
        //       echo "<p><a href='tel:0669673779'>(066) 967-37-79</a></p>
        //              <p><a href='tel:0978627773'>(097) 862-77-73</a></p>";
        //   echo "</div>";
        // echo "<p class='ili'>или</p>";
        // echo "</div>";
        // echo "<div class='form'>";
        //     echo "<a href='#contact' class='btn btn-success scroll-link my-btn'>Оставить заявку онлайн</a>";
        // echo "</div>";
        
        // }else{
        
        echo "<div class='call'>";
           echo "<div class='phone'>";
               echo "<p><a href='tel:0953015303'>(095) 301 53 03</a></p>
                     <p><a href='tel:0965212323'>(096) 521 23 23</a></p>";
           echo "</div>";
        echo "<p class='ili'>или</p>";
        echo "</div>";
        echo "<div class='form'>";
            echo "<a href='#contact' class='btn btn-success scroll-link my-btn'>Оставить заявку онлайн</a>";
        echo "</div>";
        // }
    }
}