@extends('user.layout')
@section('title')
    Thông tin của bạn
@endsection
@section('profile')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/profile_css.css') }}">
@endsection
@section('content')
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Thông tin tài khoản</p>
						<h1>user</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3 my-lg-0 my-md-1">
            <div id="sidebar" class="bg-purple">
                <div class="h4 text-white">Tài khoản</div>
                <ul>
                    <li >
                         <a href="#" class="text-decoration-none d-flex align-items-start">
                            <div class="fas fa-box pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Tài khoản của tôi</div>
                                <div class="link-desc">Xem và quản lí tài khoản</div>
                            </div>
                        </a>
                     </li>
                    <li> 
                        <a href="#" class="text-decoration-none d-flex align-items-start">
                            <div class="fas fa-box-open pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link">Đơn hàng của tôi</div>
                                <div class="link-desc">Xem và quản lí đơn hàng</div>
                            </div>
                        </a> 
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 my-lg-0 my-1">
            <div id="main-content" class="bg-white border">
                <div class="d-flex flex-column">
                    <div class="h5">Xin chào {{Session::get('customers')->fullName}}</div>
                    <div>Email đã đăng nhập:{{Session::get('customers')->email}}</div>
                </div>
                <div class="d-flex my-4 flex-wrap">
                    <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Tổng đơn hàng</div>
                            <div class="ms-auto number">2</div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Giỏ hàng hiện tại</div>
                            <div class="ms-auto number">0</div>
                        </div>
                    </div>
                    <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/love-png/love-png-heart-symbol-wikipedia-11.png" alt="">
                        <div class="d-flex align-items-center mt-2">
                            <div class="tag">Wishlist</div>
                            <div class="ms-auto number">10</div>
                        </div>
                    </div>
                </div>
                <div class="text-uppercase">Danh sách đơn hàng</div>
                <div class="order my-3 bg-light">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column justify-content-between order-summary">
                                <div class="d-flex align-items-center">
                                    <div class="text-uppercase">Order #fur10001</div>
                                    <div class="blue-label ms-auto text-uppercase">paid</div>
                                </div>
                                <div class="fs-8">Products #03</div>
                                <div class="fs-8">22 August, 2020 | 12:05 PM</div>
                                <div class="rating d-flex align-items-center pt-1"> <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png" alt=""><span class="px-2">Rating:</span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                <div class="status">Status : Delivered</div>
                                <div class="btn btn-primary text-uppercase">order info</div>
                            </div>
                            <div class="progressbar-track">
                                <ul class="progressbar">
                                    <li id="step-1" class="text-muted green"> <span class="fas fa-gift"></span> </li>
                                    <li id="step-2" class="text-muted green"> <span class="fas fa-check"></span> </li>
                                    <li id="step-3" class="text-muted green"> <span class="fas fa-box"></span> </li>
                                    <li id="step-4" class="text-muted green"> <span class="fas fa-truck"></span> </li>
                                    <li id="step-5" class="text-muted green"> <span class="fas fa-box-open"></span> </li>
                                </ul>
                                <div id="tracker"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order my-3 bg-light">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column justify-content-between order-summary">
                                <div class="d-flex align-items-center">
                                    <div class="text-uppercase">Order #fur10001</div>
                                    <div class="green-label ms-auto text-uppercase">cod</div>
                                </div>
                                <div class="fs-8">Products #03</div>
                                <div class="fs-8">22 August, 2020 | 12:05 PM</div>
                                <div class="rating d-flex align-items-center pt-1"> <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png" alt=""><span class="px-2">Rating:</span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                <div class="status">Status : Delivered</div>
                                <div class="btn btn-primary text-uppercase">order info</div>
                            </div>
                            <div class="progressbar-track">
                                <ul class="progressbar">
                                    <li id="step-1" class="text-muted green"> <span class="fas fa-gift"></span> </li>
                                    <li id="step-2" class="text-muted"> <span class="fas fa-check"></span> </li>
                                    <li id="step-3" class="text-muted"> <span class="fas fa-box"></span> </li>
                                    <li id="step-4" class="text-muted"> <span class="fas fa-truck"></span> </li>
                                    <li id="step-5" class="text-muted"> <span class="fas fa-box-open"></span> </li>
                                </ul>
                                <div id="tracker"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection