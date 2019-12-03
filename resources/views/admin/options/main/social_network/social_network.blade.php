@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Mạng xã hội
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-5">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm mạng xã hội
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
                                <label>Thêm ứng dụng</label>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="type" class="form-control" id="exampleInputPassword4"
                                            placeholder="Tên ứng dụng" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input style="margin-top:10px;" data-repeater-create type="button" class="btn btn-info"
                            value="Thêm" />
                    </div>

                    <div class="form-group" style="margin-top:20px">
                        <button class=" btn btn-success" type="submit">Lưu</button>
                        <a class="edit-menu btn btn-success" href="#modal-menu">Hướng dẫn nhập</a>
                        <a href="/" target="blank" class="btn btn-success">Xem</a>
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
                    Danh sách mạng xã hội
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
                @if (session('edit_success'))
                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-success alert-dismissible show" role="alert">
                            <strong>{{ session('edit_success') }}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">{{ session('edit_success') }}</span>
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
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($json != null)
                            @foreach ($json as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{  $item['type'] }}</td>
                                <td>
                                    <a href="/admin/options/edit_social_network/{{ $key }}"
                                        class="btn btn-warning">Sửa</a>
                                    <a href="/admin/options/del_social_network/{{ $key }}"
                                        class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- end content here -->
            </div>
        </div>
    </div>
</div>
<div id="modal-menu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                <p>Click <a target="blank" href="https://fontawesome.com/v4.7.0/icons/">vào đây</a> để chọn icon bạn
                    muốn hiển thị lên phần phương thức thanh toán của website</p>
                <div style="width:500px">
                    <img src="{{ url('client/img/Capture.PNG') }}" style="max-width:100%" heigh="20px" alt="">
                </div>
                <p style="color:red;font-size:18px;font-weight:bold">Bước 2: </p>
                <div>
                    <p>Sau đó chọn bất kì icon nào bạn muốn</p>
                    <img src="{{ url('client/img/Capture1.PNG') }}" alt="">
                    <p>Và sao chép phần trong ngoặc kép <span style="color:red">"fa fa-address-book"</span></p>
                    <p style="color:red;font-size:18px;font-weight:bold">Bước 3: </p>
                    <p>Tiếp theo sao chép vào phần thêm mới phương thức và bấm lưu</p>
                    <img src="{{ url('client/img/Capture3.PNG') }}" alt="">
                </div>
                <div>
                    <p style="color:red;font-size:18px;font-weight:bold">Một số icon mẫu</p>
                    <p>Facebook :<span style="color:red"> fa fa-facebook</span></p>
                    <p>Twitter:<span style="color:red"> fa fa-twitter</span></p>
                    <p>Google:<span style="color:red"> fa fa-google-plus</span></p>
                    <p>Instagram:<span style="color:red"> fa fa-instagram</span></p>
                </div>

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

</script>
@endsection
