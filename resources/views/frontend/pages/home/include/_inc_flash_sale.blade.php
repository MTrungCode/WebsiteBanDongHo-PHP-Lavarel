<div id="countCate" class="dn dbmobile-l">
    <div class="wrp">
        <div class="group">
            <a href="" title="Phu kien" class="item">
                <span class="ttu"><b>DÂY ĐỒNG HỒ</b></span>
                <span><b>178</b></span>
            </a>
            <a href="" title="Kinh mat thoi trang" class="item">
                <span class="ttu "><b>KÍNH MẮT</b></span>
                <span><b>2.020</b></span>
            </a>
            <a href="" title="Bút ký" class="item">
                <span class="ttu">BÚT KÝ CAO CẤP</span>
                <span><b>11</b></span>
            </a>
           <a href="" title="Hộp đồng hô" class="item">
                <span class="ttu"><b>HỘP ĐỒNG HỒ</b></span>
                <span><b>34</b></span>
            </a>
        </div>
    </div>
</div>
<div id="logoPartner">
    <div class="wrp">
        <div class="wImage">
            <a href="" title="Philippe Auguste" class="image lazy">
                <img data-src="{{ asset('/images/pic/PA.jpg') }}" alt="Philippe Auguste" class="lazy" src="{{ asset('images/lazy.jpg') }}">
            </a>
        </div>
        <div class="wImage">
            <a href="" title="Atlantic Swiss" class="image">
                <img data-src="{{ asset('/images/pic/Atlatic.jpg') }}" alt="Atlantic Swiss" class="lazy" src="{{ asset('images/lazy.jpg') }}">
            </a>
        </div>
        <div class="wImage">
            <a href="" title="Diamond D" class="image">
                <img data-src="" alt="Diamond D" class="lazy" src="http://websiteclock.abc/images/pic/DiamondD.jpg">
            </a>
        </div>
        <div class="wImage">
            <a href="" title="Jacques Lemans" class="image">
                <img data-src="{{ asset('/images/pic/Jacques.jpg') }}" alt="Jacques Lemans" class="lazy" src="{{ asset('images/lazy.jpg') }}">
            </a>
        </div>
        <div class="wImage">
            <a href="" title="Dong ho Hublot" class="image">
                <img data-src="{{ asset('/images/pic/hublot.jpg') }}" alt="Dong ho Hublot" class="lazy" src="{{ asset('images/lazy.jpg') }}">
            </a>
        </div>
        <div class="wImage">
            <a href="" title="Epos Swiss" class="image">
                <img data-src="{{ asset('/images/pic/Epos.jpg') }}" alt="Epos Swiss" class="lazy" src="{{ asset('images/lazy.jpg') }}">
            </a>
        </div>
    </div>
</div>
<div class="cb"></div> 
<div class="product product2">
    <div class="wrp">
        <div class="left">
            <a href="/flash-sale.html" title="Khuyến mại" class="titleCate">Flash Sale</a>
            <div class="contCate">
                Những mẫu đồng hồ đang hot năm 2020 với giá tốt. Chương trình diễn ra hàng ngày với các sản phẩm khác nhau. Nhanh tay sở hữu ngay!!!
            </div>
        </div>
        <div class="right">
            <div class="group slide2 owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(-1558.33px, 0px, 0px); transition: all 1s ease 0s; width: 3740px;">
                        @if(isset($productSale))
                            @foreach($productSale as $product)
                                <div class="owl-item" style="width: 216px; margin-right: 30px;">
                                    @include('frontend.components.product_item', ['product' => $product])
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="owl-controls">
                    <div class="owl-nav">
                        <div class="owl-prev" style=""></div>
                        <div class="owl-next" style=""></div>
                    </div>
                    <div class="owl-dots" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>
</div>