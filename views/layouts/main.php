<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use app\models\MailForm;
use yii\captcha\Captcha;
use mihaildev\ckeditor\CKEditor;
use app\models\Services;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!doctype html>
    <html lang="ru-UA">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <!--<meta name="viewport" content="width=device-width, maximum-scale=1">-->
        <meta name="yandex-verification" content="514ea6f82826d397" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <meta name="theme-color" content="#5bb75b">
        <link rel="icon" href="/favicon.png" type="image/png">
    </head>
    <body>
    <?php $this->beginBody() ?>
    <!--Header_section-->
    <header id="header_wrapper">
        <div class="container-fluid">
            <div class="header_box">               
                <div class="logo">
                    <a href="/"><img src="/img/logo2.png" alt="logo"></a>
                </div>
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div id="main-nav" class="collapse navbar-collapse navStyle">
                        <ul class="nav navbar-nav" id="mainNav">
                            <li><a href="/" class="scroll-link">Главная</a></li>
                            <li class="active"><a href="#" class="scroll-link">Наверх</a></li>
                            <li><a href="#aboutUs" class="scroll-link">Что мы ремонтируем</a></li>
                            <li><a href="#service" class="scroll-link">Как добратся</a></li>
                            <li><a href="#team" class="scroll-link">Как мы работаем</a></li>
<!--                            <li><a href="#Portfolio" class="scroll-link">Portfolio</a></li>-->
                            <li><a href="#clients" class="scroll-link">Бренды</a></li>
                            <li><a href="#contact" class="scroll-link">Контакты</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

        </div>
    </header>
    <!--Header_section-->
    <?= Alert::widget() ?>
    <?= $content ?>

    <section  id="service">
        <div class="container-fluid">
            <h2>Как к нам добраться?</h2>
            <div class="service_wrapper">
                <div class="row">
                    <div class="col-lg-8">

                    </div>
                    <div class="col-xs-4 office">
                        <img src="/img/img-mas/linux.jpg" class="zoomIn wow animated" alt="вход в сц" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Service-->
    <section  id="team">
        <div class="container">
            <h2>Как мы работаем</h2>
            <div class="service_wrapper">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="service_block">
                            <div class="service_icon delay-03s animated wow  zoomIn"> <span><img src="/img/img-mas/1.svg" class="zoomIn wow animated" alt="Принести технику"/></span> </div>
                            <h3 class="animated fadeInUp wow"><span class="radius">1</span> Принести технику</h3>
                            <i class="fas fa-people-carry"></i>
                            <!--<p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-4 borderLeft">
                        <div class="service_block">
                            <div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><img src="/img/img-mas/2.svg" class="zoomIn wow animated" alt="Получить квитанцию" /></span> </div>
                            <h3 class="animated fadeInUp wow"><span class="radius">2</span> Получить квитанцию</h3>
                            <!--<p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-4 borderLeft">
                        <div class="service_block">
                            <div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><img src="/img/img-mas/3.svg" class="zoomIn wow animated" alt="Диагностика"/></span> </div>
                            <h3 class="animated fadeInUp wow"><span class="radius">3</span> Диагностика</h3>
                            <!--<p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>-->
                        </div>
                    </div>
                </div>
                <div class="row borderTop">
                    <div class="col-lg-4 mrgTop">
                        <div class="service_block">
                            <div class="service_icon delay-03s animated wow  zoomIn"> <span><img src="/img/img-mas/4.svg" class="zoomIn wow animated" alt="Согласование цены ремонта"/></span> </div>
                            <h3 class="animated fadeInUp wow"><span class="radius">4</span> Согласование цены ремонта</h3>
                            <!--<p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-4 borderLeft mrgTop">
                        <div class="service_block">
                            <div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><img src="/img/img-mas/5.svg" class="zoomIn wow animated" alt="Ремонт"/></span> </div>
                            <h3 class="animated fadeInUp wow"><span class="radius">5</span> Ремонт</h3>
                            <!--<p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>-->
                        </div>
                    </div>
                    <div class="col-lg-4 borderLeft mrgTop">
                        <div class="service_block">
                            <div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><img src="/img/img-mas/6.svg" class="zoomIn wow animated"  alt=" Гарантия"/></span> </div>
                            <h3 class="animated fadeInUp wow"><span class="radius">6</span> Гарантия</h3>
                            <!--<p class="animated fadeInDown wow">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Service-->
    <section class="page_section" id="clients"><!--page_section-->
        <h2>Бренды</h2>
        <!--page_section-->
        <div class="client_logos"><!--client_logos-->
            <div class="container">
                <ul class="fadeInRight animated wow">
                    <li><a href="javascript:void(0)">SAMSUNG</a></li>
                    <li><a href="javascript:void(0)">BOSCH</a></li>
                    <li><a href="javascript:void(0)">ZELMER</a></li>
                    <li><a href="javascript:void(0)">AEG</a></li>
                    <li><a href="javascript:void(0)">ELECTROLUX</a></li>
                    <li><a href="javascript:void(0)">Kenwood</a></li>
                    <li><a href="javascript:void(0)">Panasonic</a></li>
                    <li><a href="javascript:void(0)">PHILIPS</a></li>
                    <li><a href="javascript:void(0)">LG</a></li>
                    <li><a href="javascript:void(0)">Ardo</a></li>
                    <li><a href="javascript:void(0)">Indesit</a></li>
                    <li><a href="javascript:void(0)">Tefal</a></li>
                    <li><a href="javascript:void(0)">Moulinex</a></li>
                    <li><a href="javascript:void(0)">REDMOND</a></li>
                    <li><a href="javascript:void(0)"><strong>Pyramida</strong></a></li>

                </ul>
            </div>
        </div>
    </section>

    <!--Footer-->
    <footer class="footer_wrapper" id="contact">
        <div class="container">
            <section class="page_section contact">
                <div class="contact_section">
                    <h2>Наши контакты</h2>
                    <div class="row">
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 wow fadeInLeft">
                        <div class="contact_info">
                            <div class="detail">
                                <h4 style="color: white;">МастерОК - Ремонт бытовой техники</h4>
                                <p>г. Полтава ул. Пушкина 22</p>
                            </div>
                            <div class="detail">
                                <h4 style="color: white;">Телефоны:</h4>
                                <p>
                                    095 301 53 03 <br>
                                    096 521 23 23
                                </p>
                            </div>
                            <div class="detail">
                                <h4 style="color: white;">Email:</h4>
                                <p>info@masterok.pl.ua</p>
                            </div>
                        </div>

                     </div>
                    <div class="col-lg-8 wow fadeInLeft delay-06s">
                        <div class="form">
                            
                            
                <?php
                $model = new MailForm();
                    if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
                        Yii::$app->session->setFlash('contactFormSubmitted');

//                           return $this->refresh();
                    }
//                    return $this->render('callback', [
//                        'model' => $model,
//                    ]);
                ?>
                            <?php $form = ActiveForm::begin([
                                    'options' => [
                                            'class' => 'form-control_',
                                        ],
                            ]); ?>
                                <?= $form->field($model, 'user')->label(false)->textInput(['placeholder' => 'Ваше имя *:']) ?>
                                <?= $form->field($model, 'phone')->label(false)->textInput(['placeholder' => 'Ваш телефон *:']) ?>
                                <?= $form->field($model, 'text')->label(false)->textInput(['placeholder' => 'Ваше сообщение *:'])->widget(CKEditor::class,[
                                    'editorOptions' => [
                                        'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                                        'inline' => false, //по умолчанию false
                                    ],
                                ]); ?>
                                <?php // $form->field($model, 'verifyCode')->widget(Captcha::class, [
//                                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
//                                ]) ?>
                            <div class="form-group">
                                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-success scroll-link my-btn']) ?>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="container">
            <div class="footer_bottom">
                <span>MasterOK © Ремонт бытовой техники 2015 - <?= date('Y') ?></span>
            </div>
        </div>
    </footer>

    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Organization",
          "address": {
            "@type": "PostalAddress",
            "addressLocality": "Украина, Полтава",
            "postalCode": "36000",
            "streetAddress": "Пушкина 22"
          },
          "email": "info@masterok.pl.ua",
          "faxNumber": "(095) 301 53 03",
          "member": [
            {
              "@type": "Organization"
            },
            {
              "@type": "Organization"
            }
          ],
          "alumni": [
            {
              "@type": "Person",
              "name": "Игорь"
            },
            {
              "@type": "Person",
              "name": "Иван"
            }
          ],
          "name": "MasterOK",
          "telephone": "(095) 301 53 03"
        }
 </script>    
<!--    <script>-->
<!--window.replainSettings = { id: '5f3ddb11-48bf-45ca-8988-679f7e48e8f2' };-->
<!--(function(u){var s=document.createElement('script');s.type='text/javascript';s.async=true;s.src=u;-->
<!--var x=document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);-->
<!--})('https://widget.replain.cc/dist/client.js');-->
<!--</script>-->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>