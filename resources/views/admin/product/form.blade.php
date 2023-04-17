<form role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-8">
        <div class="box box-qarning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="pro_name" placeholder="Name ..." autocomplete="off" value="{{ $product->pro_name ?? old('pro_name') }}">
                    @if ($errors->first('pro_name'))
                        <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name">Giá sản phẩm</label>
                            <input type="number" class="form-control" name="pro_price" placeholder="1.000.000" data-type="currency" value="{{ $product->pro_price ?? old('pro_price') }}">
                            @if ($errors->first('pro_price'))
                                <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name">Giảm giá</label>
                            <input type="number" class="form-control" name="pro_sale" placeholder="5" data-type="currency" value="{{ $product->pro_sale ?? old('pro_sale') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name">Số lượng</label>
                            <input type="number" class="form-control" name="pro_number" placeholder="500" data-type="currency" value="{{ $product->pro_number ?? old('pro_number') }}">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="tag">Thương hiệu</label>
                            <select name="pro_trademark" class="form-control">
                                <option value="0">___Click___</option>
                                <option value="1" {{ ($product->pro_trademark ?? '') == 1 ? "selected='selected'" : "" }}>ĐỒNG HỒ DIAMOND D</option>
                                <option value="2" {{ ($product->pro_trademark ?? '') == 2 ? "selected='selected'" : "" }}>ĐỒNG HỒ ATLANTIC SWISS</option>
                                <option value="3" {{ ($product->pro_trademark ?? '') == 3 ? "selected='selected'" : "" }}>ĐỒNG HỒ ARIES GOLD</option>
                                <option value="4" {{ ($product->pro_trademark ?? '') == 4 ? "selected='selected'" : "" }}>ĐỒNG HỒ JACQUES LEMANS</option>
                                <option value="5" {{ ($product->pro_trademark ?? '') == 5 ? "selected='selected'" : "" }}>ĐỒNG HỒ Q&Q</option>
                                <option value="6" {{ ($product->pro_trademark ?? '') == 6 ? "selected='selected'" : "" }}>ĐỒNG HỒ EPOS SWISS</option>
                                <option value="7" {{ ($product->pro_trademark ?? '') == 7 ? "selected='selected'" : "" }}>ĐỒNG HỒ PHILIPPE AUGUST</option>
                            </select>
                            @if ($errors->first('pro_trademark'))
                                <span class="text-danger">{{ $errors->first('pro_trademark') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="pro_description" class="form-control" cols="5" rows="2" autocomplete="off">{{ $product->pro_description ?? old('pro_description') }}</textarea>
                    @if ($errors->first('pro_description'))
                        <span class="text-danger">{{ $errors->first('pro_description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Danh mục <b class="col-red">(*)</b></label>
                    <select name="pro_category_id" class="form-control">
                        <option value="0">___Click___</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ ($product->pro_category_id ?? 0) == $category->id ? "selected='selected'" : "" }}>
                                {{ $category->c_name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->first('pro_category_id'))
                        <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box box-qarning">
            <div class="box-header with-border">
                <h3 class="box-title">Thuộc tính</h3>
            </div>
            <div class="box-body">
                @foreach ($attributes as $key => $attribute)
                    <div class="form-group col-sm-3">
                        <h4 style="border-bottom: 1px solid #dedede;padding-bottom: 10px">{{ $key }}</h4>
                        @foreach($attribute as $item)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="attribute[]" {{ in_array($item['id'], $attributeOld) ? "checked" : '' }}
                                    value="{{ $item['id'] }}"> {{ $item['atb_name'] }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <hr>
            <div class="box-body">
                <div class="form-group col-sm-3">
                    <label for="name">Xuất sứ</label>
                    <select name="pro_country" class="form-control">
                        <option value="0">___Click___</option>
                        <option value="1" {{ ($product->pro_country ?? '') == 1 ? "selected='selected'" : "" }}>Việt Nam</option>
                        <option value="2" {{ ($product->pro_country ?? '') == 2 ? "selected='selected'" : "" }}>Anh</option>
                        <option value="3" {{ ($product->pro_country ?? '') == 3 ? "selected='selected'" : "" }}>Mỹ</option>
                        <option value="4" {{ ($product->pro_country ?? '') == 4 ? "selected='selected'" : "" }}>Thụy Sỹ</option>
                        <option value="5" {{ ($product->pro_country ?? '') == 5 ? "selected='selected'" : "" }}>China</option>
                        <option value="6" {{ ($product->pro_country ?? '') == 6 ? "selected='selected'" : "" }}>Áo</option>
                        <option value="7" {{ ($product->pro_country ?? '') == 7 ? "selected='selected'" : "" }}>Singapore</option>
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <label for="name">Năng lượng</label>
                    <input type="text" name="pro_energy" class="form-control" value="{{ $product->pro_energy ?? '' }}" placeholder="Năng lượng">
                </div>
                <div class="form-group col-sm-3">
                    <label for="name">Độ chịu nước</label>
                    <input type="text" name="pro_resistant" class="form-control" value="{{ $product->pro_resistant ?? '' }}" placeholder="Độ chịu nước">
                </div>
                <div class="form-group col-sm-3">
                    <label for="name">Đường kính mặt</label>
                    <input type="text" name="pro_diameter" class="form-control" value="{{ $product->pro_diameter ?? '' }}"  placeholder="Đường kính mặt">
                </div>
            </div>
            <hr>
            <div class="box-body">
                <div class="form-group col-sm-3">
                    <label for="name">Chất liệu mặt</label>
                    <input type="text" name="pro_material" class="form-control" value="{{ $product->pro_material ?? '' }}"  placeholder="Chất liệu mặt">
                </div>
                <div class="form-group col-sm-3">
                    <label for="name">Size dây</label>
                    <input type="text" name="pro_strap" class="form-control" value="{{ $product->pro_strap ?? '' }}" placeholder="Size dây">
                </div>
                <div class="form-group col-sm-3">
                    <label for="name">Chất liệu dây</label>
                    <input type="text" name="pro_wire" class="form-control" value="{{ $product->pro_wire ?? '' }}" placeholder="Chất liệu dây">
                </div>
                <div class="form-group col-sm-3">
                    <label for="name">Chế độ bảo hành</label>
                    <input type="text" name="pro_warranty" class="form-control" value="{{ $product->pro_warranty ?? '' }}"  placeholder="1 năm">
                </div>
            </div>
        </div>
        <div class="box box-qarning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Content</label>
                    <textarea name="pro_content" id="content" class="form-control textarea" cols="5" rows="4">{{ $product->pro_content ?? '' }}</textarea>
                    @if ($errors->first('pro_content'))
                        <span class="text-danger">{{ $errors->first('pro_content') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box box-qarning">
            <div class="box-header with-border">
                <h3 class="box-title">Ảnh đại diện</h3>
            </div>
            <div class="box-body block-images">
                <div style="margin-bottom: 10px;"><img src="{{ isset($product->pro_avatar) ? pare_url_file($product->pro_avatar) : asset('images/default.png') }}" onerror="this.onerror=null;this.src='{{ isset($product->pro_avatar) ? pare_url_file($product->pro_avatar) : asset('images/default.png') }}';" alt="" class="img-thumbnail" style="width: 200px; height: 200px;"></div>
                <div style="position: relative;"><a class="btn btn-primary" href="javascript:;"> Choose File...<input type="file" style="position: absolute;z-index: 2;top: 0;left: 0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransForm.Microsoft.Alpha(opacity=0)&quot;;opacity: 0;background-color: transparent;color: transparent;" name="pro_avatar" size="40" class="js-upload"></a><span class="label label-info" id="upload-file-info"></span></div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 clearfix">
        <div class="box-footer text-center">
            <a href="{{ route('admin.product.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Quay lại</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>{{ isset($product) ? " Cập nhật" : " Thêm mới" }}</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'content' );
</script>