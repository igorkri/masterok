<?php


namespace app\widgets;


use app\models\Services;
use yii\base\Widget;

class ContactPavel extends Widget
{
    public function run()
    {

                echo "<div class='call'>";
                echo "<div class='phone'>";
                echo "<p><a href='tel:0669673779'>(066) 967-37-79</a></p>
                       <p><a href='tel:0978627773'>(097) 862-77-73</a></p>";
                echo "</div>";
                echo "<p class='ili'>или</p>";
                echo "</div>";
                echo "<div class='form'>";
                echo "<a href='#contact' class='btn btn-success scroll-link my-btn'>Оставить заявку онлайн</a>";
                echo "</div>";

        }

}