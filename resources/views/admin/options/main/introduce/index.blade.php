@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Thiết lập trang giới thiệu
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thiết lập trang giới thiệu
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <form id=create_category method="post" class="repeater">
                    @csrf
                   
                    
                    <div class="col-md-12" style="margin-top: 20px;margin-left:-15px;">
                        <label>Chọn ảnh banner</label>
                        <div class="form-group" ninh='123'>
                            <input type="button" class="btn btn-info" id="add" name="action" value="Chọn ảnh banner">
                            <input id="img_" type="hidden" name="banner" value="@if (!empty($introduce['banner'])){{ $introduce['banner'] }}@endif">
                            <img id="img_banner" width="200" src="@if (!empty($introduce['banner'])){{ $introduce['banner'] }}@endif" alt="">
                            <input type="hidden" name="list-img" id="list-img"
                                value='<?php echo isset($_POST['list_img']) ? $_POST['list_img'] : '' ?>'>
                        </div>
                        <div class="col-sm-12 text-center" id="img-cat">
                        </div>
                        @if (empty($introduce['banner']))
                        @if($errors->has('banner'))
                        <div class="alert alert-danger" role="alert">
                         <strong>{{ $errors->first('banner') }}</strong>
                        </div>
                        @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Thêm tiêu đề banner</label>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <input value="@if (!empty($introduce['title_banner'])){{ $introduce['title_banner'] }}@endif" type="text" name="title_banner" class="form-control" id="exampleInputPassword4"
                                    placeholder="Tiêu đề banner">
                            </div>
                        </div>
                        @if($errors->has('title_banner'))
                        <div class="alert alert-danger" role="alert">
                         <strong>{{ $errors->first('title_banner') }}</strong>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;margin-left:-15px;">
                        <label>Chọn ảnh giới thiệu</label>
                        <div class="form-group" ninh='123'>
                            <input type="button" class="btn btn-info" id="add_img" name="action" value="Chọn ảnh giới thiệu">
                            <input  id="img_introduce" type="hidden" name="img_introduce" value="@if (!empty($introduce['img_introduce'])){{ $introduce['img_introduce'] }}@endif">
                            <img id="img_intro" width="200" src="@if (!empty($introduce['img_introduce'])){{ $introduce['img_introduce'] }}@endif" alt="">
                            <input type="hidden" name="introduce" id="list_img_introduce"
                                value='<?php echo isset($_POST['list_img_introduce']) ? $_POST['list_img_introduce'] : '' ?>'>
                        </div>
                        <div class="col-sm-12 text-center" id="img-cat-introduce">
                        </div>
                        @if (empty($introduce['img_introduce']))
                        @if($errors->has('img_introduce'))
                        <div class="alert alert-danger" role="alert">
                         <strong>{{ $errors->first('img_introduce') }}</strong>
                        </div>
                        @endif
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Thêm nội dung</label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="4">@if (!empty($introduce['content'])){{ $introduce['content'] }}@endif</textarea>
                        @if($errors->has('content'))
                        <div class="alert alert-danger" role="alert">
                         <strong>{{ $errors->first('content') }}</strong>
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Thêm mô tả bên dưới</label>
                        <input type="text" name="orientation" class="form-control" id="exampleInputPassword4" value="@if (!empty($introduce['orientation'])){{ $introduce['orientation'] }}@endif"
                                    placeholder="Tiêu đề">
                                    <br>
                        <textarea class="form-control" name="content2" id="content2" placeholder="Nội dung" cols="30" rows="10">@if (!empty($introduce['content2'])){{ $introduce['content2'] }}@endif</textarea>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-success" value="Lưu">
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
<script>CKEDITOR.replace('content'); </script>
<script>CKEDITOR.replace('content2'); </script>
<script>
    jQuery('body').on('click', '#add', function () {
        $('#img_banner').remove();
        // console.log("sss");
        // var arr_url =($('#list-img').val()=='')?[]:($('#list-img').val());
        var t = $(this);
        var arr_url = (t.closest('.col-md-12').find('#list-img').val() == '') ? [] : (t.closest('.col-md-12')
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
                        var urlParts = url_.replace('http://', '').replace('https://', '')
                            .split(/[/?#]/);
                        var domain = urlParts[0];
                        let port = 8000;

                        let new_domain = domain + ":" + port;

                        let new_url_ = url_.replace(domain, new_domain);



                        list_img =
                            "<div class='single-img text-left'><i class='fa fa-remove delete-img' data-url='" +
                            new_url_ + "'></i><img alt='' src='" + new_url_ +
                            "' class='img-cat' width='200' height='200'/></div>";
                        $('#img_').val(new_url_);
                    }
                    arr_url = JSON.stringify(arr_url);

                    t.closest('.col-md-12').find('#list-img').eq(0).val(arr_url);

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

    jQuery('body').on('click', '#add_img', function () {
        $('#img_intro').remove();
        // console.log("sss");
        // var arr_url =($('#list-img').val()=='')?[]:($('#list-img').val());
        var t = $(this);
        var arr_url = (t.closest('.col-md-12').find('#list-img').val() == '') ? [] : (t.closest('.col-md-12')
            .find('#list_img_introduce').val());

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
                        var urlParts = url_.replace('http://', '').replace('https://', '')
                            .split(/[/?#]/);
                        var domain = urlParts[0];
                        let port = 8000;

                        let new_domain = domain + ":" + port;

                        let new_url_ = url_.replace(domain, new_domain);



                        list_img =
                            "<div class='single-img text-left'><i class='fa fa-remove delete-img-introduce' data-url='" +
                            new_url_ + "'></i><img alt='' src='" + new_url_ +
                            "' class='img-cat-introduce' width='200' height='200'/></div>";
                        $('#img_introduce').val(new_url_);
                    }
                    arr_url = JSON.stringify(arr_url);

                    t.closest('.col-md-12').find('#list_img_introduce').eq(0).val(arr_url);

                    t.closest('.col-md-12').find('#img-cat-introduce').html(list_img);
                });
            }
        });
    });
    $('body').on('click', '.delete-img-introduce', function () {
        var image = $(this).data('url');
        $(this).parent().remove();

        var string = $('#list-img-introduce').val();
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
