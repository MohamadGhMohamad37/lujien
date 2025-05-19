@extends('website.layout.app')
@section('title','Shop')
@section('content')


    <!-- BEGIN BODY -->

    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->

        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block_margin" style="background-image: url({{ asset('assets/img/category/4.jpg') }})">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>Shop</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Home</a>
                            </li>
                            <li class="bread-crumbs__item">Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            
        <!-- MAIN BLOCK EOF --><section class="trending">
    <div class="trending-content">
        <div class="trending-top">
            <span class="saint-text">Cosmetics</span>
            <h2>Trending products</h2>
            <p>Nourish your skin with toxin-free cosmetic products. With the offers that you can’t refuse.</p>
        </div>

        <div class="tab-wrap trending-tabs">
            <div class="search-bar mb-4">
                <input type="text" id="productSearch" placeholder="Search products..." class="form-control" style="width: 300px; margin-bottom: 20px;">
            </div>

            <ul class="nav-tab-list tabs">
                <li class="active">
                    <a href="#trending-tab_all">All</a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a href="#trending-tab_{{ $category->id }}">{{ $category->name_en }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="box-tab-cont">
                {{-- All Products Tab --}}
                <div class="tab-cont" id="trending-tab_all">
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
                                        <span class="products-item__name">{{ $product->{'name_' . app()->getLocale()} }}</span>
                                        <span class="products-item__cost">
                                            @if($product->discount_price)
                                                <span>{{ $product->discount_price }} SP</span> {{ $product->price }} SP
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

                {{-- Tabs for each category --}}
                @foreach($categories as $category)
                    <div class="tab-cont hide" id="trending-tab_{{ $category->id }}">
                        <div class="products-items">
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
                                                <span>{{ $product->original_price }} SP</span> {{ $product->discount_price }} SP
                                            @else
                                                {{ $product->original_price }} SP
                                            @endif
                                        </span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
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
<script>
    document.getElementById('productSearch').addEventListener('input', function () {
        let filter = this.value.toLowerCase();
        let tabs = document.querySelectorAll('.tab-cont');

        tabs.forEach(function (tab) {
            let products = tab.querySelectorAll('.products-item');
            products.forEach(function (product) {
                let productName = product.querySelector('.products-item__name').textContent.toLowerCase();
                if (productName.includes(filter)) {
                    product.style.display = '';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    });
</script>


@endsection
@section('script')

<script src="{{ asset('assets/js/jquery.maskedinput.js') }}"></script>
<script src="{{ asset('assets/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.formstyler.js') }}"></script>
@endsection