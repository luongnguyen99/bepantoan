@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Phương thức thanh toán
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-5">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm mới phương thức thanh toán
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
                            <label>Phương thức</label>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="type" class="form-control" id="exampleInputPassword4"
                                        placeholder="Phương thức">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input style="margin-top:10px;" data-repeater-create type="button" class="btn btn-info" value="Thêm" />
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
                    Danh sách loại phương thức thanh toán
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
                    <table class="table table-hover table-striped text-center" id="table-categories">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Kiểu thanh toán</th>
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
                                        <a href="/admin/options/edit_payment/{{ $key }}" class="btn btn-warning">Sửa</a>
                                        <a href="/admin/options/del_payment/{{ $key }}" class="btn btn-danger">Xóa</a>
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
    })
</script>
@endsection