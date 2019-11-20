@extends('admin.layout.master')

@section('title')
Sản phẩm
@endsection
@section('action')
Thêm mới
@endsection
@section('style')
<style>
    textarea.form-control {
        height: auto;
        height: 182px;
    }

    .text-margin{
        margin: 5px;
    }
    .taxt-margin div{
        font-size: 16px;
    }
    .gallery {
        border: 1px solid #d2d6de;
        width: 100%;
        height: auto;
        padding: 3px;
        margin: 5px 0px;
    }

    .gallery2 {
        border: 1px solid #d2d6de;
        height: auto;
        width: 50%;
        display: flex;
        padding: 3px;
        margin: 5px 0px;
    }

    .gallery .img {
        display: inline-block;
        width: 32%;
        padding: 5px;
        margin-bottom: 10px;
        position: relative;
        height: 100px;
        overflow: hidden;
    }

    .gallery .img img {
        max-width: 100%;
    }

    .gallery .img i {
        position: absolute;
        top: 0;
        right: 0;
        display: inline-block;
        padding: 3px;
        background: #fff;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        border: 1px solid #d2d6de;
        border-radius: 4px;
    }


    .gallery2 .img2 {
        display: inline-block;
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        position: relative;
        height: 65px;
        overflow: hidden;
    }

    .gallery2 .img2 img {
        max-width: 100%;
    }

    .gallery2 .img2 i {
        position: absolute;
        top: 0;
        right: 0;
        display: inline-block;
        padding: 3px;
        background: #fff;
        color: #000;
        font-weight: bold;
        cursor: pointer;
        border: 1px solid #d2d6de;
        border-radius: 4px;
    }

    @media only screen and (max-width: 768px) {

        /* For mobile phones: */
        .hr {
            display: block !important;
        }
    }

    hr {
        border-top: 1px solid #d2d6de !important;
    }
</style>
@endsection

@section('content')

<div class="box">
    <div class="box-header">
        {{-- <h3 class="box-title"> @yield('title') </h3> --}}
    </div>

    <!-- ********** -->
    <div class="box-body">
    <form id="infomation" action="{{route('admin.products.saveAdd')}}" method="POST">
        @csrf
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Tên sản phẩm">
                <span class="errors error_name" style="color:red"></span>
            </div>
            <div class="form-group">
                <label for="">Đường dẫn sản phẩm</label>
                <input class="form-control" type="text" name="slug" id="slug" placeholder="">
                <span class="errors error_slug" style="color:red"></span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="number" class="form-control price" id="price" name="price" min="0">
                        <span class="errors error_price" style="color:red"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Giá khuyến mãi</label>
                        <input type="number" class="form-control price" id="sale_price" name="sale_price" min="0">
                        <span class="errors error_sale_price" style="color:red"></span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea style="height: 100px" class="form-control" name="description" id="" cols="20"
                    rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Chi tiết</label>
                <textarea class="form-control" id="infomation_detail" name="infomation_detail" id="" cols="40"
                    rows="20"></textarea>
            </div>

        </div>
        <div class="col-md-4">
            <hr class="hr hrhr" style="display:none">
            <div class="form-group">
                <label for="">Trạng thái sản phẩm</label>
                <select name="status" id="status" class="status form-control select2">
                    <option value="">Trạng thái</option>
                    <option selected value="1">Còn hàng</option>
                    <option value="-1">Hết hàng</option>
                </select>
                <span class="errors error_status" style="color:red"></span>
            </div>
            <div class="form-group">
                <label for="">Danh mục sản phẩm</label>
                <select  name="category_id" id="category_id" class="category_id form-control select2">
                        <option value="">--Chọn--</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <span class="errors error_category_id" style="color:red"></span>
                <div>
                    <div class="filter"></div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="">Quà tặng</label>
                <div class="repeater0">
                    <div data-repeater-list="gift" class="gift_div">
                        
                    </div>
                    <span class="errors error_gift" style="color:red"></span>
                    <div style="clear: both;width:100%"><a class="btn btn-success add_repeater0" data-repeater-create><i class="fa fa-plus"></i></a></div>
                </div>
            </div>

            <div class="form-group">
                <label for="">Thông số kỹ thuật</label>
                <div class="repeater">
                    <div data-repeater-list="specifications" class="specifications_div"></div>

                    <div style="clear: both;width:100%"> <a class="btn btn-success add_repeater" data-repeater-create><i class="fa fa-plus"></i></a></div>
                </div>
            </div>
            <div class="form-group">
                <label>Thư viện ảnh</label>
                <div class="gallery">
                    
                </div>
                <span class="choose_gallery btn btn-sm btn-primary">Thêm ảnh</span>
            </div>
            <div style="margin-top: 40px;" class="mt-2">
                <button type="submit" class="btn btn-success submit_data">Lưu</button>
                <button type="submit" class="btn btn-danger">Huỷ</button>
            </div>
        </div>
    </form>





    </div>
    <!-- ********** -->
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
</div>
@endsection

@section('js')

<script>
    jQuery('body').on('click', '.choose_gallery', function () {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files;
                    file.forEach(function (e) {
                        var url = e.getUrl();
                        jQuery('.gallery').append(`
                        <div class="img">
                            <img src="${url}" alt="image">
                            <input type="hidden" name="gallery[]" value="${url}">
                            <i class="fa fa-times btn-remove"></i>
                            </div>`)
                        });
                    });
                }
            });
        });

    $(document).on('click','.remove_repeater',function(){
        if(confirm('Chắc chắn xóa')){
            $(this).parents('div.row').remove();
        }
    });

    var i = 9999;var k = 9999;
    $(document).on('click','.add_repeater0',function () {
        $('.gift_div').append(`
        <div class="row" style="display: flex;align-items: flex-start;">
            <div class="col-sm-10">
                <input type="text" name="gift[${k}][value]" value="" placeholder="Ưu đãi" class="form-control" />
                <span class="errors error_gift_${k}_value" style="color:red"></span>
            </div>
            <div class="col-sm-2">
                <a data-repeater-delete class="btn btn-danger remove_repeater"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        `);
        k++;
    });
    $(document).on('click','.add_repeater',function() {
        $('.specifications_div').append(`
            <div class="row" style="display: flex;align-items: flex-start;">
                    <div class="col-sm-5"> 
                        <input type="text" name="specifications[${i}][key]" value="" placeholder="Loại thông số"
                        class="form-control" />
                        <span class="errors error_specifications_${i}_key" style="color:red"></span>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="specifications[${i}][value]"
                        placeholder="Giá trị" value="" class="form-control">
                        <span class="errors error_specifications_${i}_value" style="color:red"></span>
                    </div>
                    <div class="col-sm-2">
                        <a data-repeater-delete class="btn btn-danger remove_repeater"><i class="fa fa-minus"></i></a>
                    </div>   
            </div>
        `);
        i++;
    });

   
    $(function () {
        $('body').on('keyup', '#name', function () {
            ChangeToSlug('name', 'slug');
        });
    })

    $('body').on('click','.img .fa-times',function(){
        var r = confirm("Xóa ảnh này !!!");
        if (r == true) {
            $(this).parents('div.img').remove();
        };
    
    })

    
    $(function () {
        var description = CKEDITOR.replace( 'description', {
        });
    });

    $(function () {
        var infomation_detail = CKEDITOR.replace( 'infomation_detail', {
        });
    })

    $(function() {
        var json_value = `<?php echo json_encode($categories) ?> `;

        var object_current;
        
        
        $(document).on('change','#category_id',function() {
            id = $(this).val();
            
            object_decode  = JSON.parse(json_value);
            object_current = object_decode.filter(function (object_decode) { return object_decode.id == id });
            
            // console.log(object_current[0].properties.length);
            if (object_current[0].properties.length == 0) {
                var html = '';
            }else{
                var html = '<div style="font-size:16px;margin-top: 16px;border-bottom:1px solid black">Chọn giá trị lọc: </div>';
            }
            object_current[0].properties.forEach(element => {
                b = 0;
                html += `<div class="text-margin" style="font-size: 16px;">${element.name}</div>`;
                element.property_values.forEach(element2 => {
                    html += `<input type="radio" ${b == 0 ? 'checked' : ''} name="value_property[${element.slug}]" id="${element2.slug}" value="${element2.id}"> <lable style="margin-right: 10px;" for="${element2.slug}">${element2.name}</lable>`;b++;
                });
            });

            $('.filter').html(html);
            
        });
    })


   

    $('body').on('submit','#infomation',function(e) {
        e.preventDefault();
        var infomation = new FormData($('form#infomation')[0]);
    
        var description = CKEDITOR.instances.description.getData();
        var infomation_detail = CKEDITOR.instances.infomation_detail.getData(); 
        infomation.append('description', description);
        infomation.append('infomation_detail', infomation_detail);

        $.ajax({
            url: "{{route('admin.products.saveAdd')}}",
            method: 'post',
            processData: false,
            contentType: false,
            data: infomation,
        }).done(
            result => {
                // console.log(result);
                if (result.errors == true) {
                    var msg = result.messages;
                    var msg_keys = Object.keys(msg);
                   
                    $('body').find('.errors').html('');
                    console.log(msg_keys);
                    msg_keys.forEach(function (item, index) {
                        var ele = 'error_' + item;
                        var ele = ele.replace(new RegExp('\\.', 'g'), '_');
                        if (typeof msg[item] == "object") {
                            $('body').find('.' + ele).html(msg[item]);
                        } else {
                            $('body').find('.' + ele).html('');
                        }
                    });

                } else {
                    swal({
                        title: "Thành công!",
                        text: "Thêm sản phẩm thành công!",
                        icon: "success",
                        button: "OK",
                    }).then(function () {                  
                        window.location.href = `{{route('admin.products.index')}}`;            
                    });
                }
            });
    });
        
    
   

</script>
@endsection