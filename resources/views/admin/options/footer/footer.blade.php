@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Thiết lập footer
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
<!-- main content -->
<div class="container">
    <div class="row">
    <form method="post" action="{{ route('admin.options.add_footer') }}">
    @csrf
        <div class="col-sm-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        Khối 1
                    </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <!--  content here -->
                    <div class="form-group">
                        {{-- {{ $footer['block1'] }} --}}
                        <textarea class="form-control" name="block1" id="editor" rows="3"><?php  echo $footer['block1']  ?></textarea>
                    </div>
                    
                    <!-- end content here -->
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        Khối 2
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <!--  content here -->
                        <div class="form-group">
                            {{-- {{ $footer['block2'] }} --}}
                            <textarea class="form-control" name="block2" id="editor1" rows="3"><?php  echo $footer['block2']  ?></textarea>
                        </div>
                        
                    <!-- end content here -->
                </div>
                
            </div>
        </div>
        <div class="col-sm-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        Khối 3
                    </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <!--  content here -->
                        <div class="form-group">
                            {{-- {{ $footer['block3'] }} --}}
                            <textarea class="form-control" name="block3" id="editor2" rows="3"><?php  echo $footer['block3']  ?></textarea>
                        </div>
                        
                    <!-- end content here -->
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        Khối 4
                    </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <!--  content here -->
                        <div class="form-group">
                            <label for="name">Nội dung</label>
                            {{-- {{ }} --}}
                            <textarea class="form-control" name="block4" id="editor3" rows="3"><?php  echo $footer['block4']  ?></textarea>
                        </div>
                        
                        {{-- <div class="form-group">
                            
                            <textarea class="form-control" name="" id="" rows="4">asdsa</textarea>
                            @if (!empty($json['footer']))
                                <div class="text-center" style="margin-top:5px;">
                                    <a href="/admin/options/del_footer" class="btn btn-danger">Xóa</a>
                                </div>
                            @endif
                        </div> --}}
                    <!-- end content here -->
                </div>
            </div>
            
        </div>
        <div class="col-sm-10 text-center">
            <input type="submit" class="btn btn-success" value="Lưu khối">
            <a href="/" target="blank" class="btn btn-success">Xem</a>
        </div>
        </div>
    </form>
</div>
@endsection
@section('js')
<script>
    CKEDITOR.replace('editor');
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');

</script>
<script src="{{ asset('assets/js/jquery.repeater.js') }}"></script>
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
    });
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
                        CKEDITOR.instances.editor.insertHtml("<img src='"+ ninh + "'>");
                    }
                    
                    arr_url = [];
                });
            }
        });
        });
    var arr_url_bock2 = [];
    jQuery('body').on('click', '#add_img_bock2', function () {
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
                        
                        arr_url_bock2.push(mul[i].getUrl());

                    }
                
                    for (var i = 0; i < arr_url_bock2.length; i++) {
                        
                        var base_url = window.location.origin;
                        let arr_url = mul[i].getUrl();
                        var urlParts = arr_url.replace('http://', '').replace('https://', '')
                                                    .split(/[/?#]/);
                        var ninh = base_url +'/'+urlParts[1]+ '/'+urlParts[2]+'/'+urlParts[3];
                        CKEDITOR.instances.editor1.insertHtml("<img src='"+ ninh + "'>");
                    }
                    
                    arr_url_bock2 = [];
                });
            }
        });
        });
        var arr_url_bock3 = [];
    jQuery('body').on('click', '#add_img_bock3', function () {
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
                        
                        arr_url_bock3.push(mul[i].getUrl());

                    }
                
                    for (var i = 0; i < arr_url_bock3.length; i++) {
                        
                        var base_url = window.location.origin;
                        let arr_url = mul[i].getUrl();
                        var urlParts = arr_url.replace('http://', '').replace('https://', '')
                                                    .split(/[/?#]/);
                        var ninh = base_url +'/'+urlParts[1]+ '/'+urlParts[2]+'/'+urlParts[3];
                        CKEDITOR.instances.editor2.insertHtml("<img src='"+ ninh + "'>");
                    }
                    
                    arr_url_bock3 = [];
                });
            }
        });
        });
        var arr_url_bock3 = [];
    jQuery('body').on('click', '#add_img_bock4', function () {
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
                        
                        arr_url_bock3.push(mul[i].getUrl());

                    }
                
                    for (var i = 0; i < arr_url_bock3.length; i++) {
                        
                        var base_url = window.location.origin;
                        let arr_url = mul[i].getUrl();
                        var urlParts = arr_url.replace('http://', '').replace('https://', '')
                                                    .split(/[/?#]/);
                        var ninh = base_url +'/'+urlParts[1]+ '/'+urlParts[2]+'/'+urlParts[3];
                        CKEDITOR.instances.editor3.insertHtml("<img src='"+ ninh + "'>");
                    }
                    
                    arr_url_bock3 = [];
                });
            }
        });
    });
</script>
@endsection
