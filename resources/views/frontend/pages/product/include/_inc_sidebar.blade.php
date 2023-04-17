<style type="text/css">
	.noidung1 .active a {
		color: red;
	}
</style>
<div class="filter sidebar">
	<div class="item">
		<div class="item text">Thương hiệu</div>
		<div class="noidung1">
			<ul>
				<li>
					<label>
						<input type="checkbox" value="597">
						<h2><span>Đồng hồ Diamond D</span></h2>
					</label>
				</li>
				<li>
					<label>
						<input type="checkbox" value="533">
						<h2><span>Đồng hồ Epos Swiss</span></h2>
					</label>
				</li>
			</ul>
		</div>
	</div>		
	@if (isset($attributes))
		@foreach ($attributes as $key => $attribute)				
			<div class="item">
				<div class="item text">{{ $key }}</div>
				<div class="noidung1" style="display: block;">
					<ul>
						@foreach($attribute as $item)
							<li class="{{ Request::get('attr_'.$item['atb_type']) == $item['id'] ? "active" : "" }}">
								<a href="{{ request()->fullUrlWithQuery(['attr_'.$item['atb_type'] => $item['id']]) }}">
									<h2><span>{{ $item['atb_name'] }}</span></h2>
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endforeach
	@endif
</div>