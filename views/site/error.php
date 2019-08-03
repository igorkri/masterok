<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use app\widgets\Menu;
use app\widgets\Contact;



$this->title = $name;
?>

<!--Hero_Section-->
<section id="hero_section" class="top_cont_outer">
    <div class="hero_wrapper">
        <div class="container-fluid">
            <div class="hero_section">
                <div class="row">
                    
                    <div class="col-lg-6 col-sm-5">
                        <img src="/img/404-page-not-found.png" class="zoomIn wow animated" alt="404" />
                    </div>
                    
                    <div class="col-lg-5 col-sm-6">
                        <div class="top_left_cont zoomIn wow animated">
                            <h1 style="text-align: center"><?=$services->title_slide?></h1>
                            <!--  Header contact  -->

                            <?=Contact::widget();?>

                            <!--  Header contact  -->
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!--Hero_Section-->
<!--Aboutus-->
<section id="aboutUs">
    <div class="inner_wrapper">
        <div class="container-fluid">
            <h2><?=$services->title_page?></h2>
            <div class="inner_section">
                <div class="row">
                    
                    <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left">
                        <div class=" delay-01s animated fadeInDown wow animated">
                            <div class="moduletable">
                                <h3>Бытовая техника</h3>
                                <!--Menu-->
                                <?=Menu::widget();?>
                                <!--Menu-->
                            </div>
                        </div>
                    </div>
                    
                    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-12 pull-right">

                            <?=$services->text?>
                        <div class="site-error">
                        <h1><?= Html::encode($this->title) ?></h1>

                        <div class="alert alert-danger">
                            <?= nl2br(Html::encode($message)) ?>
                            
                            <h2></h2>
                            
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>