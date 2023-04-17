<div id="commonHead">
    <div class="wrp">
        <h1 class="textLeft dnTablet-l">Đồng hồ uy tín, chất lượng</h1>
        <form class="frmSearch" action="{{ route('get.product.list') }}" method="get">
            <div class="flex">
                <input type="text" name="k" value="{{ Request::get('k') }}" placeholder="Nhập từ khóa tìm kiếm..."> 
                <button class="btnSearch">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <ul class="menuRight dnTablet-l">
            <li><a href="/" title="Home">Trang chủ</a></li>
            <li><a href="" title="Tin tức">Tin tức đồng hồ</a></li>
            <li><a href="" title="Cửa hàng">Hệ thống cửa hàng</a></li>
            <li><a href="" title="Hỗ trợ">Liên hệ</a></li>

        </ul>
        <ul class="menuRight">
            <li>
                <a href="tel:18006005" title="Hotline" class="item">
                    <span class="text">
                        <span class="top">Hotline</span>
                        <span class="bot">1800 6005</span>
                    </span>
                    <span class="icon">
                        <img data-src="/icon/hotline.png" alt="Hotline" class="lazy" src="/icon/hotline.png">
                    </span>
                </a>
            </li>
        </ul>
        <a href="javascript://" class="openList">
            <div>
                <hr>
                <hr>
                <hr>
            </div>
            <span>Close</span>
        </a>
        <div id="menuRes" class="dn">
            <ul class="menuCate">
                <li><a href="" title="Dong ho chinh hang">Đồng hồ chính hãng</a></li>
                <li><a href="" title="">Kính mắt thời trang</a></li>
                <li><a href="" title="Phụ kiện">Dây đồng hồ</a></li>
                <li><a href="" title="Bút ký">Bút ký cao cấp</a></li>
                <li><a href="" title="Hộp đựng đồng hồ">Hộp đựng đồng hồ</a></li>
                <li>
                    <a href="" title="Giảm giá sốc" style="color: red;">Sale Sốc Online</a>
                </li>
            </ul>
            <div class="hotline">
                <span>Gọi mua hàng: </span>
                <a href="tel:18006005" title="1800.6005"><span class="icon"><i class="fa fa-phone"></i></span> 1800.6005</a>
                <span>(8:30 - 21:30)</span>
            </div>
            <div class="countCate">
            </div>
            <ul class="lstProduct">
                <li><a href="" title="Philippe Auguste">Đồng hồ Philippe Auguste</a></li>
                <li><a href="" title="Diamond D">Đồng hồ Diamond D</a></li>
                <li><a href="" title="Jacques Lemans">Đồng hồ Jacques Lemans</a></li>
                <li><a href="" title="Dong ho Hublot">Đồng hồ Hublot</a></li>
                <li><a href="" title="Dong ho bovet">Đồng hồ Bovet</a></li>
                <li><a href="" title="Đồng hồ Q&amp;Q">Đồng hồ Q&amp;Q</a></li>
                <li><a href="" title="Tin tức">Tin tức - sự kiện</a></li>
                <li><a href="" title="Cửa hàng">Hệ thống cửa hàng (100 Showroom)</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="header">
    <div class="wrp">
        <a href="/" title="Home">
            <img src="{{ asset('icon/logo.gif') }}" alt="Logo" width="256px" height="55px">
        </a>
        <div id="menuMain">
            <ul>
                <li class="hasChild">
                    <a href="{{ route('get.product.list') }}" title="Danh mục sản phẩm" class="">Danh mục sản phẩm</a>
                    <ul>
                        @if (isset($categories))
                            @foreach($categories as $category)
                                <li>
                                    <div class="subMenu">
                                        <div class="group">
                                            <div class="item">
                                                <a href="{{ route('get.category.list', $category->c_slug . '-' .$category->id) }}" title="{{ $category->c_name }}">{{ $category->c_name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach         
                        @endif
                    </ul>
                </li>
                <li class="hasChild">
                    @if (isset($categories))
                        @foreach($categories as $category)
                            <li>
                                <a href="" title="{{ $category->c_name }}">{{ $category->c_name }}</a>
                            </li>
                        @endforeach
                    @endif
                </li>
                @if (Auth::check())
                    <li>
                        <a href="{{ route('get.user.dashboard') }}">Xin chào {{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('get.logout') }}">Đăng xuất</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('get.register') }}">Đăng ký</a>
                    </li>
                    <li>
                        <a href="{{ route('get.login') }}">Đăng nhập</a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="right">
            <a href="{{ route('get.shopping.list') }}" title="Giỏ hàng" class="btnCart">
                <i class="fas fa-cart-shopping"></i>
                <span class="number">{{ \Cart::count() }}</span>
                Giỏ hàng
            </a>
        </div>
    </div>
</div>