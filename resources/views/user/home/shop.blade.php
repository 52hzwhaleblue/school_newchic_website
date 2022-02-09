@extends('user.layout')
@section('title') Sản phẩm @endsection
@section('content')
    	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row product-lists">
				@foreach($products as $item)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href=""><img src="{{asset('frontend/assets/img/products/'.$item->image)}}" alt=""></a>
						</div>
						<h3>{{$item->name}}</h3>
						<p class="product-price"><span>{{$item->unit}}</span> {{number_format($item->price)}} </p>
						@if(Session::get('customers') != null)
							<a href="{{route('user.addToCart',$item->id)}}" class="cart-btn">
								<i class="fas fa-shopping-cart"></i> Thêm giỏ hàng
							</a>
						@endif
					</div>
				</div>
				@endforeach
			</div>
			{{$products->links()}}
		</div>
	</div>
	<!-- end products -->

<!-- logo carousel -->
<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="{{asset('frontend/assets/img/company-logos/1.png')}}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{asset('frontend/assets/img/company-logos/2.png')}}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{asset('frontend/assets/img/company-logos/3.png')}}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{asset('frontend/assets/img/company-logos/4.png')}}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{asset('frontend/assets/img/company-logos/5.png')}}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->
@endsection