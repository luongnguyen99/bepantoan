@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Status Order
@endsection
@section('content')
<!-- main content -->
<div class="row">
    <div class="col-sm-5">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm mới 
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
                                <label>Order</label>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <input type="text" name="name" class="form-control" id="exampleInputPassword4"
                                            placeholder="Order" >
                                    </div>
                                </div>
                            </div>
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
    <div class="col-sm-7">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Danh Sách Order
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
                                <th>Status</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status as $key=>$row)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    <a href="/admin/status_order/edit/{{ $row->id }}" class="btn btn-warning">Sửa</a>
                                    <a href="/admin/status_order/del/{{ $row->id }}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end content here -->
            </div>
        </div>
    </div>
</div>
@endsection
