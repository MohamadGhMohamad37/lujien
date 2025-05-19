@extends('website.layout.app')
@section('title','Categories')
@section('content')

    <!-- BEGIN BODY -->

    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->

        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block_margin" style="background-image: url({{ asset('assets/img/category/6.jpg') }})">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>Categories</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Home</a>
                            </li>
                            <li class="bread-crumbs__item">Categories</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN TOP CATEGORIES -->
			<section class="all-categories">
				<div class="top-categories__items">
					<a href="#" class="top-categories__item">
						<img data-src="{{ (asset('assets/img/cat/category.jpg')) }}" src="{{ (asset('assets/img/cat/category.jpg')) }}" class="js-img" alt="">
						<div class="top-categories__item-hover">
							<h5>Cosmetics </h5>
							<span>browse products -</span>
							<i class="icon-arrow-lg"></i>
						</div>
					</a>
					<a href="#" class="top-categories__item">
						<img data-src="{{ (asset('assets/img/cat/Make-Up.jpg')) }}" src="{{ (asset('assets/img/cat/Make-Up.jpg')) }}" class="js-img" alt="">
						<div class="top-categories__item-hover">
							<h5>Make Up</h5>
							<span>browse products -</span>
							<i class="icon-arrow-lg"></i>
						</div>
					</a>
					<a href="#" class="top-categories__item">
						<img data-src="{{ (asset('assets/img/cat/Non-surgical Products.jpg')) }}" src="{{ (asset('assets/img/cat/Non-surgical Products.jpg')) }}" class="js-img" alt="">
						<div class="top-categories__item-hover">
							<h5>Non-surgical Products</h5>
							<span>browse products -</span>
							<i class="icon-arrow-lg"></i>
						</div>
                    </a>
                    <a href="#" class="top-categories__item">
						<img data-src="{{ (asset('assets/img/cat/Perfumes.jpg')) }}" src="{{ (asset('assets/img/cat/Perfumes.jpg')) }}" class="js-img" alt="">
						<div class="top-categories__item-hover">
							<h5>Perfumes</h5>
							<span>browse products -</span>
							<i class="icon-arrow-lg"></i>
						</div>
					</a>    
				</div>
			</section>
			<!-- TOP CATEGORIES EOF   -->
            <!-- BEGIN INSTA PHOTOS -->
            <div class="insta-photos">
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
            </div>
            <!-- INSTA PHOTOS EOF   -->

        </main>

        <!-- CONTENT EOF   -->
@endsection