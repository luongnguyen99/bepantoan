@extends('admin.layout.master')

@section('page_title')
Thiết lập SEO
@endsection



@section('content')
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

<div class="box">
    <div class="box-header">
        {{-- <h3 class="box-title"> @yield('title') </h3> --}}
    </div>
    @php
        $seo_title_home = get_option_by_key('seo_title_home');
        $seo_description_home = get_option_by_key('seo_description_home');
        $seo_keyword_home = get_option_by_key('seo_keyword_home');
        $block_robot_google_home = get_option_by_key('block_robot_google_home');
        $block_robot_google = get_option_by_key('block_robot_google');
    @endphp
    <div class="box-body">
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">SEO trang chủ</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Chặn robots google</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label for="seo_title_home">Tiêu đề</label>
                        <input form="form_submit" class="form-control" name="seo_title_home" value="{{!empty($seo_title_home) ? $seo_title_home : '' }}" placeholder="Seo tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="seo_keyword_home">Từ khóa</label>
                            <input form="form_submit" class="form-control" name="seo_keyword_home" value="{{!empty($seo_keyword_home) ? $seo_keyword_home : ''}}" placeholder="Từ khóa">
                        </div>
                        <div class="form-group">
                            <label for="seo_description_home">Mô tả</label>
                            <textarea name="seo_description_home" class="form-control" id="seo_description_home" cols="30" form="form_submit" rows="10">{{!empty($seo_description_home) ? $seo_description_home : ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Chặn robot google</label><br>
                            <label class="switch">
                                <input type="checkbox" {{!empty($block_robot_google_home) ? 'checked' : ''}} form="form_submit" name="block_robot_google_home">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <label for="">Chặn robot google <span style="color:red;font-weight:400">(Ảnh hưởng đến toàn trang)</span></label><br>
                            <label class="switch">
                                <input type="checkbox" {{!empty($block_robot_google) ? 'checked' : ''}} form="form_submit" name="block_robot_google">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                   
                    <!-- /.tab-pane -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <form method="POST" id="form_submit" action="{{route('admin.options.seo_setting')}}" style="margin-left: 10%;margin-top: 10%;">
                @csrf
                <input type="submit" value="Lưu" class="btn btn-primary">
            </form>
        </div>
    </div>
    
    <!-- /.box-footer-->
</div>
@endsection

@section('js')

@endsection