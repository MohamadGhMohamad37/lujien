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
        @foreach($category->latestProducts  as $product)
            <a href="#" class="products-item category-{{ $category->id }}" data-category="category-{{ $category->id }}">
                <div class="products-item__type">
                    <span class="products-item__sale">{{ $product->tag ?? 'NEW' }}</span>
                </div>
                <div class="products-item__img">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name_en }}" class="js-img">
                    <div class="products-item__hover">
                        <i class="icon-search"></i>
                        <div class="products-item__hover-options">
                            <i class="icon-cart"></i>
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
    </main>

    <!-- CONTENT EOF   -->
@endsection
@section('script')
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