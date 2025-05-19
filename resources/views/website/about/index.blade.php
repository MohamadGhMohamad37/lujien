@extends('website.layout.app')
@section('title','About')
@section('content')


    <!-- BEGIN BODY -->

    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->

        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block" style="background-image: url({{ asset('assets/img/category/1.jpg') }})">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>About</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="index.html" class="bread-crumbs__link">Home</a>
                            </li>
                            <li class="bread-crumbs__item">About</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN PROMO VIDEO -->
            <section class="promo-video">
                <div class="wrapper">
                    <div class="trending-top">
						<span class="saint-text">Promotion video</span>
						<h2>Welcome to lujien shope</h2>
						<p>Today we can offer our customers exclusive products of 108 brands marked "only in lujien shope"</p>
                    </div>
                    <div class="promo-video__block">
                        <img data-src="" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                        <iframe allowfullscreen></iframe>
                        <div class="info-blocks__item-img-overlay">
                            <span>Promotion video</span>
                            <div class="info-blocks__item-img-play">
                                <img data-src="img/play-btn.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="promo-video__nums">
                        <div class="promo-video__num">
                            <span>2300+</span>
                            <h5>Products</h5>
                        </div>
                        <div class="promo-video__num">
                            <span>108</span>
                            <h5>brands</h5>
                        </div>
                        <div class="promo-video__num">
                            <span>32</span>
                            <h5>partners</h5>
                        </div>
                        <div class="promo-video__num">
                            <span>618+</span>
                            <h5>customers</h5>
                        </div>
                    </div>
                </div>
                <img class="promo-video__decor js-img" data-src="https://via.placeholder.com/1197x1371/FFFFFF" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
            </section>
            <!-- PROMO VIDEO EOF   -->
            <!-- BEGIN DISCOUNT -->
			<div class="discount discount-about js-img" data-src="https://via.placeholder.com/1920x900">
				<div class="wrapper">
					<div class="discount-info">
						<span class="saint-text">Success story</span>
						<h2>lujien shop develops its own brands</h2>
                        <p>The lujien shope network is being developed and improved, taking into account all consumer.</p>
                        <p class="discount-info__sm">Forming the range of stores, we, above all, strive not only to meet the format of "home shop", offering each customer the most basic household goods, but also to create a unique space of beauty and care. lujien shope stores offer their customers the widest and highest quality selection of products from world-renowned manufacturers.</p>
						<a href="shop.html" class="btn">Shop now</a>
					</div>
				</div>
			</div>
            <!-- DISCOUNT EOF   -->
            <!-- BEGIN ADVANTAGES -->
			<div class="advantages">
				<div class="wrapper">
					<div class="advantages-items">
						<div class="advantages-item">
							<div class="advantages-item__icon">
								<i class="icon-natural"></i>
							</div>
							<h4>natural</h4>
							<p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim anim velit adipisicing ea aliqua alluptate sit do do.</p>
						</div>
						<div class="advantages-item">
							<div class="advantages-item__icon">
								<i class="icon-quality"></i>
							</div>
							<h4>Quality</h4>
							<p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim aelit adipisicing ea aliqua alluptate sit do do.</p>
						</div>
						<div class="advantages-item">
							<div class="advantages-item__icon">
								<i class="icon-organic"></i>
							</div>
							<h4>organic</h4>
							<p>Non aliqua reprehenderit reprehenderit a laboris nulla minim anim velit adipisicing ea aliqua alluptate sit do do.</p>
						</div>
					</div>
				</div>
			</div>
            <!-- ADVANTAGES EOF   -->
            <!-- BEGIN TESTIMONIALS -->
            <section class="testimonials">
                <div class="wrapper">
                    <div class="trending-top">
						<span class="saint-text">They say</span>
						<h2>testimonials</h2>
                    </div>
                    <div class="testimonials-slider js-testimonials-slider">
                        <div class="testimonials-slide">
                            <p>
                                I am grateful to the employees of lujien shop for the quality products that I have been using for more than a year, try to work at this level
                                in the future. Thank you)
                            </p>
                            <div class="testimonials-author">
                                <img data-src="https://via.placeholder.com/50" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                                <h5>Melissa Jones</h5>
                            </div>
                        </div>
                        <div class="testimonials-slide">
                            <p>
                                I am grateful to the employees of lujien shop for the quality products that I have been using for more than a year, try to work at this level
                                in the future. Thank you)
                            </p>
                            <div class="testimonials-author">
                                <img data-src="https://via.placeholder.com/50" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                                <h5>Melissa Gahan</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- TESTIMONIALS EOF   -->
            <!-- BEGIN SUBSCRIBE -->
            <div class="subscribe">
                <div class="wrapper">
                    <div class="subscribe-form">
                        <div class="subscribe-form__img">
                            <img data-src="https://via.placeholder.com/460x302" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                                class="js-img" alt="">
                        </div>
                        <form>
                            <h3>Stay in touch</h3>
                            <p>Nourish your skin with toxin-free cosmetic roducts.</p>
                            <div class="box-field__row">
                                <div class="box-field">
                                    <input type="text" class="form-control" placeholder="Enter your email">
                                </div>
                                <button type="submit" class="btn">subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- SUBSCRIBE EOF   -->

        </main>

        <!-- CONTENT EOF   -->

@endsection