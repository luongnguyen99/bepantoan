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
                    Sửa phương thức thanh toán
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
                    
                  <div class="form-group">
                    <div>
                        <div data-repeater-item>
                            <label>Phương thức</label>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input type="text" name="type" value="{{ $result['type'] }}" class="form-control" id="exampleInputPassword4"
                                        placeholder="Phương thức" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
               
                    <div class="form-group" style="margin-top:20px">
                        <button class=" btn btn-success" type="submit">Lưu</button>
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
                                @if (!empty($json))
                                @foreach ($json as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{  $item['type'] }}</td>
                                    <td>
                                        <a href="/admin/options/edit_payment/{{ $key }}" class="btn btn-warning">Sửa</a>
                                        <a href="/admin/options/del_payment" class="btn btn-danger">Xóa</a>
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
