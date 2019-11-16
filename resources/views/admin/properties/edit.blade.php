@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Sửa thuộc tính
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
                    Sửa thuộc tính
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <form action="{{route('admin.properties.saveEdit',['id' => $property->id ])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên thuộc tính</label>
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ !empty(old('name')) ? old('name') : $property->name}}">
                        @error('name')
                        <span style="color:red">{{$message}}</span>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Cập nhập</button>
                        <a href="{{route('admin.properties.index')}}" class="btn btn-danger">Hủy</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>









<!----- javascript here -------->
@section('js')



@endsection
<!----- end javascript here -------->

@endsection