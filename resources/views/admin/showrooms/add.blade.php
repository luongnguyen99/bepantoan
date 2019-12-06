@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Cửa hàng
@endsection
{{-- content --}}
@section('content')

<!-- main content -->
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm cửa hàng
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
                        <input type="text" value="{{ (old('phone') ? old('phone') :  '' ) }}" name="phone" class="form-control"">
                    </div>
                    <div class=" form-group">
                        <label for="image">Nhúng bản đồ</label>
                        <input value="{{ (old('embed_google_map') ? old('embed_google_map') :  '' ) }}"
                            name="embed_google_map" class="form-control"">
                    </div>
                    <div class=" col-md-12" style="margin-top: 20px;margin-left:-15px;">
                        <label>Chọn ảnh bản đồ</label>
                        <div class="form-group" ninh='123'>
                            <input type="button" class="btn btn-info" id="add" name="action" value="Chọn ảnh bản đồ">
                            <input id="img_" type="hidden" name="img[]" value="">
                            <input type="hidden" name="list_img" id="list-img"
                                value='<?php echo isset($_POST['list_img']) ? $_POST['list_img'] : '' ?>'>
                        </div>
                        <div class="col-sm-12 text-center" id="img-cat">
                        </div>

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
@section('js')
<script>
    jQuery('body').on('click', '#add', function () {
        // console.log("sss");
        // var arr_url =($('#list-img').val()=='')?[]:($('#list-img').val());
        var t = $(this);
        var arr_url = (t.closest('.col-md-12').find('#list-img').val() == '') ? [] : (t.closest(
                '.col-md-12')
            .find('#list-img').val());

        if (typeof (arr_url) == 'string') {
            //console.log(arr_url);
            arr_url = arr_url.replace(/\[/g, '');
            arr_url = arr_url.replace(/\]/g, '');
            arr_url = arr_url.replace(/"/g, '');
            arr_url = (arr_url == '') ? [] : arr_url.split(",");
            //arr_url = arr_url.split(",");
        }
        CKFinder.popup({
            resourceType: "Images",
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    //var arr_url = [];
                    var mul = evt.data.files;
                    mul = Object.entries(mul);
                    mul = mul[1];
                    mul = mul[1];

                    var list_img = '';
                    var arr_url_ = [];

                    for (var i = mul.length - 1; i >= 0; i--) {
                        let url_ = mul[i].getUrl();
                        var base_url = window.location.origin;
                        var urlParts = url_.replace('http://', '').replace('https://', '')
                            .split(/[/?#]/);

                        let new_url_ = base_url + '/' + urlParts[1] + '/' + urlParts[2] +
                            '/' + urlParts[3];

                        list_img =
                            "<div class='single-img text-left'><i class='fa fa-remove delete-img' data-url='" +
                            new_url_ + "'></i><img alt='' src='" + new_url_ +
                            "' class='img-cat' width='200' height='200'/></div><input type='hidden' value='" +
                            new_url_ + "' name='img_'>";

                    }
                    arr_url = JSON.stringify(arr_url);

                    // t.closest('.col-md-12').find('#list-img').eq(0).val(arr_url);

                    t.closest('.col-md-12').find('#img-cat').html(list_img);


                });
            }
        });
    });
    $('body').on('click', '.delete-img', function () {
        var image = $(this).data('url');
        $(this).parent().remove();

        var string = $('#list-img').val();
        var string_arr = JSON.parse(string);
        console.log(string_arr);

        string_arr = jQuery.grep(string_arr, function (value) {
            return value !== image;
        });
        console.log(string_arr);

        var final_string = JSON.stringify(string_arr);
        $('#list-img').val(final_string);
    });

</script>
@endsection
