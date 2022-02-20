@extends('user.layout')
@section('title')
    Trang chủ
@endsection
@section('content')
    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh & Organic</p>
                                <h1>Delicious Seasonal Fruits</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Fruit Collection</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh Everyday</p>
                                <h1>100% Organic Collection</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Visit Shop</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h1>Get December Discount</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Visit Shop</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Miễn phí giao hàng</h3>
                            <p>Khi đơn hàng đạt $75</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>24/7 Hỗ trợ</h3>
                            <p>Hỗ trợ cả ngày</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Hoàn trả</h3>
                            <p>Hoàn trả trong 3 ngày!</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Sản phẩm</span>chúng tôi</h3>

                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('user.home.details', $item->id) }}">
                                    <img src="{{ $item->image }}" alt="">
                                </a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <h3>{{ number_format($item->price) }}</h3>
                            @if (Session::get('customers') != null)
                                <a href="{{ route('user.addToCart', $item->id) }}" class="cart-btn">
                                    <i class="fas fa-shopping-cart"></i> Thêm giỏ hàng
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
                {{ $products->links() }}

            </div>
        </div>
    </div>
    <!-- end product section -->

    <!-- cart banner section -->
    <section class="cart-banner pt-100 pb-100">
        <div class="container">
            <div class="row clearfix">
                <!--Image Column-->
                <div class="image-column col-lg-6">
                    <div class="image">
                        <div class="price-box">
                            <div class="inner-price">
                                <span class="price">
                                    <strong>30%</strong> <br> off per kg
                                </span>
                            </div>
                        </div>
                        <img src="{{ asset('frontend/assets/img/a.jpg') }}" alt="">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
                    <h3><span class="orange-text">Deal</span> of the month</h3>
                    <h4>Hikan Strwaberry</h4>
                    <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam
                        similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit
                        voluptatem accusant</div>
                    <!--Countdown Timer-->
                    <div class="time-counter">
                        <div class="time-countdown clearfix" data-countdown="2020/2/01">
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Days</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Hours</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Mins</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Secs</div>
                            </div>
                        </div>
                    </div>
                    <a href="" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end cart banner section -->


    <!-- shop banner -->
    <section class="shop-banner">
        <div class="container">
            <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section>
    <!-- end shop banner -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="{{ asset('frontend/assets/img/company-logos/1.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('frontend/assets/img/company-logos/2.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('frontend/assets/img/company-logos/3.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('frontend/assets/img/company-logos/4.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('frontend/assets/img/company-logos/5.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
@endsection
