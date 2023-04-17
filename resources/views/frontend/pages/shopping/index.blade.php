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
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
	<div id="pageway" style="border-bottom: 5px solid #e5e5e5;">
    <div class="wrp">
        <ul>
            <li><a href="/" title="Home"><b>TRANG CHỦ</b></a></li>
            <li><a href="javascript://" title="Gio hang" style="color: #288ad6"><b>GIỎ HÀNG</b></a></li>
        </ul>
    </div>
</div>
<div class="cb"></div>
<div id="container">
    <div class="wrp">
        <div id="product" class="cart">
            <div class="flex">
                <div class="left">
                    <div class="cart_header" style="text-align: center;color: #288ad6;">THÔNG TIN GIỎ HÀNG</div>
                    <form name="frm_cart" action="" method="post">
                        <div class="tableCart">
                            <div class="row row1">
                                <div class="col col1"></div>
                                <div class="flex flex_1">
                                    <div class="col col2 dnmobile">Sản phẩm</div>
                                    <div class="flex flex_1 dnmobile">
                                        <div class="col col3">Giá</div>
                                        <div class="col col4">Số lượng</div>
                                        <div class="col col5">Thành tiền</div>
                                        <div class="col col6"></div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($shopping as $key => $item)
                            	<div class="row row2">
	                                <div class="col col1">
	                                    <div class="wImage">
	                                        <a href="{{ route('get.product.detail', \Str::slug($item->name) .'-'.$item->id) }}" title="{{ $item->name }}" class="image">
	                                        	<img class="lazy" alt="" src="{{ pare_url_file($item->options->image) }}" style="max-height: 80%; max-width: 80%;">
	                                        </a>
	                                    </div>
	                                </div>
	                                <div class="flex flex_1">
	                                    <div class="col col2">
	                                        <a href="{{ route('get.product.detail', \Str::slug($item->name) .'-'.$item->id) }}" title="{{ $item->name }}" class="fHelveticaNeueB">{{ $item->name }}</a>
	                                    </div>
	                                    <div class="col col3">
	                                        <span class="fs14">
	                                            @if ($item->options->price_old)
	                                            	<p><b>{{ number_format(number_price($item->options->price_old), 0, ',', '.')}} đ</b></p>
	                                            @else
	                                            	<p><b>{{ number_format($item->price, 0, ',', '.')}} đ</b></p>
	                                            @endif
	                                            @if ($item->options->sale)
	                                            	<p class="cart_sale" style="width: 60px;">- {{ $item->options->sale }} %</p>
	                                            @endif
	                                        </span>
	                                    </div>
	                                    <div class="col col4">
	                                        <span class="dn dibmobile pr4">Số lượng: </span>
	                                        <input type="number" min="1" class="input_quantity" name="quantity_14692" value="{{ $item->qty }}" style="height: 25px;"><br>
                                            <a href="{{ route('ajax_get.shopping.update', $key) }}" data-id-product="{{ $item->id }}" data-id="{{ $key }}" class="js-update-item-cart" title="Cập nhật"><i class="fa fa-save"></i></a>	                                       
	                                    </div>
	                                    <div class="col col5">
	                                        <span class="dn dibmobile pr4">Thành tiền: </span>
	                                        <span class="fs14 fwb">
	                                        {{ number_format($item->price * $item->qty, 0, ',', '.') }} đ
	                                        </span>
	                                    </div>
	                                    <div class="col col6">
	                                        <a class="btnDelete" href="{{ route('get.shopping.delete', $key) }}">
	                                        	<img data-src="{{ asset('css/icon/delete.jpg') }}" class="lazy" alt="" src="{{ asset('css/icon/delete.jpg') }}">
	                                        </a>
	                                    </div>
	                                </div>
	                            </div>
                            @endforeach
                            <div class="row row2">
                                <div class="totalPrice">Thanh toán: <span id="payOrder" style="font-size: 21px;font-weight: bold;">{{ \Cart::subtotal() }} </span> VNĐ </div>
                            </div>
                            <div class="row row3">
                                <div class="lienhe">
                                    <p>Thông tin liên hệ Hotline: <a href="tel:18006005" title="1800.6005">1800.6005</a> hoặc <a href="tel:0867515555" title="">086.751.5555</a>  - <a href="tel:0985681189" title="">098.568.1189</a> để được hỗ trợ. </p>
                                    <p>Xin trân trọng cảm ơn !</p>
                                </div>
                            </div>
                        </div>
                        <div class="cb"></div>
                        <div class="btnCartGroup tac" style="margin-top: 30px;">
                            <a href="/" class="btnCartBuyNext" title=""><i class="fas fa-arrow-left"></i> Mua thêm sản phẩm khác</a>
                        </div>
                    </form>
                </div>
                <div class="infoDatHang flex_1">
                    <div class="group">
                        <div class="c000 fSFUHelveticaCondensedBold ttu fs20 pb20" style="text-align: center;color: #288ad6;">THÔNG TIN LIÊN HỆ</div>
                        <p class="fsti pb10 tac">Lưu ý: Các ô có dấu <span class="cRed">(*)</span> cần điền đầy đủ thông tin</p>
                        <div class="form">
                            <form class="from_cart_register" action="{{ route('post.shopping.pay') }}" method="post">
                                @csrf
                                <div class="item">
                                    <p class="label">Họ và tên <span class="cRed">(*)</span></p>
                                    <input type="text" name="tst_name" id="name" placeholder="Nhập họ tên" value="{{ get_data_user('web', 'name') }}" required="">
                                </div>
                                <div class="item">
                                    <p class="label">Điện thoại <span class="cRed">(*)</span></p>
                                    <input type="text" name="tst_phone" id="phone" placeholder="Nhập điện thoại" value="{{ get_data_user('web', 'phone') }}" required="">
                                </div>
                                <div class="item">
                                    <p class="label">Địa chỉ <span class="cRed">(*)</span></p>
                                    <input type="text" value="{{ get_data_user('web', 'address') }}" name="tst_address" id="address" placeholder="Nhập địa chỉ" required="">
                                </div>
                                <div class="item">
                                    <p class="label">Email <span class="cRed">(*)</span></p>
                                    <input type="text" name="tst_email" value="{{ get_data_user('web', 'email') }}" required="">
                                </div>
                                <div class="item">
                                    <p class="label">Ghi chú</p>
                                    <textarea style="min-height: 100px;" name="tst_note" cols="" rows="2"></textarea>
                                </div>
                                <div id="payLast" class="hide">
                                    <div>Thẻ <span id="cardName">member</span> được giảm thêm: <span id="discount">5%</span> </div>
                                    <div> Số tiền cần thanh toán: <span id="payMoney">474.050.000</span> VNĐ</div>
                                </div>
                                <div class="cb h10"></div>
                                <div class="btnThanhToan">
                                    <button class="tac" value="1" type="submit">
                                        <p class="ttu fHelveticaNeueB fs15">ĐẶT HÀNG THANH TOÁN SAU</p>
                                        <p>(Trả tiền khi nhận hàng tại nhà)</p>
                                    </button>
                                    <button class="tac" name="payment" value="2" type="submit">
                                        <p class="ttu fHelveticaNeueB fs15">Thanh toán online</p>
                                        <p>(Bằng thẻ ATM, Visa, Master)</p>
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
@stop
@section('script')
	<script src="{{ asset('js/jQuery-3.6.0.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/stv_new.js')}}" type="text/javascript"></script>
	<script src="{{ asset('js/lazyload.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/lightbox.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/slick.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/Common.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        $(function(){

            $(".js-update-item-cart").click(function (event){
                event.preventDefault();
                let $this = $(this);
                let url   = $this.attr('href');
                let qty   = $this.prevAll('.input_quantity').val();
                let idProduct = $this.attr('data-id-product')

                if(url) {
                    $.ajax({
                        url: url,
                        data: {
                            qty: qty,
                            idProduct : idProduct
                        }
                    }).done(function( results ) {
                        alert(results.messages);
                        window.location.reload();
                    });
                }
            })            
        })
    </script>
@stop