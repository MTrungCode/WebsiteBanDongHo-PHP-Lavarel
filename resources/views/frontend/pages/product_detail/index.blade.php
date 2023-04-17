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
@stop
@section('content')
	<div id="pageway">
	    <div class="wrp">	        
	    </div>
	</div>
	<div class="cb"></div>
	<div id="container">
	    <div id="menuCate" class="dnTablet-l" style="height: 10px;padding: 0;"></div>
	    <div id="product">
	        <div class="wrp">
	            <div class="nameCate lsh">
	                <a href="" title="Đồng hồ Philippe Auguste" class="name">ĐỒNG HỒ {{ $product->getTrademark($product->pro_trademark) }}</a>
	            </div>
	            <div class="detailPro">
	                <div class="top">
	                    <div class="left" style="justify-content: space-around;">
	                        <div class="imgLarge">
                                <div class="img" style="width: 100%; display: inline-block;">
                                    <div class="wImage">
                                        <a href="{{ route('get.product.detail', $product->pro_slug .'-'.$product->id) }}" title="{{ $product->pro_name }}" class="image cover" {{-- style="margin-left: 100px;" --}}>
                                        	<img alt="" class="lazy" src="{{ (pare_url_file($product->pro_avatar)) }}" style="opacity: 1;width: auto;">
                                        </a>
                                    </div>
                                </div>
	                        </div>
	                    </div>
	                    <div class="right">
	                        <h1><a href="{{ route('get.product.detail', $product->pro_slug .'-'.$product->id) }}" title="" class="namePro">{{ $product->pro_name }}</a></h1>
	                        <div class="price">
	                            @if($product->pro_sale)
	                            	<div class="price1">
										<span class="text">Giá niêm yết </span> 
										<span class="numb old">{{ number_format($product->pro_price,0,',','.') }} đ</span>
	                            		<span class="numb new dn dbtablet-l">{{ number_format(((100-$product->pro_sale)*$product->pro_price)/100,0,',','.') }} đ</span>
	                            	</div>
                            		<div class="sale">
	                                    <span class="numb">-{{ $product->pro_sale }}%</span>
	                                </div>
	                                <div class="price1 dnTablet-l">
	                                    <span class="text">Giá khuyến mại</span>
	                                    <span class="numb cc4161c">{{ number_format(((100-$product->pro_sale)*$product->pro_price)/100,0,',','.') }} đ</span>
	                                </div>
								@else
									<div class="price1">
										<span class="text">Giá niêm yết </span>                                
	                                	<span class="numb cc4161c">{{ number_format($product->pro_price,0,',','.') }} đ</span>
									</div>
									<div style="color: #3498db;">
		                                <span><i>Miễn phí vận chuyển!</i></span>
		                            </div>
								@endif
	                        </div>
	                        <div class="cb"><br></div>
	                        <div class="khuyenmai">
	                            <div class="title">Điều kiện</div>
	                            <div class="group">
	                                <div class="item">
	                                    <div class="wImage">
	                                        <a href="#" title="" class="image cover">
	                                        <img data-src="{{ asset('images/pic/but-ky-km.jpg') }}" alt="" class="lazy" src="{{ asset('images/pic/but-ky-km.jpg') }}">
	                                        </a>
	                                    </div>
	                                    <a href="" title="But ku" class="info">
	                                        <p>- Thẻ Member giảm thêm 5%</p>
	                                        <p>- Thẻ VIP giảm thêm 10%</p>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="hotline">
	                            <span>Gọi đặt mua: </span>
	                            <a href="tel:18006005" title="18006005"><span class="icon"><i class="fas fa-phone"></i></span> 1800.6005</a>
	                            <span>(8:30 - 21:30)</span>
	                        </div>
	                        <div class="btnCart">
	                            <a href="{{ route('get.shopping.add', $product->id) }}" title="Add to cart" class="muangay">
	                            	<span>Mua ngay</span>
	                            	<span>Giao hàng miễn phí - Thanh toán tại nhà</span>
	                            </a>
	                            <a href="javascript://" title="" class="muatragop">
		                            <span>Trả góp 0% dễ dàng qua thẻ</span>
		                            <span>Visa, Master, JCB</span>
	                            </a>
	                            <a href="/" title="" class="muangay">
	                            	<span><i class="fa fa-arrow-left"></i> Tiếp tục mua hàng</span>
	                            	<span>Trở lại trang chủ</span>
	                            </a>
	                        </div>
	                    </div>
	                </div>
	                <div class="bot">
	                    <div class="detail">
	                        {{-- <div class="otherPro slideRes">
	                            <h3 class="title">Có thể bạn sẽ thích</h3>
	                            <div class="group" key="productsSuggest">
	                            	@foreach($productsSuggests as $key => $product)	                            	
	                            		@include('frontend.components.product_item', ['product' => $product])
	                            	@endforeach                     
	                            </div>
	                        </div> --}}
	                        <div class="mainDes">
	                            <div class="tabs">
	                                <ul class="tab-links">
	                                    <li class="active"><a href="#ctsp" title="">Chi tiết</a></li>
	                                    <li><a href="#hdsd" title="">Chế độ bảo hành</a></li>
	                                </ul>
	                                <div class="tabContent">
	                                    <div id="ctsp" class="tab active">
	                                        <div class="content">
	                                            <p><strong>{!! $product->pro_content !!}</strong></p>
	                                        </div>
	                                        <div class="content">
	                                        	<p><strong>Super Watch tự hào là nhà phân phối bán lẻ đồng hồ lớn nhất Việt Nam.</strong></p>
	                                        </div>
	                                    </div>
	                                    <div id="hdsd" class="tab">
	                                        <div class="content">
	                                            <h2><strong>1. Địa chỉ Trung tâm bảo hành của <a href="https://www.dangquangwatch.vn">SUPERWATCH</a>:</strong></h2>
	                                            <ol style="list-style-type:lower-roman">
	                                                <li><span style="font-size:14px">Hà Nội: Số 55 Trần Đăng Ninh, Quận Cầu Giấy, Hà Nội | Tel:&nbsp;</span>024.3793.9481</li>
	                                                <li><span style="font-size:14px">Đà Nẵng:&nbsp;</span><span style="font-size:14px">Số 155 Trưng Nữ Vương , P Bình Thuận, Q.Hải Châu, Đà Nẵng |&nbsp;0236.3737.379</span></li>
	                                                <li><span style="font-size:14px">Hồ Chí Minh: </span>Số 863 Trần Hưng Đạo - Phường1- Quận 5 - TP. HCM&nbsp;<span style="font-size:14px">| Tel:&nbsp;</span>0286.29.89.666</li>
	                                            </ol>
	                                            <h2><strong>2.&nbsp;Thời gian nhận và trả bảo hành:</strong></h2>
	                                            <p>v&nbsp; Tại trung tâm bảo hành: Từ 8h30 đến 17h00 các ngày trong tuần (trừ chủ nhật và các ngày lễ, Tết).</p>
	                                            <p>v&nbsp; Tại các hệ thống 100 cửa hàng SUPERWATCH trên toàn quốc tất cả các ngày trong tuần kể cả ngày lễ và chủ nhật, từ 8h30 đến 21h</p>
	                                            <h2><strong>3. Chính sách bảo hành:</strong></h2>
	                                            <ol style="list-style-type:lower-roman">
	                                                <li><span style="font-size:14px">Đồng hồ được bảo hành từ 1-10 năm kể từ ngày mua theo quy định của hãng sản xuất (tùy từng hãng sẽ có thời gian bảo hành khác nhau).</span></li>
	                                            </ol>
	                                            <h2><strong>4. Phạm</strong>&nbsp;<strong>vi tiếp nhận đồng hồ bảo hành và sửa chữa:</strong></h2>
	                                            <ol style="list-style-type:lower-roman">
	                                                <li><span style="font-size:14px">SUPERWATCH tiếp nhận bảo hành và sửa chữa đối với tất cả các sản phẩm được mua tại hệ thống </span>Đăng Quang&nbsp;<span style="font-size:14px">Watch.</span></li>
	                                                <li><span style="font-size:14px">Những sản phẩm mang thương hiệu mà </span>Đăng Quang&nbsp;<span style="font-size:14px">Watch là nhà phân phối độc quyền tại Việt Nam cũng sẽ tiếp nhận bảo hành và sửa chữa.</span></li>
	                                                <li><span style="font-size:14px">Ngoài những trường hợp nêu trên, </span>Đăng Quang&nbsp;<span style="font-size:14px">Watch sẽ tiếp nhận đồng hồ để bảo hành hoặc sửa chữa cho quý khách hàng.</span></li>
	                                            </ol>
	                                            <h2><strong>5. Điều kiện để đồng hồ được bảo hành miễn phí và cách tính phí đối với đồng hồ sửa chữa:</strong></h2>
	                                            <ol style="list-style-type:lower-roman">
	                                                <li><span style="font-size:14px">Nếu đồng hồ mua tại </span>Đăng Quang&nbsp;<span style="font-size:14px">Watch và còn trong thời gian bảo hành, khách hàng phải xuất trình được những giấy tờ liên quan đến sản phẩm như sổ bảo hành hoặc hóa đơn mua hàng…, khách hàng sẽ được bảo hành miễn phí theo như quy định của hãng sản xuất.</span></li>
	                                                <li><span style="font-size:14px">Nếu đồng hồ hết thời gian bảo hành hoặc Khách hàng không mang theo giấy tờ cần thiết liên quan đến sản phẩm thì Khách hàng sẽ mất phí sửa chữa.</span></li>
	                                            </ol>
	                                            <h2><strong>6. Phạm vi bảo hành đồng hồ:</strong></h2>
	                                            <ol style="list-style-type:lower-roman">
	                                                <li>Đăng Quang&nbsp;<span style="font-size:14px">Watch chỉ bảo hành các lỗi kỹ thuật về máy (như đồng hồ không chạy, chạy không chính xác), độ chịu nước và pin đồng hồ.</span></li>
	                                                <li><span style="font-size:14px">Nếu đồng hồ gặp các vấn đề về lỗi kỹ thuật như đồng hồ không chạy hoặc chạy không chính xác, hơi nước trên mặt đồng hồ, dây hoặc vỏ đồng hồ bị bong tróc hoặc phai lớp mạ, các lỗi kỹ thuật khác bắt nguồn từ sản phẩm thì </span>Đăng Quang&nbsp;<span style="font-size:14px">Watch sẽ trực tiếp kiểm tra và đổi mới sản phẩm cho Khách hàng nếu nghiêm trọng.</span></li>
	                                            </ol>
	                                            <h2><strong>7. Các trường hợp không nằm trong phạm vi bảo hành:</strong></h2>
	                                            <ol style="list-style-type:lower-roman">
	                                                <li><span style="font-size:14px">Các lỗi về vỏ và dây của đồng hồ như bong tróc hoặc phai lớp mại, ố mặt số…</span></li>
	                                                <li><span style="font-size:14px">Các lỗi rơi vỡ, va đập làm xước kính trong quá trình Khách hàng sử dụng gây ra.</span></li>
	                                                <li><span style="font-size:14px">Dây da bị gẫy, nứt hoặc bong.</span></li>
	                                                <li><span style="font-size:14px">Không bảo hành cho trường hợp điều chỉnh, sử dụng không đúng cách của người dùng.</span></li>
	                                                <li><span style="font-size:14px">Không bảo hành cho đồng hồ đã sửa chữa tại những nơi không phải là trung tâm bảo hành của </span>Đăng Quang&nbsp;<span style="font-size:14px">Watch.</span></li>
	                                            </ol>
	                                            <p><span style="font-size:small">Trong thời gian sử dụng nếu gặp bất kỳ trục trặc nào Khách hàng có thể liên hệ trực tiếp với Trung tâm bảo hành của Hãng hoặc phòng CSKH của Công ty Cổ phần Trực tuyến Đăng Quang để được trợ giúp theo số điện thoại: 04.3622.8508 – 0986.68.1189</span></p>
	                                            <p><span style="font-size:small"><span style="font-family:arial"><span style="font-family:arial">Chúng tôi cam kết bảo hành một cách trung thực nhất đảm bảo quyền lợi cho Quý khách, xin Quý khách vui lòng đọc kỹ các quy định bảo hành ghi ở mặt sau phiếu trước khi thực hiện bảo hành sản phẩm.</span></span></span></p>
	                                            <p><span style="font-size:small"><span style="font-family:arial">Lưu ý:</span></span></p>
	                                            <p style="margin-left:0.25in">
	                                                <span style="font-size:small">
	                                                    <span style="font-family:arial">
	                                                        <!--[if !supportLists]-->-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Khách hàng chịu trách nhiệm cho chi phí vận chuyển đến Trung tâm bảo hành.
	                                                    </span>
	                                                </span>
	                                            </p>
	                                            <p style="margin-left:0.25in">
	                                                <span style="font-size:small">
	                                                    <span style="font-family:arial">
	                                                        <!--[if !supportLists]-->-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Hết thời hạn bảo hành, chi phí sửa chữa sẽ được trung tâm bảo hành hỗ trợ với giá ưu đãi nhất.
	                                                    </span>
	                                                </span>
	                                            </p>
	                                            <p>&nbsp;</p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="detailRight">
	                        <div class="dntablet">
	                            <div class="thongsokythuat">
	                                <div class="titleR">Thông số kỹ thuật</div>
	                                <div class="group">
	                                    <div class="item">
	                                        <p class="text1">Danh mục</p>
	                                        <p class="text2">
	                                        	@if (isset($product->category->c_name))
	                                        		<a href="" title="">{{ $product->category->c_name }}</a>
	                                        	@else
	                                        		"[N\A]"
	                                        	@endif
	                                        </p>
	                                    </div>
	                                    <div class="item">
	                                        <p class="text1">Đường kính mặt</p>
	                                        <p class="text2">{{ $product->pro_diameter }}</p>
	                                    </div>
	                                    <div class="item">
	                                        <p class="text1">Chống nước</p>
	                                        <p class="text2">{{ $product->pro_resistant }}</p>
	                                    </div>
	                                    <div class="item">
	                                        <p class="text1">Chất liệu mặt</p>
	                                        <p class="text2">{{ $product->pro_material }}</p>
	                                    </div>
	                                    <div class="item">
	                                        <p class="text1">Năng lượng sử dụng</p>
	                                        <p class="text2">{{ $product->pro_energy }}</p>
	                                    </div>
	                                    <div class="item">
	                                        <p class="text1">Size dây</p>
	                                        <p class="text2">{{ $product->pro_strap }}</p>
	                                    </div>
	                                    <div class="item">
	                                        <p class="text1">Chất liệu dây</p>
	                                        <p class="text2">{{ $product->pro_wire }}</p>
	                                    </div>
	                                    <div class="item">
	                                        <p class="text1">Kiểu dáng</p>
	                                        <p class="text2">{{ $product->pro_wire }}</p>
	                                    </div>
	                                    <div class="item">
	                                        <p class="text1">Xuất xứ</p>
	                                        <p class="text2">{{ $product->getCountry($product->pro_country) }}</p>
	                                    </div>
	                                    <div class="item">
	                                        <p class="text1">Chế độ bảo hành</p>
	                                        <p class="text2">Bảo hành quốc tế <b>{{ $product->pro_warranty }}</b></p>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="tuvanbanhang">
	                                <div class="titleR">Tư vấn bán hàng</div>
	                                <div class="group">
	                                    <a href="tel:0867515555" title="086.751.5555" class="item">
	                                    	<img data-src="{{ asset('css/icon/sale_phone.png') }}" alt="" class="lazy" src="{{ asset('images/lazy.jpg') }}">
		                                    <span class="text">
		                                    	086.751.5555
		                                    </span>
	                                    </a>
	                                    <a href="tel:0986681189" title="098.668.1189" class="item">
	                                    	<img data-src="{{ asset('css/icon/sale_phone.png') }}" alt="" class="lazy" src="{{ asset('images/lazy.jpg') }}">
		                                    <span class="text">
		                                    	098.668.1189
		                                    </span>
	                                    </a>
	                                    <a href="tel:0985681189" title="098.568.1189" class="item">
	                                    	<img data-src="{{ asset('css/icon/sale_phone.png') }}" alt="" class="lazy" src="{{ asset('images/lazy.jpg') }}">
		                                    <span class="text">
		                                    	098.568.1189
		                                    </span>
	                                    </a>
	                                    <a href="tel:18006005" title="18006005" class="item">
		                                    <img data-src="{{ asset('css/icon/sale_phone.png') }}" alt="" class="lazy" src="{{ asset('images/lazy.jpg') }}">
		                                    <span class="text">
		                                    	1800.6005
		                                    </span>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<div id="fb-root" class=" fb_reset">
	    <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
	        <div></div>
	    </div>
	</div>
	<div id="serviceSup">
	    <div class="wrp">
	        <div class="group">
	            <div class="item">
	                <div class="flex">
	                    <div class="img">
	                        <img data-src="{{ asset('css/icon/sup1.png') }}" alt="Ship" class="lazy" src="{{ asset('css/icon/sup1.png') }}">
	                    </div>
	                    <div class="text">
	                        <p class="ttu fRobotoB">GIAO HÀNG MIỄN PHÍ</p>
	                        <p>Thanh toán (COD) tại nhà</p>
	                    </div>
	                </div>
	            </div>
	            <div class="item">
	                <div class="flex">
	                    <div class="img">
	                        <img data-src="{{ asset('css/icon/sup2.png') }}" alt="Doi san pham" class="lazy" src="{{ asset('css/icon/sup2.png') }}">
	                    </div>
	                    <div class="text">
	                        <p class="ttu fRobotoB">30 NGÀY ĐỔI SẢN PHẨM</p>
	                        <p>Miễn phí</p>
	                    </div>
	                </div>
	            </div>
	            <div class="item">
	                <div class="flex">
	                    <div class="img">
	                        <img data-src="{{ asset('css/icon/sup3.png') }}" alt="Bao hanh" class="lazy" src="{{ asset('css/icon/sup3.png') }}">
	                    </div>
	                    <div class="text">
	                        <p class="ttu fRobotoB">BẢO HÀNH QUỐC TẾ</p>
	                        <p>Thay pin miễn phí</p>
	                    </div>
	                </div>
	            </div>
	            <div class="item">
	                <div class="flex">
	                    <div class="img">
	                        <img data-src="{{ asset('css/icon/sup4.png') }}" alt="Hoa don do" class="lazy" src="{{ asset('css/icon/sup4.png') }}">
	                    </div>
	                    <div class="text">
	                        <p class="ttu fRobotoB">CHÍNH HÃNG 100%</p>
	                        <p>Xuất hóa đơn đỏ</p>
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
@stop