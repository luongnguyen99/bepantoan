@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Bài viết
@endsection





{{-- content --}}
@section('content')

<!-- main content -->
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm bài viết
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

                        <label for="name">Tên tiêu đề</label>
                        <input id="inputName" class="form-control" type="text" name="name"
                            value="{{ !empty(old('name')) ? old('name') : ''}}">
                        {{ showError($errors,'name') }}
                    </div>
                    <div class="form-group">
                        <label for="slug">Tên đường dẫn</label>
                        <input id="inputSlug" class="form-control" type="text" name=slug
                            value="{{ !empty(old('slug')) ? old('slug') : ''}}">
                        {{ showError($errors,'slug') }}
                    </div>
                    <div class="form-group">
                        <label for="image">Mô tả ngắn</label>
                        <input value="{{ (old('short_desc') ? old('short_desc') :  '' ) }}" name="short_desc"
                            class="form-control"">
                    </div>


                    <div class=" form-group">
                        <label for="image">Nội dung</label>
                        <textarea id="editor" class="form-control" name="content" rows="10">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success" id="add_img">Upload ảnh vào nội dung</button>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;margin-left:-15px;">
                        <label>Chọn ảnh đại diện</label>
                        <div class="form-group" ninh='123'>
                            <input type="button" class="btn btn-info" id="add" name="action" value="Chọn ảnh đại diện">
                            <input id="img_" type="hidden" name="img[]" value="">
                            <input type="hidden" name="list_img" id="list-img"
                                value='<?php echo isset($_POST['list_img']) ? $_POST['list_img'] : '' ?>'>
                        </div>
                        <div class="col-sm-12 text-center" id="img-cat">
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="name">Số lượng truy cập</label>
                        <input class="form-control" type="text" name="view"
                            value="{{ !empty(old('view')) ? old('view') : ''}}">
                        {{ showError($errors,'view') }}
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Chọn danh mục</label>

                        <select name="id_cate" id="id_cate" class="form-control select2_add">
                            <option value="0">-- Gốc --</option>
                            @foreach ($post_cate as $item)

                            <option value="{{ $item->id }}">{{ $item->name }}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="input-wrap" style="margin: 20px;">
                        <label class="checkbox">
                            <input type="checkbox" id="add_seo" name="add_seo">
                            <span class="ico"></span> Thiết lập SEO
                        </label>
                    </div>
                    <div class="seo_content" style="display:none">
                        <div class="form-group">
                            <label for="seo_title">Tiêu đề</label>
                            <input class="form-control" name="seo_title" value="" placeholder="Seo tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="seo_keyword">Từ khóa</label>
                            <input class="form-control" name="seo_keyword" value="" placeholder="Từ khóa">
                        </div>
                        <div class="form-group">
                            <label for="seo_description">Mô tả</label>
                            <textarea name="seo_description" class="form-control" id="seo_description" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Chặn robot google</label><br>
                            <label class="switch">
                                <input type="checkbox" name="block_robot_google">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
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
{{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('kcfinder/ckfinder.js') }}"></script> --}}
<script>
    CKEDITOR.replace('editor');

</script>

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
                        $('#img_').html(list_img);
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
    $("#inputName").keyup(function () {
        var slug = $("#inputName").val();
        slug = slug.toLowerCase();
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
            '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, " - ");
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        slug = slug.replace(/ /g, '');
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        $("#inputSlug").val(slug);
    })

    $("#inputName").change(function () {
        var slug = $("#inputName").val();
        slug = slug.toLowerCase();
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
            '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, " - ");
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        slug = slug.replace(/ /g, '');
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        $("#inputSlug").val(slug);
    });
    jQuery(document).ready(function () {
        var arr_url = [];
        jQuery('body').on('click', '#add_img', function () {
            CKFinder.popup({
                chooseFiles: true,
                resourceType: "Images",
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        var file = evt.data.files.first();
                        var mul = evt.data.files;

                        mul = Object.entries(mul);
                        mul = mul[1];
                        mul = mul[1];

                        for (var i = mul.length - 1; i >= 0; i--) {
                            arr_url.push(mul[i].getUrl());
                        }
                        for (var i = 0; i < arr_url.length; i++) {
                            var base_url = window.location.origin;
                            let arr_url = mul[i].getUrl();
                            var urlParts = arr_url.replace('http://', '').replace('https://', '')
                                                        .split(/[/?#]/);
                            var ninh = base_url +'/'+urlParts[1]+ '/'+urlParts[2]+'/'+urlParts[3];                            
                            
                            CKEDITOR.instances.editor.insertHtml("<img src='" +
                                ninh + "'>");
                        }
                        arr_url = [];
                    });
                }
            });
        });
    });

</script>

@endsection
