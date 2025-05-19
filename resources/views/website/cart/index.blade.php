@extends('website.layout.app')
@section('title','Cart')
@section('content')

            <!-- BEGIN CART -->
            <div class="cart">
                <div class="wrapper">
                    <div class="cart-table">
                        <div class="cart-table__box">
    <div class="cart-table__row cart-table__row-head">
        <div class="cart-table__col">Product</div>
        <div class="cart-table__col">Price</div>
        <div class="cart-table__col">Quantity</div>
        <div class="cart-table__col">Total</div>
        <div class="cart-table__col">Actions</div>
    </div>

    @forelse ($cartItems as $item)
        <div class="cart-table__row">
            <div class="cart-table__col">
                <a href="" class="cart-table__img">
                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name_en }}">
                </a>
                <div class="cart-table__info">
                    <a href="" class="title5">
                        {{ $item->product->name_en }}
                    </a>
                </div>
            </div>
            <div class="cart-table__col">
                <span class="cart-table__price">${{ number_format($item->cost, 2) }}</span>
            </div>
            <div class="cart-table__col">
                <form action="{{ route('cart.update', ['lang' => app()->getLocale(), 'id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="cart-table__quantity">
                        <div class="counter-box">
                            <input type="number" name="quantity" class="counter-input" value="{{ $item->quantity }}" min="1">
                            <button type="submit" class="btn btn-sm btn-primary mt-1">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="cart-table__col">
                <span class="cart-table__total">${{ number_format($item->cost * $item->quantity, 2) }}</span>
            </div>
            <div class="cart-table__col">
                <form action="{{ route('cart.destroy', ['lang' => app()->getLocale(), 'id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Remove</button>
                </form>
            </div>
        </div>
    @empty
        <div class="cart-table__row">
            <div class="cart-table__col" colspan="5">
                <p>No products in your cart.</p>
            </div>
        </div>
    @endforelse
</div>
                    </div>
                    <div class="cart-bottom">
                        <div class="cart-bottom__promo">
                            <form class="cart-bottom__promo-form">
                                <div class="box-field__row">
                                    <div class="box-field">
                                        <input type="text" class="form-control" placeholder="Enter promo code">
                                    </div>
                                    <button type="submit" class="btn btn-grey">apply code</button>
                                </div>
                            </form>
                            <h6>How to get a promo code?</h6>
                            <p>
                                Follow our news on the website, as well as subscribe to our social networks. So you will not only be able to receive up-to-date codes,
                                but also learn about new products and promotional items.
                            </p>
                            <div class="contacts-info__social">
                                <span>Find us here:</span>
                                <ul>
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-insta"></i></a></li>
                                    <li><a href="#"><i class="icon-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="cart-bottom__total">
                            @php
                                    $total = $cartItems->sum(function($item) {
                                        return $item->cost * $item->quantity;
                                    });
                                @endphp

                                <div class="cart-bottom__total-goods">
                                    Goods on <span>${{ number_format($total, 2) }}</span>
                                </div>

                                <div class="cart-bottom__total-promo">
                                    Discount on promo code <span>No</span>
                                </div>

                                <div class="cart-bottom__total-num">
                                    Total: <span>${{ number_format($total, 2) }}</span>
                                </div>
                            <a href="checkout1.html" class="btn">Order products</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CART EOF   -->
@endsection