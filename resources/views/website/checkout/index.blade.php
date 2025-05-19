@extends('website.layout.app')
@section('title','Order Lujien')
@section('content')

            <!-- BEGIN CHECKOUT -->
            <div class="checkout">
                <div class="wrapper">
                    <div class="checkout-content">
                        <div class="checkout-form">
                            <form action="{{ route('orders.store', app()->getLocale()) }}" method="POST">
                                @csrf
                                <div class="checkout-form__item">
                                    <h4>Info about you</h4>
                                    <div class="box-field">
                                        <input type="text" class="form-control" name="first_name" placeholder="Enter your name">
                                    </div>
                                    <div class="box-field">
                                        <input type="text" class="form-control" name="last_name" placeholder="Enter your last name">
                                    </div>
                                    <div class="box-field__row">
                                        <div class="box-field">
                                            <input type="number" class="form-control" name="phone" placeholder="ex: 0999999999">
                                        </div>
                                        <div class="box-field">
                                            <input type="email" class="form-control" name="email" placeholder="Enter your mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-form__item">
                                    <h4>Delivery Info</h4>
                                           

                                    <div class="box-field__row">
                                        <div class="box-field">
                                         <input type="text" class="form-control" name="country" placeholder="Enter the Country">
                                        </div>
                                    </div>
                                    <div class="box-field__row">
                                        <div class="box-field">
                                            <input type="text" class="form-control" name="city" placeholder="Enter the city">
                                        </div>
                                        <div class="box-field">
                                            <input type="text" class="form-control" name="address" placeholder="Enter the address">
                                        </div>
                                    </div>
                                    <div class="box-field__row">
                                        <div class="box-field">
                                            <input type="text" name="delivery_day" class="form-control" hidden placeholder="Delivery day">
                                        </div>
                                        <div class="box-field">
                                            <input type="text" name="delivery_time" class="form-control" hidden placeholder="Delivery time">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-form__item">
                                    <h4>Note</h4>
                                    <div class="box-field box-field__textarea">
                                        <textarea class="form-control" name="note" placeholder="Order note"></textarea>
                                    </div>
                                </div>
                                <div class="checkout-buttons">
                                       <button type="submit" class="btn btn-icon btn-next">Order <i class="icon-arrow"></i></button>

                                </div>
                            </form>
                        </div>
                       <div class="checkout-info">
    <div class="checkout-order">
        <h5>Your Order</h5>

        @foreach($cartItems as $item)
            <div class="checkout-order__item">
                <a href="#" class="checkout-order__item-img">
                    <img data-src="{{asset('storage/'. $item->product->image) }}" 
                         src="{{ asset('storage/'. $item->product->image) }}" 
                         class="js-img" alt="{{ $item->product->{'name_' . app()->getLocale()} ?? 'Product Image' }}">
                </a>
                <div class="checkout-order__item-info">
                    <a class="title6" href="#">
                        {{ $item->product->{'name_' . app()->getLocale()} ?? 'Product Name' }}
                        <span>x{{ $item->quantity }}</span>
                    </a>
                    <span class="checkout-order__item-price">${{ number_format($item->cost, 2) }}</span>
                </div>
            </div>
        @endforeach
    </div>

    @php
        $totalGoods = $cartItems->sum('cost');
        $deliveryFee = 0; // مثلاً رسوم التوصيل ثابتة، أو استقبلها من مكان ديناميكي
        $total = $totalGoods + $deliveryFee;
    @endphp

    <div class="cart-bottom__total">
        <div class="cart-bottom__total-goods">
            Goods on
            <span>${{ number_format($totalGoods, 2) }}</span>
        </div>
        <div class="cart-bottom__total-promo">
            Discount on promo code
            <span>No</span>
        </div>
        <div class="cart-bottom__total-delivery">
            Delivery <span class="cart-bottom__total-delivery-date">(Aug 28,2020 at 11:30)</span>
            <span>${{ number_format($deliveryFee, 2) }}</span>
        </div>
        <div class="cart-bottom__total-num">
            total:
            <span>${{ number_format($total, 2) }}</span>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
            <!-- CHECKOUT EOF   -->
@endsection