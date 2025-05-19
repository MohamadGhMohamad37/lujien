@extends('website.layout.app')
@section('title','Shop')
@section('content')


    <style>
        .btn_content_shop {
            display: flex;
            justify-content: center;
            align-items: end;
            height: 68vh;
        }
    #categorySelect {
        width: 80%;
        padding: 10px 15px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin: 20px auto;
        display: block;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    #categorySelect:focus {
        border-color: #888;
        outline: none;
        box-shadow: 0 0 5px rgba(136, 136, 136, 0.3);
    }
</style>
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
            
        <!-- MAIN BLOCK EOF -->
           <section class="trending">
    <div class="trending-content">
        <div class="trending-top">
            <span class="saint-text">Cosmetics</span>
            <h2>Trending products</h2>
            <p>Nourish your skin with toxin-free cosmetic products. With the offers that you can’t refuse.</p>
        </div>

        <div class="tab-wrap trending-tabs">
            <select id="categorySelect" class="form-control">
                <option value="all">All Categories</option>
                @foreach($categories as $category)
                    <option value="category-{{ $category->id }}">{{ $category->name_en }}</option>
                @endforeach
            </select>

            <div class="box-tab-cont">
                {{-- All Products Tab --}}
                <div class="tab-cont">
                    <div class="products-items js-products-items">
    @foreach($categories as $category)
        @foreach($category->products  as $product)
            <a href="{{ route('product.page', ['lang' => app()->getLocale(), 'product' => $product->id]) }}" class="products-item category-{{ $category->id }}" data-category="category-{{ $category->id }}">

                <div class="products-item__img">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_en }}" class="js-img">
                    <div class="products-item__hover">
                        <div class="products-item__hover-options">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="products-item__info">
                    <span class="products-item__name">{{ $product->name_en }}</span>
                    <span class="products-item__cost">
                        @if($product->discount_price)
                            <span>{{ $product->price }} SP</span> {{ $product->discount_price }} SP
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
                            <p>Nourish your skin with Lujien cosmetic roducts.</p>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorySelect = document.getElementById('categorySelect');
        const products = document.querySelectorAll('.products-item');

        categorySelect.addEventListener('change', function () {
            const selectedCategory = this.value;

            products.forEach(product => {
                if (selectedCategory === 'all') {
                    product.style.display = 'block';
                } else {
                    if (product.dataset.category === selectedCategory) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                }
            });
        });
    });
</script>

@endsection