<?php

use app\widgets\Mymenu;
use app\widgets\Contact;

?>

<?php
$this->title = $services->title;

\Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => $services->meta_desk
]);

?>
<!--Hero_Section-->
<section id="hero_section" class="top_cont_outer">
    <div class="hero_wrapper">
        <div class="container-fluid">
            <div class="hero_section">
                <div class="row">

                    <div class="col-lg-6 col-sm-5">
                        <img src="<?=$services->img_slide?>" class="zoomIn wow animated" alt="<?=$services->name?>" />
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
            <h2 style="
                    margin: 30px 0 0px 0;
                    border-bottom: 4px solid green;
                    padding-bottom: 20px;
                        "><?=$services->title_page?></h2>
            <div class="inner_section">
                <div class="row">
                    <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left" style="margin-top: -20px;">
                        <div class=" delay-01s animated fadeInDown wow animated">
                            <div class="moduletable">
                                <h3 class="h3re">Бытовая техника</h3>
                                <!--Menu-->
                                <?=Mymenu::widget();?>
                                <!--Menu-->
                            </div>
                        </div>
                    </div>

                    <div class=" col-lg-9 col-md-9 col-sm-9 col-xs-12 pull-right">
                        <?=$services->text?>
                    </div>
                </div>


                <div class="container-fluid">
                    <div class="row">
                        <div class="rating-container">
                            <!--       rating             -->
                            <?php
                            $str = explode(',', $services->rating);
                            $count = count($str);
                            $sum = array_sum($str);
                            $dev = $sum/$count;
                            $round = round($dev, 1);

                            echo \kartik\rating\StarRating::widget([
                                'value' => $round,
                                'name' => 'rating_021',
                                'pluginOptions' => [
                                    'theme' => 'krajee-uni',
                                    'filledStar' => '&#x2605;',
                                    'emptyStar' => '&#x2606;',
                                    'disabled' => Yii::$app->user->isGuest ? true : false,//для гостя блокируем кнопки
                                    'showClear' => false,
                                    'showCaption' => false,
                                    'showCaptionAsTitle' => false,
                                    'min' =>0,
                                    'max' => 5,
                                    'step' => 1,
                                    'size' => 'sm',
                                    'language' => 'ru',
                                ],
                                'pluginEvents' => [
                                    'rating:change' => "function(event, value, caption){
                                            $.ajax({
                                                url:'/site/stars',
                                                method:'post',
                                                data:{
                                                    stars:value,
                                                    id: " . $services['id_service'] . ",
                                                },
                                                dataType:'json',
                                                success:function(data){
                                                    location.reload();
                                                }
                                            });
                                        }"
                                ]
                            ]);
                            echo "<div class='font-rating label label-default badge-secondary'>";
                            echo "<b>Кол-во голосов:</b> " . $count . ' ' . '|' . ' ';
                            echo "<b> Оценка: </b>" . $round;
                            echo "</div>";
                            echo '<hr>';
                            ?>
                        </div>
                        <!--         rating           -->
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!--Aboutus-->
<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?='https://masterok.pl.ua'?><?=$services->link?>"
        },
        "headline": "Article headline",
        "image": [
            "<?='https://masterok.pl.ua'?><?=$services->img_slide?>"
        ],
        "datePublished": "2015-02-05T08:00:00+08:00",
        "dateModified": "2015-02-05T09:20:00+08:00",
        "author": {
            "@type": "Person",
            "name": "Игорь"
        },
        "publisher": {
            "@type": "Organization",
            "name": "MasterOK",
            "logo": {
                "@type": "ImageObject",
                "url": "https://masterok.pl.ua/img/logo2.png"
            }
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "<?=$round?>",
            "bestRating": "5",
            "ratingCount": "<?=$count?>"
        },
        "description": "<?=$services->meta_desk?>"
    }
</script>
