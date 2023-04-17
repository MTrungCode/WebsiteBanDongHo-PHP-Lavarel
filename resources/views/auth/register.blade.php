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
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <div class="container">
        <div id="pageway">
            <div class="pull-left">
                <ul >
                    <li><a href="" title="Đồng hồ Philippe Auguste" style="color: #288ad6"> Trang chủ</a></li>
                    <li><a href="" title="Đồng hồ nam" style="color: #288ad6">Account</a></li>
                    <li><a href="" title="" rel="nofollow">Đăng ký</a></li>
                </ul>
            </div>
        </div>
        <div id="container">
            <div class="wrp">
                <div id="product" class="cart">
                    <div class="flex">
                        <div class="infoDatHang flex_1">
                            <div class="group">
                                <div class="form">
                                    <form class="from_cart_register" action="" method="post">
                                        @csrf
                                        <div class="item1">
                                            <p class="label">Name <span class="cRed">(*)</span></p>
                                            <input type="text" name="name" value="{{ old('name') }}" id="name" placeholder="minhTrung" class="form-control">
                                            @if ($errors->first('name'))
                                                <br><span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="item1">
                                            <p class="label">Email <span class="cRed">(*)</span></p>
                                            <input type="text" name="email" value="{{ old('email') }}" placeholder="minhTrung@gmail.com" class="form-control">
                                            @if ($errors->first('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="item1">
                                            <p class="label">Password <span class="cRed">(*)</span></p>
                                            <input type="password" name="password" id="phone" placeholder="***********" class="form-control">
                                            @if ($errors->first('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="item1">
                                            <p class="label">Điện thoại <span class="cRed">(*)</span></p>
                                            <input type="number" name="phone" value="{{ old('phone') }}" id="phone" placeholder="0987112453" class="form-control">
                                            @if ($errors->first('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                        <div class="item1">
                                            <p class="label">Address <span class="cRed">(*)</span></p>
                                            <textarea name="address" value="{{ old('address') }}" id="name" class="form-control"></textarea>
                                        </div>
                                        
                                        <div class="cb h10"></div>
                                        <div class="btnThanhToan1">
                                            <button class="tac" type="submit">
                                                <p class="ttu fHelveticaNeueB fs15">Đăng ký</p>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/jQuery-3.6.0.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/stv_new.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/lazyload.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/lightbox.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/slick.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/Common.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" type="text/javascript"></script>
@stop