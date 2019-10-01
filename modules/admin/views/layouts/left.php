<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [

                    [
                        'label' => 'SHOP', 
//                        'options' => ['class' => 'header'],
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Категории', 'icon' => 'barcode', 'url' => ['/admin/shop/category']],
                            ['label' => 'Продукты', 'icon' => 'barcode', 'url' => ['/admin/shop/product']],
                            ['label' => 'Бренд', 'icon' => 'barcode', 'url' => ['/admin/shop/brend']],
                            ['label' => 'Атрибуты', 'icon' => 'barcode', 'url' => ['/admin/shop/attributes']],
                            ['label' => 'Значения', 'icon' => 'barcode', 'url' => ['/admin/shop/values']],
                            ['label' => 'Product Tags', 'url' => ['/admin/shop/products-tags']],
                            ['label' => 'Изображение', 'url' => ['/admin/shop/images']],
                        ]
                    ],
                        

                    ['label' => 'Главная админ', 'icon' => 'angellist', 'url' => ['/admin/']],
                    ['label' => 'Страницы сайта', 'icon' => 'bullhorn', 'url' => ['/admin/services']],
                            
                    
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
