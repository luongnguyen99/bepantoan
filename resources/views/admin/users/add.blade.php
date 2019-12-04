@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Tài Khoản
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap.min.css') }}">
@endsection

{{-- content --}}
@section('content')

    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Chi tiết đặt hàng</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            
                            <form class="col-md-8" method="post" action="">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control"  placeholder="Tên" name="name">
                                </div>
                                @if($errors->has('name'))
                                <div class="alert alert-danger" style="opacity:0.5" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control"  placeholder="Nhập Email" name="email">
                                </div>
                                @if($errors->has('email'))
                                <div class="alert alert-danger" style="opacity:0.5" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" class="form-control"  placeholder="Nhập Password" name="password">
                                </div>
                                @if($errors->has('password'))
                                <div class="alert alert-danger" style="opacity:0.5" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div>
                                @endif
                                {{-- <div class="form-group">
                                    <label for="name">Email Xác Minh</label>
                                    <input type="text" class="form-control"  placeholder="Email Xác Minh" name="email_verified_at">
                                </div>
                                @if($errors->has('email_verified_at'))
                                <div class="alert alert-danger" style="opacity:0.5" role="alert">
                                    <strong>{{ $errors->first('email_verified_at') }}</strong>
                                </div>
                                @endif --}}
                                <div class="form-group">
                                        <label for="name">Chọn Quyền</label>
                                <select name="level" class="form-control">
                                    <option value="0">---Chọn Quyền---</option>
                                    <option value="300">ADMIN</option>
                                </select>
                                </div>
                                 {{-- <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Danh sách quyền</th>
                                        <th scope="col">Xem</th>
                                        <th scope="col">Thêm</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xóa</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>Sản Phẩm</td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="100"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="200"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="300"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="400"></td>
                              
                                      </tr>
                                      <tr>
                                        <td>Bài Viết</td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="100"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="200"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="300"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="400"></td>
                                      </tr>
                                      <tr>
                                        <td>Danh Mục</td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="100"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="200"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="300"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="400"></td>
                                        </tr>
                                       <tr>
                                        <td>Đơn Hàng</td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="100"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="200"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="300"></td>
                                        <td><input type="checkbox" class="form-check-input" name="role[]" value="400"></td>
                                        </tr>
                                    </tbody>
                                  </table>  --}}
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

@endsection
@section('js')
<script src="{{ asset('assets/js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                },
            },
            "order": [],
            stateSave: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

</script>
@endsection
