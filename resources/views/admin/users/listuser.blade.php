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

<!-- main content -->
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách Tài Khoản
                </h3>
                @if (session('thongbao'))
                    <div class="alert bg-success" role="alert">
                        {{ session('thongbao') }}
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
                <a href="/admin/users/add" class="btn btn-primary">Thêm</a>
                
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Email</th>
                            {{-- <th>Email xác minh</th> --}}
                            <th>Quyền</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $key=>$item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            
                            <td>{{ $item->email }}</td>
                           
                            {{-- <td>{{ $item->email_verified_at }}</td> --}}
                            @if ($item->role >= 300)
                            <td>Admin</td>
                            @else
                            
                            <td>Chưa Chọn Quyền</td>
                            @endif
                            
                                <td>
                                    @if (Auth::user()->role == 500 || $item->id == Auth::user()->id )
                                        <a href="/admin/users/edit/{{ $item->id }}" type="button" class="btn btn-warning">Sửa</a>    
                                    @endif
                                    
                                    @if (Auth::user()->role == 500 && $item->role != 500)         
                                            <a href="/admin/users/del/{{ $item->id }}" type="button"
                                            class="btn btn-danger">Xóa</a>
                                    @endif
                                    
                                </td>
                        </tr>       
                        @endforeach
                    </tbody>
                </table>
                <!-- end content here -->
            </div>
        </div>
    </div>
</div>
<!-- end main content -->


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
