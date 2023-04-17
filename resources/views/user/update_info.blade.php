@extends('layouts.app_master_user')
@section('content')
	<section class="py-lg-5" style="background: white; padding: 100px;">
		<h2>Cập nhật thông tin</h2>
		<div class="row mb-5">
			<div class="col-sm-12">
				<form action="" method="post">
					@csrf
				    <div class="form-group">
				        <label for="exampleInputEmail1">Name</label>
				        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="">     
				    </div>
				    <div class="form-group">
				        <label for="exampleInputEmail1">Email</label>
				        <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="">
				    </div>
				    <div class="form-group">
				        <label for="">Phone</label>
				        <input type="number" class="form-control" name="phone" value="{{ Auth::user()->phone }}" placeholder="">
				    </div>
				    <div class="form-group">
				        <label for="">Address</label>
				        <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" placeholder="Địa chỉ">
				    </div>
				    <button type="submit" class="btn btn-success">Lưu</button>
				</form>
			</div>	    
		</div>
	</section>
@stop