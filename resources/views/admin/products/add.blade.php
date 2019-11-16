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
        height: 65px;
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
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="">Đường dẫn sản phẩm</label>
                <input class="form-control" type="text" name="slug" id="slug" placeholder="">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Giá</label>
                        <input type="number" class="form-control price" id="price">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Giá khuyến mãi</label>
                        <input type="number" class="form-control price" id="sale_price">
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
                <textarea class="form-control" id="description2" name="description2" id="" cols="40"
                    rows="20"></textarea>
            </div>

        </div>
        <div class="col-md-4">
            <hr class="hr hrhr" style="display:none">
            <div class="form-group">
                <label for="">Trạng thái sản phẩm</label>
                <select name="status" id="status" class="status form-control select2">
                    <option value="">Còn hàng</option>
                    <option value="">Hết hàng</option>
                    <option value="">Khuyến mại</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Danh mục sản phẩm</label>
                <select  name="category_id" id="category_id" class="category_id form-control select2">
                        <option value="">--Chọn--</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                <div>
                    <div class="filter"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Màu sắc</label>
                <select multiple class="form-control select2" name="color_id" id="color_id">
                    <option value="">Đỏ</option>
                    <option value="">Vàng</option>
                    <option value="">Đen</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Thư viện ảnh</label>
                <div class="gallery">
                    <div class="img">
                        <img src="http://kazumi2.linhlatin.com/assets/uploads/files/4.jpg" alt="image">
                        <input type="hidden" name="gallery[]"
                            value="http://kazumi2.linhlatin.com/assets/uploads/files/4.jpg">
                        <i class="fa fa-times"></i>
                    </div>

                    <div class="img">
                        <img src="http://kazumi2.linhlatin.com/assets/uploads/files/4.jpg" alt="image">
                        <input type="hidden" name="gallery[]"
                            value="http://kazumi2.linhlatin.com/assets/uploads/files/4.jpg">
                        <i class="fa fa-times"></i>
                    </div>

                    <div class="img">
                        <img src="http://kazumi2.linhlatin.com/assets/uploads/files/4.jpg" alt="image">
                        <input type="hidden" name="gallery[]"
                            value="http://kazumi2.linhlatin.com/assets/uploads/files/4.jpg">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <span class="choose_gallery btn btn-sm btn-primary">Thêm ảnh</span>
            </div>
            <div style="margin-top: 40px;" class="mt-2">
                <button type="submit" class="btn btn-success">Lưu</button>
                <button type="submit" class="btn btn-danger">Huỷ</button>
            </div>
        </div>





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
    $(function () {
        $('.select2').select2();
    })
    $(function () {
        CKEDITOR.replace( 'description2', {
        } );
    })

    $(function() {
        var json_value = `<?php echo json_encode($categories) ?> `;

        var object_current;
        

        $(document).on('change','#category_id',function() {
            id = $(this).val();
            var html = 'Chọn giá trị lọc';
            object_decode  = JSON.parse(json_value);
            object_current = object_decode.filter(function (object_decode) { return object_decode.id == id });
            
            // console.log(object_current[0]);
            object_current[0].properties.forEach(element => {
                html += `<div>${element.name}</div>`;
                element.property_values.forEach(element2 => {
                    html += `<input type="radio"  name="${element.slug}" id="${element2.slug}" value="${element2.id}"> <lable style="margin-right: 10px;" for="${element2.slug}">${element2.name}</lable>`;
                });
            });

            $('.filter').html(html);
            
        });
    })

</script>
@endsection