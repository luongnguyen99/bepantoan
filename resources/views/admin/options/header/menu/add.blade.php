@extends('admin.layout.master')
{{-- page title --}}
@section('page_title','Menu')


@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection
@section('content')
<div class="row">
        <div class="col-sm-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        Danh sách Menu
                    </h3>
    
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                            data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <!--  content here -->
                    <form method="post" action="{{ route('admin.options.add.menu') }}">
                            @csrf
                            
                            <div class="form-group">
                                <label for="exampleInputUsername1" style="font-weight:bold" for="menu_name">Tiêu đề</label>
                                <input style="padding:8px;" size="100" type="text" id="menu_name" name="menu_name" class="form-control" id="exampleInputUsername1" placeholder="Tiêu đề">
                            </div>
    
                            <div class="form-group">
                                <label for="exampleInputUsername1" style="font-weight:bold" for="menu_link">Đường dẫn</label>
                                <input style="padding:8px;" size="100"  type="text" id="menu_name" name="menu_link" class="form-control" id="exampleInputUsername1" placeholder="Đường dẫn">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1" style="font-weight:bold" for="menu_icon">Icon</label>
                                <input style="padding:8px;" size="100"  type="text" id="menu_icon" name="menu_icon" class="form-control" id="exampleInputUsername1" placeholder="Icon">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1" style="font-weight:bold" for="menu_link">Class</label>
                                <input style="padding:8px;" size="100"  type="text" id="menu_class" name="menu_class" class="form-control" id="exampleInputUsername1" placeholder="Class có thể để trống">
                            </div>
    
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary waves-effect waves-light" name="add_menu"
                                    value="Thêm mới">
                                <a class="support_click btn btn-success" href="#modal-menu">Hướng dẫn nhập</a>
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
                        Danh sách menu của bạn
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
    
                       
                        <div class="row">
                            <div class="col-md-12">
        
                                <div class="col-sm-12">
                                    <div class="dd list-menu" id="nestable">
                                        @php
                                        if (empty($showMenu)) {
                                        echo 'Chưa có menu';
                                        }
                                        else{
                                        echo $showMenu;
                                        }
                                        @endphp
                                    </div>
                                    <form action="{{ route('admin.options.update.menu') }}" method="post">
                                        @csrf
                                        <textarea style="display:none" id="nestable-output" name="menu_content" rows="3"
                                            class="form-control hidden"></textarea>
                                        <div class="form-group text-center">
                                            <input type="submit" class="btn btn-primary" id="save-menu" name="save_menu"
                                                value="Cập nhật" disabled />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<div id="modal-menu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: flex">
                <h4 class="modal-title" id="editModalLabel" style="width: 50%">Cập nhật menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="width: 50%; text-align: right">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Tên hiển thị</label>
                    <div class="col-sm-9">
                        <input type="text" name="" class="form-control edit-name" placeholder="Tên hiển thị"
                            required />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Đường dẫn</label>
                    <div class="col-sm-9">
                        <input type="text" name="" class="form-control edit-link" placeholder="Đường dẫn"
                            required />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Icon</label>
                    <div class="col-sm-9">
                        <input type="text" name="" class="form-control edit-icon" placeholder="Icon"
                            required />
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Class</label>
                    <div class="col-sm-9">
                        <input type="text" name="" class="form-control edit-clss" placeholder="Class"
                            required />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-primary modal-dismiss save-edit-menu" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="support" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: flex">
                <h4 class="modal-title" id="editModalLabel" style="width: 50%">Thêm phương thức thanh toán</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="width: 50%; text-align: right">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="color:red;font-size:18px;font-weight:bold">Bước 1: </p>
                <p>Click <a target="blank" href="https://themes-pixeden.com/font-demos/7-stroke/">vào đây</a> để chọn icon bạn muốn hiển thị lên phần phương thức thanh toán của website</p>
                <div style="width:500px">
                    <img src="{{ url('client/img/menu_support1.PNG') }}"style="max-width:100%" heigh="20px" alt="">
                </div>
                <p style="color:red;font-size:18px;font-weight:bold">Bước 2: </p>
                <div>
                    <p>Sau đó chọn bất kì icon nào bạn muốn</p>
                    <img src="{{ url('client/img/menu_support2.PNG') }}" alt="">
                    <p>Và sao chép phần chữ bên dưới của ảnh <span style="color:red">"pe-7s-album"</span></p>
                    <p style="color:red;font-size:18px;font-weight:bold">Bước 3: </p>
                    <p>Tiếp theo sao chép vào phần icon thức và bấm lưu</p>
                    <img src="{{ url('client/img/menu_support3.PNG') }}" alt="">
                </div>
            </div>

        </div>
    </div>
</div>


<!-- /.box-header -->


@endsection
@section('js')
<script src="{{ asset('assets/js/jquery.nestable.js') }}"></script>
<script>
    jQuery(document).ready(function ($) {

        jQuery(".edit-menu").click(function (e) {
            e.preventDefault();
            jQuery(this).parent().parent().addClass("editing");
            var name = jQuery(this).parent().parent().data("name"),
                link = jQuery(this).parent().parent().data("link"),
                icon = jQuery(this).parent().parent().data("icon"),
                clss = jQuery(this).parent().parent().data("clss");

            jQuery("#modal-menu .edit-name").val(name);
            jQuery("#modal-menu .edit-link").val(link);
            jQuery("#modal-menu .edit-icon").val(icon);
            jQuery("#modal-menu .edit-clss").val(clss);
            $('#modal-menu').modal('show');
        });

        jQuery(".exit-modal").click(function () {
            jQuery(this).parents("body").find(".editing").removeClass("editing");
        });

        (function ($) {
            jQuery(".save-edit-menu").click(function () {
                var name = jQuery(this).parents("#modal-menu").find(".edit-name").val(),
                    link = jQuery(this).parents("#modal-menu").find(".edit-link").val();
                   
                var icon = jQuery(this).parentsUntil("#model-menu").find(".edit-icon").val(),
                    clss = jQuery(this).parentsUntil("#model-menu").find(".edit-clss").val();
                    
                jQuery(".dd-item.editing").data("name", name);
                jQuery(".dd-item.editing").data("link", link);
                jQuery(".dd-item.editing").data("icon", icon);
                jQuery(".dd-item.editing").data("clss", clss);

                jQuery(".dd-item.editing>.dd-handle").html(name);
                jQuery(".dd-item.editing").removeClass("editing");
                updateOutput($('#nestable').data('output', $('#nestable-output')));
                jQuery("#save-menu").prop("disabled", false); // Element(s) are now enabled.
            });

            jQuery(".remove-menu").click(function (e) {
                e.preventDefault();
                if (confirm("Xóa menu này và các phần tử bên trong?")) {
                    jQuery(this).parent().parent().remove();
                    updateOutput($('#nestable').data('output', $('#nestable-output')));
                    $("#save-menu").prop("disabled", false); // Element(s) are now enabled.
                }
            });

            'use strict';

            /*
            Update Output
            */
            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            /*
            Nestable 1
            */
            $('#nestable').nestable({
                group: 1
            }).on('change', function () {
                $("#save-menu").prop("disabled", false); // Element(s) are now enabled.
                updateOutput($('#nestable').data('output', $('#nestable-output')));
            });

            /*
            Output Initial Serialised Data
            */
            $(function () {
                updateOutput($('#nestable').data('output', $('#nestable-output')));
            });
        }).apply(this, [jQuery]);

        jQuery(".support_click").click(function (e) {
            e.preventDefault();
            jQuery(this).parent().parent().addClass("editing");
            var name = jQuery(this).parent().parent().data("name"),
                link = jQuery(this).parent().parent().data("link");
            jQuery("#support .edit-name").val(name);
            jQuery("#support .edit-link").val(link);
            $('#support').modal('show');
        });
    });

</script>
@endsection




