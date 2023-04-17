@if(isset($product))
	<div class="item">
		<div class="wImage">
			<a href="{{ route('get.product.detail', $product->pro_slug .'-'.$product->id) }}" title="" class="image cover">
				<img src="{{ pare_url_file($product->pro_avatar) }}" alt="Diamond D" class="lazy">
			</a>
			@if(isset($product->pro_sale))
				<span class="bot">-{{ $product->pro_sale }}%</span>
			@endif
		</div>
		<div class="info">
			<a href="{{ route('get.product.detail', $product->pro_slug .'-'.$product->id) }}" title="" class="name">
				<h3>{{ $product->pro_name }}</h3>
			</a>
			<div class="price">
				@if($product->pro_sale)
					<p class="new">{{ number_format(((100-$product->pro_sale)*$product->pro_price)/100,0,',','.') }} đ</p>
					<p class="old">{{ number_format($product->pro_price,0,',','.') }} đ</p>
				@else
					<p class="new">{{ number_format($product->pro_price,0,',','.') }} đ</p>
				@endif
				
			</div>
		</div>
	</div>
@endif