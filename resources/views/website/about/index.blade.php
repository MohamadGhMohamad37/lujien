@extends('website.layout.app')
@section('title', 'About')
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
                        <p>Today we can offer our customers exclusive products of 108 brands marked "only in lujien shope"
                        </p>
                    </div>

                    <div class="promo-video__nums">
                        <div class="promo-video__num">
                            <span>{{ number_format($productCount) }}+</span>
                            <h5>Products</h5>
                        </div>
                        <div class="promo-video__num">
                            <span>{{ number_format($categoryCount) }}</span>
                            <h5>Categories</h5>
                        </div>
                        <div class="promo-video__num">
                            <span>{{ number_format($orderCount) }}</span>
                            <h5>Orders</h5>
                        </div>
                        <div class="promo-video__num">
                            <span>{{ number_format($userCount) }}+</span>
                            <h5>Users</h5>
                        </div>
                    </div>

                </div>
            </section>
            <!-- PROMO VIDEO EOF   -->
            <!-- BEGIN DISCOUNT -->
            @foreach ($abouts as $about)
                <div class="discount discount-about js-img" data-src="https://via.placeholder.com/1920x900">
                    <div class="wrapper">
                            <div class="tg-supplement-img text-end  wow fadeInRight" data-wow-delay=".2s">
                                <img src="{{ asset($about->image) }}" style="width:70%;" alt="">
                            </div>
                        <div class="discount-info">
                            <span class="saint-text">Success story</span>
                            <h2>{{ $about->{'name_' . app()->getLocale()} ?? $about->name_en }}</h2>
                            <p class="discount-info__sm">{!! $about->{'desc_' . app()->getLocale()} ?? $about->desc_en !!} </p>
                            <a href="shop.html" class="btn">Shop now</a>
                        </div>
                    </div>
                </div>
            @endforeach
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
                            <p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim anim velit adipisicing ea
                                aliqua alluptate sit do do.</p>
                        </div>
                        <div class="advantages-item">
                            <div class="advantages-item__icon">
                                <i class="icon-quality"></i>
                            </div>
                            <h4>Quality</h4>
                            <p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim aelit adipisicing ea aliqua
                                alluptate sit do do.</p>
                        </div>
                        <div class="advantages-item">
                            <div class="advantages-item__icon">
                                <i class="icon-organic"></i>
                            </div>
                            <h4>organic</h4>
                            <p>Non aliqua reprehenderit reprehenderit a laboris nulla minim anim velit adipisicing ea aliqua
                                alluptate sit do do.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADVANTAGES EOF   -->
            <!-- BEGIN SUBSCRIBE -->
            <div class="subscribe">
                <div class="wrapper">
                    <div class="subscribe-form">
                        <div class="subscribe-form__img">
                            <img data-src="https://via.placeholder.com/460x302"
                                src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
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
