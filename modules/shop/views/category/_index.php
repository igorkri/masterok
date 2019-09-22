<!-- Hero section -->

	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="/img/img_shop/bg.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>denim jackets</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="/img/img_shop/bg-2.jpg">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>denim jackets</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="#" class="site-btn sb-line">DISCOVER</a>
							<a href="#" class="site-btn sb-white">ADD TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->
        <!--<ul class="catalog">-->
            <?=\app\components\MenuWidget::widget(['tpl' => 'menu'])?>
        <!--</ul>-->
	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="/img/img_shop/icons/1.png" alt="#">
						</div>
						<h2>Fast Secure Payments</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="/img/img_shop/icons/2.png" alt="#">
						</div>
						<h2>Premium Products</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="/img/img_shop/icons/3.png" alt="#">
						</div>
						<h2>Free & fast Delivery</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
       <?php if(!empty($sliders)): ?>
       <section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>LATEST PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
                            <?php foreach ($sliders as $slider): ?>
				<div class="product-item">
                                    <div class="pi-pic">
                                        
                                        <?php if($slider['new']): ?>
                                            <div class="tag-new">New</div>
                                        <?php endif; ?>

                                        <?php if($slider['sale']): ?>
                                            <div class="tag-sale">SALE</div>
                                        <?php endif; ?>

                                        <?php if($slider['hit']): ?>
                                            <div class="tag-hit">Hit</div>
                                        <?php endif; ?>
                                        
                                        <?= yii\helpers\Html::img("@web/img/img_shop/product/{$slider['img']}", ['alt'=> $slider['name']]) ?>
						
                                        <div class="pi-links">
                                            <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                            <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="pi-text">
                                        <h6><?= $slider['price'] ?>грн</h6>
                                        <p><?=$slider['name']?></p>
                                    </div>
				</div>
                            <?php endforeach;?>
			</div>
		</div>
	</section>
        <?php endif; ?>
    <!-- letest product section end -->
   
    <?php if(!empty($hits)): ?>
	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>BROWSE TOP SELLING PRODUCTS</h2>
			</div>
<!--			<ul class="product-filter-menu">
				<li><a href="#">TOPS</a></li>
				<li><a href="#">JUMPSUITS</a></li>
				<li><a href="#">LINGERIE</a></li>
				<li><a href="#">JEANS</a></li>
				<li><a href="#">DRESSES</a></li>
				<li><a href="#">COATS</a></li>
				<li><a href="#">JUMPERS</a></li>
				<li><a href="#">LEGGINGS</a></li>
			</ul>-->
                        <div class="row">
                            <?php foreach ($hits as $hit): ?>
			
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
                                                 <?php if($hit['new']): ?>
                                                    <div class="tag-new">New</div>
                                                <?php endif; ?>

                                                <?php if($hit['sale']): ?>
                                                    <div class="tag-sale">SALE</div>
                                                <?php endif; ?>

                                                <?php if($hit['hit']): ?>
                                                    <div class="tag-hit">Hit</div>
                                                <?php endif; ?>
                                                
                                                <?= yii\helpers\Html::img("@web/img/img_shop/product/{$hit['img']}", ['alt'=> $hit['name']]) ?>
						
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
                                                    <h6><?= $hit['price'] ?>грн</h6>
                                                    <p><?=$hit['name']?></p>
						</div>
					</div>
				</div>
			
			
                            <?php endforeach; ?>
                        </div>
			<div class="text-center pt-5">
				<button class="site-btn sb-line sb-dark">LOAD MORE</button>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->
        <?php endif;?>

	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
			<div class="banner set-bg" data-setbg="/img/img_shop/banner-bg.jpg">
				<div class="tag-new">NEW</div>
				<span>New Arrivals</span>
				<h2>STRIPED SHIRTS</h2>
				<a href="#" class="site-btn">SHOP NOW</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->

