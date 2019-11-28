@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Liên hệ
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-4">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm mới liên hệ
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
                        <label for="content">Nội dung</label>
                        <input type="text" class="form-control" placeholder="Nội dung liên hệ có thể trống" name="content" value="<?php if(isset($json['content'])){echo $json['content']; } ?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Số điện thoại</label>
                        <input  class="form-control" type="text" name="phone"
                            value="<?php if(isset($json['phone'])){echo $json['phone']; } ?>" placeholder="Số điện thoại">
                        <div class="text-danger error_name" id="error_name"></div>
                    </div>
                    @if($errors->has('phone'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </div>
                    @endif
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
                    Số điện thoại của bạn
                </h3>
                @if (session('add_success'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible show" role="alert">
                            <strong>{{ session('add_success') }}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">{{ session('add_success') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                @if (session('del_success'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible show" role="alert">
                            <strong>{{ session('del_success') }}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">{{ session('del_success') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
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
                        @if (!empty($json['phone']))
                        <p>Nội dung: {{ $json['content'] }}</p>
                        <p>Liên hệ: <span style="color:red;margin-right:10px;">{{ $json['phone'] }}</span>
                            <a href="/admin/options/del_hotline" class="btn btn-danger">Xóa</a>
                        </p>
                        @endif
                    </table>
                </div>
                <!-- end content here -->
            </div>
        </div>
    </div>
</div>
<!-- end main content -->
@endsection
