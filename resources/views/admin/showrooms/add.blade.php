@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Phòng trưng bày
@endsection
{{-- content --}}
@section('content')

<!-- main content -->
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm phòng trưng bày
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <form id=create_ method="post">
                    @csrf
                    {{-- {{@csrf_field()}} --}}
                    <div class="form-group">

                        <label for="name">Tên phòng</label>
                        <input class="form-control" type="text" name="name"
                            value="{{ !empty(old('name')) ? old('name') : ''}}">
                            {{ showError($errors,'name') }}
                            
                    </div>
                    <div class="form-group">
                        <label for="slug">Địa chỉ</label>
                        <input class="form-control" type="text" name=address
                            value="{{ !empty(old('address')) ? old('address') : ''}}">

                    </div>
                    <div class="form-group">
                        <label for="image">Liên hệ</label>
                        <input value="{{ (old('hotline') ? old('hotline') :  '' ) }}" name="hotline"
                            class="form-control"">
                    </div>
                    <div class=" form-group">
                        <label for="image">Số điện thoại</label>
                        <input value="{{ (old('phone') ? old('phone') :  '' ) }}" name="phone" class="form-control"">
                    </div>
                    <div class=" form-group">
                        <label for="image">Nhúng bản đồ</label>
                        <input value="{{ (old('embed_google_map') ? old('embed_google_map') :  '' ) }}"
                            name="embed_google_map" class="form-control"">
                    </div>
                    <div class=" form-group">
                        <label for="image">Đường dẫn</label>
                        <input value="{{ (old('link') ? old('link') :  '' ) }}" name="link" class="form-control"">
                    </div>
                    <div class=" form-group">
                        <button class=" btn btn-success" type="submit">Lưu</button>
                    </div>
                </form>

                <!-- end content here -->
            </div>
        </div>
    </div>

</div>
<!-- end main content -->


@endsection

