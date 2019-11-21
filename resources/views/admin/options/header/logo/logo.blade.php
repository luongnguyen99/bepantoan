@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Logo
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-4">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm mới logo
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
                   
                    <div class="col-md-12">
                        <div   class="form-group text-center" ninh='123'>
                            <input type="button" class="btn btn-info" id="add" name="action"
                                value="Chọn ảnh">
                            <input id="img_" type="hidden" name="img[]" value="">
                            <input type="hidden" name="list_img" id="list-img"
                                value='<?php echo isset($_POST['list_img']) ? $_POST['list_img'] : '' ?>'>
                        </div>
                       
                        <div class="col-sm-12 text-center" id="img-cat">
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
                    Logo của bạn
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
                    <table class="table table-hover table-striped " id="table-categories">
                        <div class="text-center " >
                            <img style="max-width:100%" class="img-fluid" src="{{ $db->value }}"  height="100" alt="">
                        </div>
                        
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
    jQuery('body').on('click', '#add', function () {
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
                            "' class='img-cat' width='200' height='200'/></div>";
                        $('#img_').val(new_url_);
                    }
                    arr_url = JSON.stringify(arr_url);

                    t.closest('.col-md-12').find('#list-img').eq(0).val(arr_url);
                    
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
</script>
@endsection