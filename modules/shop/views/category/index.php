<!-- Page info Хлебные крошки-->
<!--	<div class="page-top-info">
		<div class="container">
			<h4>Страница категорий</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
	</div>-->
	<!-- Page info end -->


	<!-- Category section -->
        <?php if(!empty($categories)): ?>
	<section class="category-section spad">
		<div class="container">
			<div class="row">
                            <!--menu-->
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Каталог</h2>
						<!--Вывод меню категорий-->
                                                <?=\app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                                                
					</div>
								
					<div class="filter-widget">
						<h2 class="fw-title">Производитель</h2>
						<ul class="category-menu">
                                                    <?php // foreach ($brends as $brend): ?>
                                                    <?php // debug($brend) ?>
                                                    <li><a href="#"><?php // $brend['name'] ?> <span>(<?php // count($brends) ?>)</span></a></li>
							<!--<li><a href="#">Asos<span>(56)</span></a></li>-->
                                                    <?php // endforeach; ?>
						</ul>
					</div>
				</div>

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
                                    <div class="row">
                                        <?php foreach ($categories as $category):?>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="product-item">
                                                <div class="pi-pic">
                                                    <?php // foreach ($hits as $hit):?>
                                                        <?php // if($hit['new']): ?>
                                                            <div class="tag-new">New</div>
                                                        <?php // endif; ?>

                                                        <?php // if($hit['sale']): ?>
                                                            <div class="tag-sale">SALE</div>
                                                        <?php // endif; ?>

                                                        <?php // if($hit['hit']): ?>
                                                            <div class="tag-hit">Hit</div>
                                                        <?php // endif; ?>
                                                    <?php // endforeach;?>
                                                    <!--<img src="./img/product/6.jpg" alt="">-->
                                                    
                                                    <?php // yii\helpers\Html::img("@web/img/img_shop/product/{$category['img']}", ['alt'=> $category['name']]) ?>
                                                    
                                                    <div class="pi-links">
                                                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                                    </div>
                                                </div>
                                                <div class="pi-text">
                                                    <h6><?= $category['price'] ?>грн</h6>
                                                    <p><?=$category['name']?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
                                        
                                        <div class="text-center w-100 pt-3">
                                            <button class="site-btn sb-line sb-dark">LOAD MORE</button>
                                        </div>
                                    </div>
				</div>
			</div>
		</div>
	</section>
        <?php endif;?>
	<!-- Category section end -->
