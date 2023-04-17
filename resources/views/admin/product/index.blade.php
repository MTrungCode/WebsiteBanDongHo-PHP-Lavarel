@extends('layouts.app_master_admin')
@section('css')
    <style type="text/css">
        .pagination {
            margin: 10px auto;
            display: flex;
            margin-left: 9px;
        }
        .pagination li {
            padding: 5px;
            margin: 0 2px;
            border: 1px solid #dedede;
        }
        .pagination li a, .pagination li span {
            line-height: 25px;
            display: block;
            text-align: center;
            width: 25px;
            height: 25px;
        }
    </style>
@stop
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý sản phẩm</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.product.index') }}"></i> Product</a></li>
            <li class="active"></i> List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    <form class="form-inline">
                        <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID">
                        <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Name ...">
                        <select name="trademark" class="form-control">
                            <option value="0">Thương hiệu</option>
                            <option value="1" {{ Request::get('trademark')  == 1 ? "selected='selected'" : "" }}>ĐỒNG HỒ DIAMOND D</option>
                            <option value="2" {{ Request::get('trademark')  == 2 ? "selected='selected'" : "" }}>ĐỒNG HỒ ATLANTIC SWISS</option>
                            <option value="3" {{ Request::get('trademark')  == 3 ? "selected='selected'" : "" }}>ĐỒNG HỒ ARIES GOLD</option>
                            <option value="4" {{ Request::get('trademark')  == 4 ? "selected='selected'" : "" }}>ĐỒNG HỒ JACQUES LEMANS</option>
                            <option value="5" {{ Request::get('trademark')  == 5 ? "selected='selected'" : "" }}>ĐỒNG HỒ Q&Q</option>
                            <option value="6" {{ Request::get('trademark')  == 6 ? "selected='selected'" : "" }}>ĐỒNG HỒ EPOS SWISS</option>
                            <option value="7" {{ Request::get('trademark')  == 7 ? "selected='selected'" : "" }}>ĐỒNG HỒ PHILIPPE AUGUST</option>
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Thêm mới <i class="fa fa-plus-square"></i></a>
                    </form>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Avatar</th>
                                    <th>Price</th>
                                    <th>Hot</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @if (isset($products))
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->pro_name }}</td>
                                            <td>
                                                <span class="label label-success">{{ $product->category->c_name ?? [N\A] }}</span>
                                            </td>
                                            <td>
                                                <img src="{{ pare_url_file($product->pro_avatar) }}" style="width: 90px; height: 100px;">
                                            </td>
                                            <td>
                                                @if($product->pro_sale)
                                                    <span style="text-decoration: line-through;">{{ number_format($product->pro_price,0,',','.') }} vnd</span><br>
                                                    {{ number_format(((100-$product->pro_sale)*$product->pro_price)/100,0,',','.') }} vnd
                                                @else
                                                    {{ number_format($product->pro_price,0,',','.') }} vnd
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->pro_hot == 1)
                                                    <a href="{{ route('admin.product.hot', $product->id) }}" class="label label-info">Hot</a>
                                                @else
                                                    <a href="{{ route('admin.product.hot', $product->id) }}" class="label label-default">None</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->pro_active == 1)
                                                    <a href="{{ route('admin.product.active', $product->id) }}" class="label label-info">Active</a>
                                                @else
                                                    <a href="{{ route('admin.product.active', $product->id) }}" class="label label-default">Hide</a>
                                                @endif
                                            </td>
                                            <td>{{ $product->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.product.update', $product->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('admin.product.delete', $product->id) }}" class="js-delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! $products->appends([])->links() !!}
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@stop