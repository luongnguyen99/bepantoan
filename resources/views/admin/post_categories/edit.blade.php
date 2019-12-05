@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Danh mục
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-4">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Sửa danh mục
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <form id=create_category method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input id="inputName" class="form-control" type="text" name="name"
                            value="{{ $record_edit->name }}">
                        @error('name')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Đường dẫn</label>
                        <input id="inputSlug" class="form-control" type="text" name=slug
                            value="{{ $record_edit->slug }}">
                        @error('slug')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-wrap" style="margin: 20px;">
                        <label class="checkbox">
                            <input type="checkbox" 
                            {{!empty($record_edit->seo_title) || !empty($record_edit->seo_keyword) || !empty($record_edit->seo_description) || !empty($record_edit->block_robot_google) && $record_edit->block_robot_google != -1 ? 'checked' : '' }}
                             id="add_seo" name="add_seo">
                            <span class="ico"></span> Thiết lập SEO
                        </label>
                    </div>
                    <div class="seo_content" style="{{!empty($record_edit->seo_title) || !empty($record_edit->seo_keyword) || !empty($record_edit->seo_description) || !empty($record_edit->block_robot_google) && $record_edit->block_robot_google != -1 ? 'display:block' : 'display:none' }}">
                        <div class="form-group">
                            <label for="seo_title">Tiêu đề</label>
                            <input class="form-control" name="seo_title" value="{{!empty($record_edit->seo_title) ? $record_edit->seo_title : ''}}" placeholder="Seo tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="seo_keyword">Từ khóa</label>
                            <input class="form-control" name="seo_keyword" value="{{!empty($record_edit->seo_keyword) ? $record_edit->seo_keyword : ''}}" placeholder="Từ khóa">
                        </div>
                        <div class="form-group">
                            <label for="seo_description">Mô tả</label>
                            <textarea name="seo_description" class="form-control" id="seo_description" cols="30" rows="10">{{!empty($record_edit->seo_description) ? $record_edit->seo_description : ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Chặn robot google</label><br>
                            <label class="switch">
                                <input type="checkbox" {{!empty($record_edit->block_robot_google) && $record_edit->block_robot_google != -1 ? 'checked' : ''}} name="block_robot_google">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:20px">
                        <button class=" btn btn-success" type="submit">Lưu</button>
                    </div>
                </form>
                <!-- end content here -->
            </div>
        </div>
    </div>
    {{-- /////////////////// --}}
    <div class="col-sm-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách danh mục
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <div class="table-responsive">
                    <table class="table table-hover table-striped text-center" id="table-categories">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Đường dẫn</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($db as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <a href="/{{ $item->slug }}" class="btn btn-success">Xem</a>
                                    <a href="/admin/post_categories/edit/{{ $item->id }}"
                                        class="btn btn-warning">Sửa</a>
                                    <a href="/admin/post_categories/del/{{ $item->id }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end content here -->
            </div>
        </div>
    </div>
</div>
<!-- end main content -->
@endsection
@section('js')
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
