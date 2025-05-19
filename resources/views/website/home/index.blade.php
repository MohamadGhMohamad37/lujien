@extends('website.layout.app')
@section('title', 'Lujin Beauty Home')
@section('content')
    <!-- BEGIN CONTENT -->
    <style>
        .btn_content_shop {
            display: flex;
            justify-content: center;
            align-items: end;
            height: 68vh;
        }
    </style>
    <main class="content">
        <!-- BEGIN MAIN BLOCK -->
        <div class="main-block load-bg">
            <div class="wrapper btn_content_shop">
                <div class="main-block__content">
                    <a href="#" class="btn">Shop now</a>
                </div>
            </div>
        </div>
        <!-- MAIN BLOCK EOF -->
        <section class="trending">
    <div class="trending-content">
        <div class="trending-top">
            <span class="saint-text">Cosmetics</span>
            <h2>Trending products</h2>
            <p>Nourish your skin with toxin-free cosmetic products. With the offers that you can’t refuse.</p>
        </div>

        <div class="tab-wrap trending-tabs">

            <div class="box-tab-cont">
                {{-- All Products Tab --}}
                <div class="tab-cont">
                    <div class="products-items js-products-items">
                        @foreach($categories as $category)
                            @foreach($category->products as $product)
                                <a href="#" class="products-item">
                                    <div class="products-item__type">
                                        <span class="products-item__sale">{{ $product->tag ?? 'NEW' }}</span>
                                    </div>
                                    <div class="products-item__img">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_en }}" class="js-img">
                                        <div class="products-item__hover">
                                            <i class="icon-search"></i>
                                            <div class="products-item__hover-options">
                                                <i class="icon-heart"></i>
                                                <i class="icon-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-item__info">
                                        <span class="products-item__name">{{ $product->name_en }}</span>
                                        <span class="products-item__cost">
                                            @if($product->discount_price)
                                                <span>{{ $product->original_price }} SP</span> {{ $product->price }} SP
                                            @else
                                                {{ $product->price }} SP
                                            @endif
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

        <!-- BEGIN LOGOS -->
        <div class="main-logos">
            <img data-src="{{ asset('assets/img/4.png') }}" width="10%" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                class="js-img" alt="">
            <img data-src="{{ asset('assets/img/4.png') }}" width="10%" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                class="js-img" alt="">
            <img data-src="{{ asset('assets/img/4.png') }}" width="10%" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                class="js-img" alt="">
            <img data-src="{{ asset('assets/img/4.png') }}" width="10%" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                class="js-img" alt="">
            <img data-src="{{ asset('assets/img/4.png') }}" width="10%" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                class="js-img" alt="">
        </div>
        <!-- LOGOS EOF   -->
        <!-- BEGIN DISCOUNT -->
        <div class="discount js-img" data-src="{{ asset('assets/img/50.jpg') }}">
            <div class="wrapper">
                <div class="discount-info">
                    <span class="saint-text">Discount</span>
                    <span class="main-text">Get Your <span>50%</span> Off</span>
                    <p>Nourish your skin with toxin-free cosmetic products. With the offers that you can’t refuse.
                    </p>
                    <a href="#" class="btn">get now!</a>
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
                        <p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim anim velit adipisicing
                            ea aliqua alluptate sit do do.</p>
                    </div>
                    <div class="advantages-item">
                        <div class="advantages-item__icon">
                            <i class="icon-quality"></i>
                        </div>
                        <h4>Quality</h4>
                        <p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim aelit adipisicing ea
                            aliqua alluptate sit do do.</p>
                    </div>
                    <div class="advantages-item">
                        <div class="advantages-item__icon">
                            <i class="icon-organic"></i>
                        </div>
                        <h4>organic</h4>
                        <p>Non aliqua reprehenderit reprehenderit a laboris nulla minim anim velit adipisicing ea
                            aliqua alluptate sit do do.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- ADVANTAGES EOF   -->
        <!-- BEGIN INFO BLOCKS -->
        <div class="info-blocks">
            <div class="info-blocks__item js-img" data-src="https://via.placeholder.com/960x900">
                <div class="wrapper">
                    <div class="info-blocks__item-img">
                        <img data-src="{{ asset('assets/img/yt4aa.jpg') }}" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                            class="js-img" alt="">
                    </div>
                    <div class="info-blocks__item-text">
                        <span class="saint-text">Check This Out</span>
                        <h2>new collection for delicate skin</h2>
                        <span class="info-blocks__item-descr">Nourish your skin with toxin-free cosmetic products.
                            With the offers that you can’t refuse.</span>
                        <p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim anim velit adipisicing
                            ea aliqua alluptate sit do do.Non aliqua reprehenderit reprehenderit culpa laboris nulla
                            minim anim velit adipisicing ea aliqua alluptate sit do do.Non aliqua reprehenderit
                            reprehenderit culpa laboris nulla minim.</p>
                        <a href="#" class="btn">Shop now</a>
                    </div>
                </div>

            </div>
            <div class="info-blocks__item info-blocks__item-reverse js-img"
                data-src="https://via.placeholder.com/960x900">
                <div class="wrapper">
                    <div class="info-blocks__item-img">
                        <img data-src="{{ asset('assets/img/4.png') }}" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                            class="js-img" alt="">
                        <iframe allowfullscreen></iframe>
                        <div class="info-blocks__item-img-overlay">
                            <span>Promotion video</span>
                            <div class="info-blocks__item-img-play">
                                <img data-src="img/play-btn.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                                    class="js-img" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="info-blocks__item-text">
                        <span class="saint-text">About Us</span>
                        <h2>Who we are</h2>
                        <span class="info-blocks__item-descr">Nourish your skin with toxin-free cosmetic products.
                            With the offers that you can’t refuse.</span>
                        <p>Non aliqua reprehenderit reprehenderit culpa laboris nulla minim anim velit adipisicing
                            ea aliqua alluptate sit do do.Non aliqua reprehenderit reprehenderit culpa laboris nulla
                            minim anim velit adipisicing ea aliqua alluptate sit do do.Non aliqua reprehenderit
                            reprehenderit culpa laboris nulla minim.</p>
                        <a href="#" class="info-blocks__item-link">
                            <i class="icon-video"></i>
                            Watch video about us
                            <i class="icon-arrow-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- INFO BLOCKS EOF   -->

    </main>

    <!-- CONTENT EOF   -->
@endsection
