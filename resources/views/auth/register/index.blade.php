@extends('website.layout.app')
@section('title','Registertion')
@section('content')


    <!-- BEGIN BODY -->

    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->

        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block_margin" style="background-image: url({{ asset('assets/img/category/1.jpg') }})">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>Registration</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Home</a>
                            </li>
                            <li class="bread-crumbs__item">Check in</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN REGISTRATION -->
            <div class="login registration">
                <div class="wrapper">
                    <div class="login-form js-img" data-src="{{ asset('assets/img/registration-form__bg.png') }}">
                        <form action="" method="POST">
                            @csrf

                            <h3>register now</h3>
                            <ul class="login-form__social">
                                <li><a href="#"><i class="icon-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-insta"></i></a></li>
                                <li><a href="#"><i class="icon-google"></i></a></li>
                            </ul>
                            <div class="box-field__row">
                                <div class="box-field">
                                    <input name="name" type="text" class="form-control" placeholder="Enter your name" value="{{ old('name') }}">
                                    @error('name') <div>{{ $message }}</div> @enderror
                                </div>
                                <div class="box-field">
                                    <input type="text" name="last_name" class="form-control" placeholder="Enter your  name" value="{{ old('last_name') }}">
                                    @error('last_name') <div>{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="box-field__row">
                                <div class="box-field">
                                    <input type="tel" name="phone" class="form-control" placeholder="Enter your phone" value="{{ old('phone') }}">
                                    @error('phone') <div>{{ $message }}</div> @enderror
                                </div>
                                <div class="box-field">
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
                                    @error('email') <div>{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="box-field__row">
                                <span>password</span>
                                <div class="box-field">
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                                    @error('password') <div>{{ $message }}</div> @enderror
                                </div>
                                <div class="box-field">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                                </div>
                            </div>
                            <label class="checkbox-box checkbox-box__sm">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                Remember me
                            </label>
                            <button class="btn" type="submit">registration</button>
                            <div class="login-form__bottom">
                                <span>Already have an account? <a href="#">Log in</a></span>
                            </div>
                        </form>
                    </div>
                </div>
                <img class="promo-video__decor js-img" data-src="https://via.placeholder.com/1197x1371/FFFFFF"
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
            </div>
            <!-- REGISTRATION EOF   -->
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