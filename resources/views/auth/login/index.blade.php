@extends('website.layout.app')
@section('title','Login')
@section('content')

    <!-- BEGIN BODY -->

    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->

        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block_margin" style="background-image: url({{ asset('assets/img/category/3.jpg') }})">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>Log in</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Home</a>
                            </li>
                            <li class="bread-crumbs__item">Log in</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN LOGIN -->
            <div class="login">
                <div class="wrapper">
                    <div class="login-form js-img" data-src="{{ asset('assets/img/login-form__bg.png') }}">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3>Log in with</h3>
                    <ul class="login-form__social">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-insta"></i></a></li>
                        <li><a href="#"><i class="icon-google"></i></a></li>
                    </ul>

                    <div class="box-field">
                        <input type="text" name="email" class="form-control" placeholder="Enter your email or nickname" required>
                    </div>

                    <div class="box-field">
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>

                    <label class="checkbox-box checkbox-box__sm">
                        <input type="checkbox" name="remember">
                        <span class="checkmark"></span>
                        Remember me
                    </label>

                    <button class="btn" type="submit">Log in</button>

                    <div class="login-form__bottom">
                        <span>No account? <a href="{{ route('register.page') }}">Register now</a></span>
                        <a href="">Lost your password?</a>
                    </div>

                    @if(session('status'))
                        <div class="alert alert-success mt-2">{{ session('status') }}</div>
                    @endif

                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror

                    @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </form>

                    </div>
                </div>
                <img class="promo-video__decor js-img" data-src="https://via.placeholder.com/1197x1371/FFFFFF"
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
            </div>
            <!-- LOGIN EOF   -->
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
                                    <input type="email" class="form-control" placeholder="Enter your email">
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