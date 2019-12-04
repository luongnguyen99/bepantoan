@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Thiết lập chi tiết sản phẩm
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">  
@endsection

@section('content')
<!-- main content -->
<div class="container">
    <div class="row">
        <div class="col-sm-11" style="margin-left:-20px;">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        Thiết lập chi tiết sản phẩm
                    </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <!--  content here -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Sale</a></li>
                        <li><a data-toggle="tab" href="#menu1">Tổng đài tư vấn</a></li>
                        <li><a data-toggle="tab" href="#menu2">Sidebar</a></li>
                        <li><a data-toggle="tab" href="#menu3">Phương thức thanh toán</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="col-sm-6">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            Thêm mới tin khuyến mãi
                                        </h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                                data-toggle="tooltip" title="" data-original-title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <!--  content here -->
                                        <form id=create_category method="post" action="{{ route('admin.options.sale') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="name">Nội dung</label>
                                                <textarea name="sale" class="form-control" name="" id="editor" rows="3">
                                               </textarea>
                                               @if($errors->has('sale'))
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>{{ $errors->first('sale') }}</strong>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="form-group" style="margin-top:20px">
                                                <button class=" btn btn-success" type="submit">Lưu</button>
                                            </div>
                                        </form>
                                        <!-- end content here -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            Nội dung khuyến mãi
                                        </h3>
                                        @if (session('sale_success'))
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-success alert-dismissible show" role="alert">
                                                    <strong>{{ session('sale_success') }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">{{ session('sale_success') }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if (session('sale_danger'))
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-success alert-dismissible show" role="alert">
                                                    <strong>{{ session('sale_danger') }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">{{ session('sale_danger') }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                                data-toggle="tooltip" title="" data-original-title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <!--  content here -->
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped text-center"
                                                id="table-categories">
                                                <label for="name">Nội dung</label>
                                                @if (!empty($sale))
                                                <textarea class="form-control text-left" name="" id="editor1" rows="3">
                                                    {{ $sale }}
                                                </textarea>
                                                <br>
                                                <a href="{{ asset('admin/options/del_sale') }}" class="btn btn-danger">Xóa</a>
                                                @else
                                                <p>Chưa có dữ liệu</p>
                                                @endif
                                            </table>
                                        </div>
                                        <!-- end content here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class="col-sm-6">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            Thêm mới số tổng đài của bạn
                                        </h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                                data-toggle="tooltip" title="" data-original-title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <!--  content here -->
                                        <form id=create_category method="post" action="{{ route('admin.options.switchboard') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="content">Nội dung</label>
                                                <input class="form-control" type="text" name="content_switchboard">
                                            </div>
                                            @if($errors->has('content_switchboard'))
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>{{ $errors->first('content_switchboard') }}</strong>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="name">Nhập số</label>
                                                <input class="form-control" type="text" name="phone" value="">
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
                            <div class="col-sm-6">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            Tổng đài tư vấn của bạn
                                        </h3>
                                        @if (session('switchboard_success'))
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-success alert-dismissible show" role="alert">
                                                    <strong>{{ session('switchboard_success') }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">{{ session('switchboard_success') }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @if (session('switchboard_danger'))
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-success alert-dismissible show" role="alert">
                                                    <strong>{{ session('switchboard_danger') }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">{{ session('switchboard_danger') }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                                data-toggle="tooltip" title="" data-original-title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <!--  content here -->
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped text-center"
                                                id="table-categories">
                                                @if (!empty($switchboard))
                                                <?php $sb = json_decode($switchboard,true) ?>
                                                <p>
                                                    Nội dung: <p>{{ $sb['content'] }}</p>
                                                </p>
                                                <p>Liên hệ: <span
                                                    style="color:red;margin-right:10px;">{{ $sb['phone'] }}</span>
                                                <a href="/admin/options/del_switchboard" class="btn btn-danger">Xóa</a>
                                                </p>
                                                @else
                                                <p>Chưa có dữ liệu</p>
                                                @endif
                                            </table>
                                        </div>
                                        <!-- end content here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class="col-sm-12">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            Thêm mới sidebar
                                        </h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                                data-toggle="tooltip" title="" data-original-title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <!--  content here -->
                                        <form method="post" class="repeater" action="{{ route('admin.options.sidebar') }}">
                                            @csrf
                                            @if (!empty($sidebar))
                                                @foreach ($sidebar as $item)
                                                    <div class="del_form">
                                                        <label>Sidebar</label>
                                                        <div class="row">
                                                            <div class="col-lg-5 col-md-5 col-sm-5">
                                                                <input type="text" name="text[]" class="form-control input_text"
                                                                    id="exampleInputPassword4" value="<?php if(!empty($item['text'])){echo $item['text'];} ?>"
                                                                    placeholder="Nội dung" required>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-5">
                                                            <input type="text" name="icon[]" class="form-control"
                                                                id="exampleInputPassword4" value="<?php if(!empty($item['icon'])){echo $item['icon'];} ?>"
                                                                placeholder="Icon" >
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 click_form">
                                                                <p class=" btn btn-danger">x</p>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                @endforeach
                                                @endif
                                            <div> 
                                                <div data-repeater-list="table[content]">
                                                    <div data-repeater-item class="repeat remove_form_new">
                                                        <label>Sidebar</label>
                                                        <div class="row ">
                                                            <div class="col-lg-5 col-md-5 col-sm-5">
                                                                <input type="text" name="text" class="form-control input_text"
                                                                    id="exampleInputPassword4"
                                                                    placeholder="Nội dung" required>
                                                            </div>
                                                            <div class="col-lg-5 col-md-5 col-sm-5">
                                                            <input type="text" name="icon" class="form-control"
                                                                id="exampleInputPassword4"
                                                                placeholder="Icon" >
                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 del_form_new">
                                                                <p class="btn btn-danger">x</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input style="margin-top:10px;" data-repeater-create type="button"
                                                    class="btn btn-info" value="Thêm" />
                                            </div>

                                            <div class="form-group" style="margin-top:20px">
                                                <button class=" btn btn-success" type="submit">Lưu</button>
                                            </div>
                                        </form>
                                        <!-- end content here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <div class="col-sm-12">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            Danh sách phương thức thanh toán
                                        </h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                                data-toggle="tooltip" title="" data-original-title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <!--  content here -->
                                        <form method="post" class="repeater" action="{{ route('admin.options.method_payment') }}">
                                            @csrf
                                            <div> 
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    
                                                    <textarea class="form-control" name="content" id="editor2" rows="3">
                                                        @if (!empty($payment))
                                                        {{ $payment }}
                                                        @endif  
                                                    </textarea>   
                                                    
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
                        </div>
                    </div>
                </div>
                <!-- end content here -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script> CKEDITOR.replace('editor'); </script>
<script> CKEDITOR.replace('editor1'); </script>
<script> CKEDITOR.replace('editor2'); </script>
<script src="{{ asset('assets/js/jquery.repeater.js') }}"></script>


<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        'use strict';

        $('.repeater').repeater({
            defaultValues: {
                'textarea-input': 'foo',
                'text-input': 'bar',
                'select-input': 'B',
                'checkbox-input': ['A', 'B'],
                'radio-input': 'B'
            },
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {

            }
        });

        window.outerRepeater = $('.outer-repeater').repeater({
            isFirstItemUndeletable: true,
            defaultValues: {
                'text-input': 'outer-default'
            },
            show: function () {
                console.log('outer show');
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                console.log('outer delete');
                $(this).slideUp(deleteElement);
            },
            repeaters: [{
                isFirstItemUndeletable: true,
                selector: '.inner-repeater',
                defaultValues: {
                    'inner-text-input': 'inner-default'
                },
                show: function () {
                    console.log('inner show');
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    console.log('inner delete');
                    $(this).slideUp(deleteElement);
                }
            }]
        });
        $('.repeat').remove();
    });
    $('body').on('click','.click_form',function(){
        var del = $(this).parents('.del_form');
        $(del).remove();
    });
    
    $('body').on('click','.del_form_new',function(){
        var del = $(this).parents('.remove_form_new');
        $(del).remove();
    })
</script>
@endsection
