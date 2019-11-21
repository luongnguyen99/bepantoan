@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Slide
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('client/css/w3.css') }}">
    <style>
    .mySlides {display:none;}
    </style>
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-5">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm Slide
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <form id=create_category method="post" class="repeater">
                    @csrf

                    <div class="form-group">
                        <div data-repeater-list="table[content]">
                            <div data-repeater-item>
                                <label>Thêm Slide</label>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-left:-15px">
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            <input value="" type="text" name="type" class="form-control" id="exampleInputPassword4"
                                            placeholder="Đường dẫn">
                                        </div>
                                        <div class="parent col-lg-3 col-md-3 col-sm-3 text-left">
                                            <a type="button" class="btn btn-info add" name="action"
                                            value="">Chọn ảnh</a>
                                        </div>
                                        <div class="single-img text-left" id="img-cat"></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <input style="margin-top:10px;" data-repeater-create type="button" class="btn btn-info"
                            value="Thêm" />
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
    <div class="col-sm-7">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách slide của bạn
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
                    
                    @if ($db != null)
                   
                    @foreach ($db[0] as $key=>$item)
                    
                    <div  style="position: relative;">
                        <a href="{{ $item['type'] }}">
                            <img class="mySlides" src="{{ $item['img_'] }}" style="width:100%">
                            <a href="/admin/options/edit_slide/{{ $key }}" style="position: absolute; right:0;top:0" href="" class="btn btn-warning">Sửa slide</a>
                        </a>
                        
                    </div>
                    @endforeach
                    
                    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                    @else
                    <p>Chưa có dữ liệu</p>
                    @endif
                <!-- end content here -->
            </div>
        </div>
    </div>
</div>

<!-- end main content -->
@endsection
@section('js')
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
        jQuery(".edit-menu").click(function (e) {
            e.preventDefault();
            jQuery(this).parent().parent().addClass("editing");
            var name = jQuery(this).parent().parent().data("name"),
                link = jQuery(this).parent().parent().data("link");
            jQuery("#modal-menu .edit-name").val(name);
            jQuery("#modal-menu .edit-link").val(link);
            $('#modal-menu').modal('show');
        });
    })
    jQuery('body').on('click', '.add', function () {
        // console.log("sss");
            // var arr_url =($('#list-img').val()=='')?[]:($('#list-img').val());
            var t = $(this);
            var arr_url = (t.closest('.col-md-12').find('#list-img').val() == '') ? [] : (t.closest('.col-md-12')
                .find('#list-img').val());

            if (typeof (arr_url) == 'string') {
                //console.log(arr_url);
                arr_url = arr_url.replace(/\[/g, '');
                arr_url = arr_url.replace(/\]/g, '');
                arr_url = arr_url.replace(/"/g, '');
                arr_url = (arr_url == '') ? [] : arr_url.split(",");
                //arr_url = arr_url.split(",");
            }
            CKFinder.popup({
                resourceType: "Images",
                chooseFiles: true,
                onInit: function (finder) {
                    finder.on('files:choose', function (evt) {
                        //var arr_url = [];
                        var mul = evt.data.files;
                        mul = Object.entries(mul);
                        mul = mul[1];
                        mul = mul[1];

                        var list_img = '';
                        var arr_url_ = [];
                        
                        for (var i = mul.length - 1; i >= 0; i--) {

                            let url_ = mul[i].getUrl();
                            var urlParts = url_.replace('http://','').replace('https://','').split(/[/?#]/);
                            var domain = urlParts[0];
                            let port = 8000;

                            let new_domain = domain + ":" + port;
                            
                            let new_url_ = url_.replace(domain , new_domain);

                            
                            
                            list_img = "<div class='single-img text-left'><i class='fa fa-remove delete-img' data-url='" +
                                    new_url_ + "'></i><img alt='' src='" + new_url_ +
                                "' class='img-cat' width='200' height='200'/></div><input type='hidden' value='"+new_url_+"' name='img_'>";
                            
                        }
                        arr_url = JSON.stringify(arr_url);

                        // t.closest('.col-md-12').find('#list-img').eq(0).val(arr_url);
                        
                        t.closest('.col-md-12').find('#img-cat').html(list_img);

                        
                    });
                }
            });
        });
    $('body').on('click', '.delete-img', function () {
        var image = $(this).data('url');
        $(this).parent().remove();

        var string = $('#list-img').val();
        var string_arr = JSON.parse(string);
        console.log(string_arr);

        string_arr = jQuery.grep(string_arr, function (value) {
            return value !== image;
        });
        console.log(string_arr);

        var final_string = JSON.stringify(string_arr);
        $('#list-img').val(final_string);
    });
    //slide
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
    showDivs(slideIndex += n);
    }

    function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
    }

</script>
@endsection
