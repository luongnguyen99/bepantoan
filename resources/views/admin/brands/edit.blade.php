@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Sửa hãng sản xuất
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
                    Sửa hãng sản xuất
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <form action="{{route('admin.brands.saveEdit',['id' => $brand->id ])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên hãng</label>
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ !empty(old('name')) ? old('name') : $brand->name}}">
                        @error('name')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Đường dẫn</label>
                        <input class="form-control" type="text" name="slug" id="slug"
                            value="{{ !empty(old('slug')) ? old('slug') : $brand->name}}">
                        @error('slug')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Banner</label>
                        <input value="{{ (old('image') ? old('image') :  $brand->image ) }}" readonly min="0" type="hidden" name="image"
                            class="form-control image" id="thumbnail">
                    </div>
                    <button class="btn btn-primary choose_image" id="choose_image" type="button">Chọn ảnh</button>
                    <div class="text-danger error_image" id="error_image"></div>
                    <br>
                    <div class=form-group>
                        <img style="width: auto; max-height: 400px; padding-top: 10px !important" id="this-img"
                            src="{{ (old('image') ? old('image') : $brand->image ) }}" alt="">
                    </div>
                   

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Cập nhập</button>
                        <a href="{{route('admin.brands.index')}}" class="btn btn-danger">Hủy</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>









<!----- javascript here -------->
@section('js')

<script>

</script>
<script>
    $(function () {
    
        
        $('#name').on('keyup', function () {
            ChangeToSlug('name', 'slug');
        })
        

        $(document).ready(function() {
            $('.select2_add').select2();
        });
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
                } );
            }
        } );

    })

    })


    

</script>

@endsection
<!----- end javascript here -------->

@endsection