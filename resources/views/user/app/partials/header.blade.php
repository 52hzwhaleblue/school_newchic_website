	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="{{asset('frontend/assets/img/logo.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="{{route('user.home')}}">Trang chủ</a>
								</li>
								<li><a href="{{route('user.home.shop')}}">Sản phẩm</a></li>
								<li><a href="">Thông tin</a></li>
								<li><a href="about.html">Liên hệ</a></li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{route('user.profile')}}">
											<i class="fa fa-user"></i>
										</a>
										<a class="shopping-cart" href="{{route('user.cart')}}"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										@if(Session::get('customers') != null)			
											<a class="shopping-cart" href="{{route('user.logout')}}">Đăng xuất</a>
										@endif
										@if(Session::get('customers') == null)
											<a class="shopping-cart" href="cart.html">Đăng ký</a>
											<a class="shopping-cart" href="{{route('user.login')}}">Đăng nhập</a>
										@endif
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
