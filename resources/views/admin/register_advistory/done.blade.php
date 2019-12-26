@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Danh sách đăng ký tư vấn
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách đăng ký tư vấn</div>
            <div class="panel-body">
                <div class="bootstrap-table">
                    <div class="table-responsive">
                        <a href="/admin/register_advisory/processing" class="btn btn-warning"><span
                                class="glyphicon glyphicon-gift"></span>Số điện thoại chưa xử lý</a>
                        <table class="table table-bordered" style="margin-top:20px;">
                            <thead>
                                <tr class="bg-primary">
                                    <th>STT</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Thông tin</th>
                                    <th>Thời gian</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($register_advisory_done as $key => $row)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $row->phone }}</td>
                                    
                                    <td>
                                        <ul>
                                           <li>
                                                Loại tư vấn:
                                                @php
                                                echo $row['type'] == 2 ? 'Đăng kí xem hàng tại nhà' : 'Khảo sát tư vấn lắp đặt tại nhà';
                                                @endphp
                                            </li>
                                            <li>Thời gian tư vấn : {{ $row['time']}} </li>
                                            @if (!empty(get_detail_products_by_id($row['product_id'])->slug))
                                            <li>Sản phẩm cần tư vấn : <a
                                                    href="{{ url('/').'/'.get_detail_products_by_id($row['product_id'])->slug  }}"
                                                    target="_blank"> {{ get_detail_products_by_id($row['product_id'])->name }} </a> </li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($row->updated_at)->format('d/m/Y') }}</td>

                                    <td>
                                        <a href="/admin/register_advisory/delete/{{ $row->id }}" class="btn btn-warning"><i
                                                class="fa" aria-hidden="true"></i>Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!--end main-->
@endsection