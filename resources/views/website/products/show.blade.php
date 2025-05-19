@extends('website.layout.app')
@section('title','Product')
@section('content')
<style>
    .product-info__size ul {
        list-style: none;
        padding: 0;
        display: flex;
        gap: 10px;
    }

    .product-info__size li label {
        border: 1px solid #ccc;
        padding: 5px 12px;
        border-radius: 4px;
        cursor: pointer;
        user-select: none;
    }

    .product-info__size li input[type="radio"] {
        display: none;
    }

    .product-info__size li input[type="radio"]:checked + span {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .product-info__color ul {
        list-style: none;
        padding: 0;
        display: flex;
        gap: 10px;
    }

    .product-info__color li {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.3s ease;
    }

    .product-info__color li.active,
    .product-info__color li:hover {
        border-color: #007bff;
    }
</style>
    <!-- BEGIN BODY -->

    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->

        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block_margin" style="background-image: url({{ asset('assets/img/category/1.jpg') }})">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>Shop</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Home</a>
                            </li>
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Shop</a>
                            </li>
                            <li class="bread-crumbs__item">{{ $product->{'name_' . app()->getLocale()} }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN PRODUCT -->
            <div class="product">
                <div class="wrapper">
                    <div class="product-content">
                        <div class="product-slider">
    <div class="product-slider__main">
        {{-- الصورة الرئيسية --}}
        <div class="product-slider__main-item">
            <img loading="lazy" src="{{ asset('storage/' . $product->image) }}" alt="product">
        </div>

        {{-- بقية الصور --}}
        @foreach($product->images as $img)
            <div class="product-slider__main-item">
                <img loading="lazy" src="{{ asset('storage/' . $img) }}" alt="product">
            </div>
        @endforeach
    </div>

    <div class="product-slider__nav">
        {{-- الصورة الرئيسية --}}
        <div class="product-slider__nav-item">
            <img loading="lazy" src="{{ asset('storage/' . $product->image) }}" alt="product">
        </div>

        {{-- بقية الصور --}}
        @foreach($product->images as $img)
            <div class="product-slider__nav-item">
                <img loading="lazy" src="{{ asset('storage/' . $img) }}" alt="product">
            </div>
        @endforeach
    </div>
</div>

                        <div class="product-info">
                            <h3>{{ $product->{'name_' . app()->getLocale()} }}</h3>
                            <span class="product-stock">{{ $category->{'name_' . app()->getLocale()} }}</span>
                            <span class="product-price">
                                @if($product->discount_price)
                                    <span>${{ $product->price }}</span> ${{ $product->discount_price }}
                                @else
                                    ${{ $product->price }}
                                @endif
                            </span>
                            {!! $product->{'desc_' . app()->getLocale()} !!}
                            <div class="product-options">
                                <form action="{{ route('cart.add', ['lang' => app()->getLocale()]) }}" method="POST" id="add-to-cart-form">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <div class="product-info__color">
        <span>{{ __('Color') }}:</span>
        <ul>
            @if(!empty($product->color_codes) && is_array($product->color_codes))
                @foreach($product->color_codes as $index => $code)
                    <li style="background-color: {{ $code }};" data-color="{{ $product->colors[$index] ?? '' }}" @if($loop->first) class="active" @endif></li>
                @endforeach
            @endif
        </ul>
        <input type="hidden" name="color" id="selected-color" value="{{ $product->colors[0] ?? '' }}">
    </div>

    <div class="product-info__size">
        <span>{{ __('Size') }}:</span>
        <ul>
            @if(!empty($product->size) && is_array($product->size))
                @foreach($product->size as $size)
                    <li>
                        <label>
                            <input type="radio" name="size" value="{{ $size }}" @if($loop->first) checked @endif>
                            <span>{{ $size }}</span>
                        </label>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    <div class="product-info__quantity">
        <span class="product-info__quantity-title">Quantity:</span>
        <input type="number" name="quantity" value="1" min="1" style="width: 60px; padding: 5px;">
    </div>

    <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Add to Cart</button>
</form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- PRODUCT EOF   -->

        </main>

        <!-- CONTENT EOF   -->

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // اختيار اللون وتحديث القيمة المخفية
    $('.product-info__color li').click(function () {
        $('.product-info__color li').removeClass('active');
        $(this).addClass('active');
        $('#selected-color').val($(this).data('color'));
    });

    // إرسال النموذج عبر AJAX
    $('#add-to-cart-form').submit(function (e) {
        e.preventDefault(); // منع الإرسال العادي

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'تمت الإضافة!',
                    text: response.message || 'تم إضافة المنتج إلى العربة.',
                    timer: 2500,
                    showConfirmButton: false
                });
            },
            error: function (xhr) {
                let message = 'حدث خطأ ما.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ',
                    text: message
                });
            }
        });
    });
</script>

@endsection