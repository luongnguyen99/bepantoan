@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Sửa Trang
@endsection

{{-- content --}}
@section('content')

<!-- main content -->
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Sửa Trang
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
                        @if($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="slug">Tên đường dẫn</label>
                        <input id="inputSlug" class="form-control" type="text" name=slug
                            value="{{ $db->slug }}">
                        @if($errors->has('slug'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </div>
                        @endif
                    </div>
                    <div class=" form-group">
                        <label for="image">Nội dung</label>
                        <textarea id="editor" class="form-control" name="content" rows="10">{{ $db->content }}</textarea>
                        
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-success" id="add_img">Upload ảnh vào nội dung</button>
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
