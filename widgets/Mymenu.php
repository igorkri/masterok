<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 08.01.19
 * Time: 18:27
 */

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Services;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Menu;

class Mymenu extends Widget
{


    public function run()
    {

//        echo '<img src="/img/photo.jpg" alt="144" style="margin: -159px 0px 0px 0px;">';

        $services = Services::find()->select('img_menu, link, name')->asArray()->all();

        $i = 1;
        echo "<ul class='ul-menu'>" . PHP_EOL;

        foreach ($services as $val) {

                if ($i % 2) {
                    echo '<li class="li-menu li-menu-bg">' . "\n";
                } else {
                    echo '<li class="li-menu">' . "\n";
                }
                    echo "\t" . '<img src= ' . '\'' . $val['img_menu'] . '\'' . ' alt=' . '\'' . $val['name'] . '\'' . ' style="width: 30px; margin: 0 11px 8px 0px;" ' . '>';
                    echo "<a href=" . '\'' . $val['link'] . '\'' . ">" . $val['name'] . "</a>";
                    echo '</li>' . "\n";
                $i++;
        }

        echo "</ul> " . PHP_EOL;

    }



}