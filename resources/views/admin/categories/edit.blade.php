@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Sửa danh mục
@endsection


{{-- style --}}
@section('style')
<style>
    td:hover .div-action {
        animation-delay: 2s;
        /* display: block; */

        visibility: visible;
    }

    .div-action {
        visibility: hidden;
        /* display: none; */
    }

    .td-action a:hover {
        color: #000000;
    }

    .dataTables_length {
        float: left;
    }
</style>
@endsection


{{-- content --}}
@section('content')
<style>
    #updateCategory {
        opacity: 1 !important;
        overflow: dcm !important
    }
</style>
{{-- alert --}}
@if (session('success'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

@if (session('error'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
{{-- end alert --}}


<!-- main content -->
<div class="row">
    <div class="col-sm-12">
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
                <form action="{{route('admin.categories.saveEdit',['id' => $category->id ])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ !empty(old('name')) ? old('name') : $category->name}}">
                        @error('name')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Đường dẫn</label>
                        <input class="form-control" type="text" name="slug" id="slug"
                            value="{{ !empty(old('slug')) ? old('slug') : $category->slug}}">
                        @error('slug')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Danh mục gốc</label>
                        <select name="parent_id" id="parent_id" class="form-control select2_add">
                            <option value="0">-- không --</option>
                            @foreach ($categories as $item)
                            <option {{$item->id == $category->parent_id ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div classs="form-group">
                        @php
                            $arr_id_property = [];
                            if ($category->properties) {
                                foreach ($category->properties as $key => $value) {
                                    $arr_id_property[] = $value->id;
                                };
                            }
                        @endphp

                        <label for="properties">Thuộc tính</label>
                        <select class="properties_select2 form-control" name="properties[]" multiple="multiple">
                            @foreach ($properties as $property)
                                <option {{in_array($property->id, (array)$arr_id_property) ? 'selected' : ''}} value="{{$property->id}}">{{$property->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <div id="box-img" class="box-img gallery2">
                            @if (!empty($category->image))
                                <div class="img2">
                                    <img src="{{$category->image}}" alt="image" style="width:300px">
                                    <input type="hidden" name="image" value="{{$category->image}}">
                                </div>
                            @endif
                        </div>
                        <a class="btn btn-primary choose_image_product" id="choose_image_product">Chọn ảnh</a>
                    </div>
                    <div class="form-group" style="margin-top:20px">
                        <button class="btn btn-success" type="submit">Cập nhập</button>
                        <a href="{{route('admin.categories.index')}}" class="btn btn-danger">Hủy</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    
</div>









<!----- javascript here -------->
@section('js')

<script>
    
    jQuery('body').on('click', '#choose_image_product', function () {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files;
                    file.forEach(function (e) {
                        var url = e.getUrl();
                        jQuery('#box-img').html(`
                                <div class="img2">
                                    <img src="${url}" alt="image" style="width:300px">
                                    <input type="hidden" name="image"
                                        value="${url}">
                                    
                                </div>
								`)
                    });
                });
            }
        });
    });
    
    $(document).ready(function() {
        $('.properties_select2').select2();
    });
</script>
<script>
    $(function () {
        $('body').on('click', '#choose_image', function(){
        var choose = $(this);
        CKFinder.popup( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    
                    var file_name = file.getUrl();
                    $('#thumbnail').val(file_name);

                    $('#this-img').show();
                    $('img#this-img').attr('src',file_name);
                    });
                }
            });

        })
        
        $('#name').on('keyup', function () {
            ChangeToSlug('name', 'slug');
        })
        

        $(document).ready(function() {
            $('.select2_add').select2();
        });


    })


    

</script>

@endsection
<!----- end javascript here -------->

@endsection