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
                    Sửa bài viết
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
                            value="{{ $db->title }}">
                        {{ showError($errors,'name') }}

                    </div>
                    <div class="form-group">
                        <label for="slug">Tên đường dẫn</label>
                        <input id="inputSlug" class="form-control" type="text" name=slug 
                            value="{{ $db->slug }}">
                        {{ showError($errors,'slug') }}
                    </div>
                    <div class="form-group">
                        <label for="image">Mô tả ngắn</label>
                        <input value="{{ $db->short_desc }}" 
                            name="short_desc" class="form-control"">
                    </div>
                    <div class="form-group">
                        <textarea id="editor1" class="form-control" name="content" id="" rows="3">
                                {{ $db->content }}
                        </textarea>
                    </div>
                       
                    <div class="col-md-12" style="margin-top: 20px;margin-left:-15px;">
                        <label>Chọn ảnh đại diện</label>
                        <div class="form-group"  ninh='123'>
                            <input type="button" class="btn btn-info" id="add" name="action"
                                value="Chọn ảnh đại diện">
                            <img id="img_old" class="" src="{{ $db->image }}" width="60" height="40" alt="">
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
                            value="{{ $db->views }}">
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Chọn danh mục</label>
                        
                        <select name="parent_id" id="parent_id" class="form-control select2_add">
                            @foreach ($post_cate as $item)
                            <option 
                            @if ($item->id == $db->post_category_id)
                                {{ 'selected' }}
                            @endif 
                            value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
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
<script> CKEDITOR.replace('editor1'); </script>
    <script>
        jQuery('body').on('click', '#add', function () {
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
                            var urlParts = url_.replace('http://','').replace('https://','').split(/[/?#]/);
                            var domain = urlParts[0];
                            let port = 8000;

                            let new_domain = domain + ":" + port;
                            
                            let new_url_ = url_.replace(domain , new_domain);
                            
                            list_img = "<div class='single-img text-left'><i class='fa fa-remove delete-img' data-url='" +
                                    new_url_ + "'></i><img alt='' src='" + new_url_ +
                                "' class='img-cat' width='200' height='200'/></div>";
                            $('#img_').val(new_url_);
                        }
                        arr_url = JSON.stringify(arr_url);

                        $('#img_old').css('display', 'none');
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
			slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
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
			slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
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
    </script>
@endsection