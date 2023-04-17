@extends('layouts.app_master_frontend')
@section('css')
	<link href="{{ asset('css/display.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/font.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
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
    <style type="text/css">
    	.pagination {
    		margin: 10px auto;
    		display: flex;    		
    		margin-top: 30px;
    	}
    	.pagination li {
    		padding: 5px;
    		margin: 0 2px;
    		border: 1px solid #dedede;
    		display: block;
    	}
    	.pagination li a, .pagination li span {
    		line-height: 25px;
    		display: block;
    		text-align: center;
    		width: 25px;
    		height: 25px;
    	}
    	.filter .active a {
    		color: red;
    	}
    </style>
@stop
@section('content')
	<div class="container">
		<div class="product2 list">
			<div class="wrp">
				<div class="left" style="display: grid;">
					@include('frontend.pages.product.include._inc_sidebar')
				</div>
				<div class="right">
					<div id="filter">
						<div class="filter">
							<ul>
								@for($i = 1; $i <= 6; $i++)
									<li class="{{ Request::get('price') == $i ? "active" : "" }}">
										<a href="{{ request()->fullUrlWithQuery(['price' => $i]) }}">
											{{ $i == 6 ? "Lớn hơn 10 triệu" : "Giá " . $i * 2 ." triệu" }}
										</a>
									</li>
								@endfor								
							</ul>
						</div>
						<div class="order">
							<span class="total-prod">Tổng số: {{ $products->total() }} sản phẩm Tính năng</span>
							<div class="sort">
								<div class="item">
									<span class="title">Sắp xếp <i class="fa fa-caret-down"></i></span>
								</div>
							</div>
						</div>
					</div>
					<div class="product">
						<div class="group ">
							@foreach($products as $product)
								@include('frontend.components.product_item', ['product' => $product])
							@endforeach
						</div>
					</div>
					<div>
						{!! $products->appends($query ?? [])->links() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
@section('script')
	<script src="{{ asset('js/jQuery-3.6.0.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/stv_new.js')}}" type="text/javascript"></script>
	<script src="{{ asset('js/lazyload.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/lightbox.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/slick.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/Common.js')}}" type="text/javascript"></script>
@stop