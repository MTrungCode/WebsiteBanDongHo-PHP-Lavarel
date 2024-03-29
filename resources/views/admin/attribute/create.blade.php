@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới thuộc tính</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.attribute.index') }}"></i> Attribute</a></li>
            <li class="active"></i> Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                        <form role="form" action="" method="POST">
                            @csrf
							<div class="col-md-8">
								<div class="form-group {{ $errors->first('atb_name') ? 'has-error' : '' }}">
						            <label for="name">Name <span class="text-danger">(*)</span></label>
						            <input type="text" class="form-control" name="atb_name" placeholder="Name ...">
                                    @if ($errors->first('atb_name'))
                                        <span class="text-danger">{{ $errors->first('atb_name') }}</span>
                                    @endif
						        </div>
							</div>
							<div class="col-md-8">
								<div class="form-group">
                                    <label for="name">Group <span class="text-danger">(*)</span></span></label>
                                    <select class="form-control" name="atb_type">
                                        <option value="">___Chọn nhóm thuộc tính___</option>
                                        <option value="1">Đôi</option>
                                        <option value="2">Năng lượng</option>
                                        <option value="3">Loại dây</option>
                                        <option value="4">Loại vỏ</option>
                                    </select> 
                                    @if ($errors->first('atb_type'))
                                        <span class="text-danger">{{ $errors->first('atb_type') }}</span>
                                    @endif                       
                                </div>
							</div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name">Category <span class="text-danger">(*)</span></span></label>
                                    <select class="form-control" name="atb_category_id">
                                        <option value="">___Chọn danh mục___</option>
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->c_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->first('atb_category_id'))
                                        <span class="text-danger">{{ $errors->first('atb_category_id') }}</span>
                                    @endif
                                </div>
                            </div>
							<div class="col-md-12">
								<div class="box-footer text-center" style="margin-top: 20px;">
					            	<a href="{{ route('admin.attribute.index') }}" class="btn btn-danger">Quay lại <i class="fa fa-undo"></i></a>
					            	<button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
					            </div>
							</div>
						</form>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop