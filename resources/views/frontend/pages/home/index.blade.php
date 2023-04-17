
@extends('layouts.app_master_frontend')

@section('css')
	<link href="{{ asset('css/display.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/font.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/slick.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/Common.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/css_rwd_common.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/css_rwd.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/dqw.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/news_css_rwd.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/brands.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/regular.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/solid.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
@stop

@section('content')
	@include('frontend.components.slider')
	<div class="container">
		<div id="cateHome">
		    <div class="wrp">
		        <div class="group">
		            <div class="item">
		                <div class="wImage">
		                    <a href="/sp/dong-ho-nam.html" title="Đồng hồ nam" class="image cover">
		                    <img data-src="images/dh_doi_nam_8.jpg" alt="dong ho nam" class="lazy" src="images/dh_doi_nam_8.jpg">
		                    </a>
		                </div>
		                <span class="name">ĐỒNG HỒ NAM</span>
		            </div>
		            <div class="item">
		                <div class="wImage">
		                    <a href="/sp/dong-ho-nu.html" title="Đồng hồ nữ" class="image cover">
		                    <img data-src="images/dong_ho_nu_pc.jpg" alt="dong ho nu" class="lazy" src="images/dong_ho_nu_pc.jpg">
		                    </a>
		                </div>
		                <span class="name">ĐỒNG HỒ NỮ</span>
		            </div>
		            <div class="item">
		                <div class="wImage">
		                    <a href="/flash-sale.html" title="Khuyen mai" class="image cover">
		                    <img data-src="images/b_sale8.jpg" alt="dong ho tre em" class="lazy" src="images/b_sale8.jpg">
		                    </a>
		                </div>
		                <span class="name">SALE SỐC ONLINE</span>
		            </div>
		            <div class="item">
		                <div class="wImage">
		                    <a href="/kinh-mat-thoi-trang.html" title="Kinh mat thoi trang" class="image cover">
		                    <img data-src="images/b_kmdq.jpg" alt="dong ho doi" class="lazy" src="images/b_kmdq.jpg">
		                    </a>
		                </div>
		                <span class="name">KÍNH THỜI TRANG</span>
		            </div>
		            <div class="item">
		                <div class="wImage">
		                    <a href="/phu-kien-dong-ho.html" title="Dây da đồng hồ" class="image cover">
		                    <img data-src="images/b_dayda1.jpg" alt="day da" class="lazy" src="images/b_dayda1.jpg">
		                    </a>
		                </div>
		                <span class="name">DÂY ĐỒNG HỒ</span>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="cb"></div>

		@include('frontend.pages.home.include._inc_flash_sale')

		<div class="product product2">
			<div class="wrp">
				<div class="left">
					<a href="#" title="Sản phẩm mới" class="titleCate">SẢN PHẨM MỚI</a>
					<div class="contCate">
		                Những mẫu đồng hồ mới nhất trong năm 2022. Những sản phẩ mới sẽ được cập nhật liên tục hàng tuần. Nhớ theo trang web mỗi tuần để biết thông tin về các sản phẩm mới!!!
		            </div>
				</div>
				<div class="right">
					<div class="group slide2 owl-carousel owl-theme owl-loaded">
		                <div class="owl-stage-outer">
		                    <div class="owl-stage" style="transform: translate3d(-1558.33px, 0px, 0px); transition: all 1s ease 0s; width: 3740px;">
								@if(isset($productNew))
									@foreach($productNew as $product)
										<div class="owl-item" style="width: 216px; margin-right: 30px;">
											@include('frontend.components.product_item', ['product' => $product])
										</div>
									@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="product product2">
			<div class="wrp">
				<div class="left">
					<a href="#" title="Sản phẩm nổi bật" class="titleCate">SẢN PHẨM NỔI BẬT</a>
					<div class="contCate">
		                Những mẫu đồng hồ mới nhất trong năm 2022. Những sản phẩ mới sẽ được cập nhật liên tục hàng tuần. Nhớ theo trang web mỗi tuần để biết thông tin về các sản phẩm mới!!!
		            </div>
				</div>
				<div class="right">
					<div class="group slide2 owl-carousel owl-theme owl-loaded">
		                <div class="owl-stage-outer">
		                    <div class="owl-stage" style="transform: translate3d(-1558.33px, 0px, 0px); transition: all 1s ease 0s; width: 3740px;">
								@if(isset($productHot))
									@foreach($productHot as $product)
										<div class="owl-item" style="width: 216px; margin-right: 30px;">
											@include('frontend.components.product_item', ['product' => $product])
										</div>
									@endforeach
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="product product2">
			<div class="top">
				<div class="wrp">
					<h2 class="titleCate">
			            <a href="" title="Diamond D">
			                <span class="icon">
			                	<img data-src="{{ asset('css/icon/icon1.png') }}" alt="Diamond D" class="lazy" src="{{ asset('css/icon/icon1.png') }}">
			                </span>ĐỒNG HỒ DIAMOND D
			            </a>
			        </h2>
				</div>
			</div>
			<div class="bot">
				<div class="wrp">
					<div class="group slide owl-carousel owl-theme owl-loaded">
						<div class="owl-stage-outer">
					        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 1s ease 0s; width: 3936px;">
					        	@foreach($productTrademark1 as $product)									
									<div class="owl-item" style="width: 216px; margin-right: 30px;">
										@include('frontend.components.product_item', ['product' => $product])
									</div>									
								@endforeach
							</div>
						</div>
						<div class="owl-controls">
						</div>	
					</div>
				</div>
			</div>
		</div>
		<div class="product product2">
			<div class="top">
				<div class="wrp">
					<h2 class="titleCate">
			            <a href="" title="Aries Gold">
			                <span class="icon">
			                	<img data-src="{{ asset('css/icon/icon1.png') }}" alt="Diamond D" class="lazy" src="{{ asset('css/icon/icon1.png') }}">
			                </span>ĐỒNG HỒ ARIES GOLD
			            </a>
			        </h2>
				</div>
			</div>
			<div class="bot">
				<div class="wrp">
					<div class="group slide owl-carousel owl-theme owl-loaded">
						<div class="owl-stage-outer">
					        <div class="owl-stage" style="transform: translate3d(-1558.33px, 0px, 0px); transition: all 1s ease 0s; width: 3740px;">
								@foreach($productTrademark3 as $product)									
									<div class="owl-item" style="width: 216px; margin-right: 30px;">
										@include('frontend.components.product_item', ['product' => $product])
									</div>									
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="product product2">
			<div class="top">
				<div class="wrp">
					<h2 class="titleCate">
			            <a href="" title="Jacques Lemans">
			                <span class="icon">
			                	<img data-src="{{ asset('css/icon/icon1.png') }}" alt="Diamond D" class="lazy" src="{{ asset('css/icon/icon1.png') }}">
			                </span>ĐỒNG HỒ JACQUES LEMANS
			            </a>
			        </h2>
				</div>
			</div>
			<div class="bot">
				<div class="wrp">
					<div class="group slide owl-carousel owl-theme owl-loaded">
						<div class="owl-stage-outer">
					        <div class="owl-stage" style="transform: translate3d(-1558.33px, 0px, 0px); transition: all 1s ease 0s; width: 3936px;">
								@foreach($productTrademark4 as $product)	
									<div class="owl-item" style="width: 216px; margin-right: 30px;">
										@include('frontend.components.product_item', ['product' => $product])
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="product product2">
			<div class="top">
				<div class="wrp">
					<h2 class="titleCate">
			            <a href="" title="Epos Swiss">
			                <span class="icon">
			                	<img data-src="{{ asset('css/icon/icon1.png') }}" alt="Diamond D" class="lazy" src="{{ asset('css/icon/icon1.png') }}">
			                </span>ĐỒNG HỒ EPOS SWISS
			            </a>
			        </h2>
				</div>
			</div>
			<div class="bot">
				<div class="wrp">
					<div class="group slide owl-carousel owl-theme owl-loaded">
						<div class="owl-stage-outer">
					        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 1s ease 0s; width: 3936px;">
								@foreach($productTrademark6 as $product)	
									<div class="owl-item" style="width: 216px; margin-right: 30px;">
										@include('frontend.components.product_item', ['product' => $product])
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="product product2">
			<div class="top">
				<div class="wrp">
					<h2 class="titleCate">
			            <a href="" title="Philippe Auguste">
			                <span class="icon">
			                	<img data-src="{{ asset('css/icon/icon1.png') }}" alt="Diamond D" class="lazy" src="{{ asset('css/icon/icon1.png') }}">
			                </span>ĐỒNG HỒ PHILIPPE AUGUST
			            </a>
			        </h2>
				</div>
			</div>
			<div class="bot">
				<div class="wrp">
					<div class="group slide owl-carousel owl-theme owl-loaded">
						<div class="owl-stage-outer">
					        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 1s ease 0s; width: 3936px;">
								@foreach($productTrademark7 as $product)	
									<div class="owl-item" style="width: 216px; margin-right: 30px;">
										@include('frontend.components.product_item', ['product' => $product])
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('script')
	<script src="{{ asset('js/jQuery-3.6.0.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/stv_new.js')}}" type="text/javascript"></script>
	<script src="{{ asset('js/lazyload.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/lightbox.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/slick.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/Common.js')}}" type="text/javascript"></script>
@stop