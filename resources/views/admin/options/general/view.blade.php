@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Liên hệ
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-12">


        <div class="alert alert-success alert-dismissible show" role="alert">
            <strong>
                
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))
                            {{ Session::get('alert-' . $msg) }}
                            @endif
                        @endforeach
                    </div> <!-- end .flash-message -->
                
            </strong> 
        </div>

        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thiết lập chung
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
                   
                    <div class="main-option container">
                        <div class="form-group">
                            <label for="name">Tên website</label>
                            <input  class="form-control inline-block width-50 marginleft-30 form-float-right" type="text" name="general_name_site" value="{{ $data['name_site'] }}">
                            <div class="text-danger error_name" id="error_site_name"></div>
                        </div>

                        <div class="form-group">
                            <label for="name">Mô tả ngắn website</label>
                            <input  class="form-control inline-block width-50 marginleft-30 form-float-right" type="text" name="general_description_site" value="{{ $data['desc_site'] }}">
                            <div class="text-danger error_name" id="error_site_desc"></div>
                        </div>

                        <div class="form-group">
                            <label for="name">Header code</label>
                            <textarea cols="30" rows="8"  class="form-control inline-block width-50 marginleft-30 form-float-right" type="text" name="general_header_code">{{ $data['header_code'] }}</textarea>
                            <div class="text-danger error_name" id="error_site_desc"></div>
                        </div>

                        <div class="form-group">
                            <label for="name">Footer code</label>
                            <textarea cols="30" rows="8" class="form-control inline-block width-50 marginleft-30 form-float-right" type="text" name="general_footer_code">{{ $data['footer_code'] }}</textarea>
                            <div class="text-danger error_name" id="error_site_desc"></div>
                        </div>
                        
                
                        <div class="form-group" style="margin-top:20px">
                            <button class=" btn btn-success" type="submit">Lưu</button>
                        </div>

                    </div>
                </form>
                <!-- end content here -->
            </div>
        </div>
    </div>

</div>
<!-- end main content -->
@endsection
