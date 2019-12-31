@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Danh sách số điện thoại đăng ký khuyến mãi
@endsection
@section('content')
<!--main-->

<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">

        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách số điện thoại đăng ký khuyến mãi</div>
            <div class="panel-body">
                <div class="bootstrap-table">
                    <div class="table-responsive">

                        <a href="/admin/register_advisory/done" class="btn btn-success">Số điện thoại đã xử lý</a>
                        <table class="table table-bordered" style="margin-top:20px;">
                            <thead>
                                <tr class="bg-primary">
                                    <th>STT</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Thông tin</th>
                                    <th>Xử lý</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($register_advisory_processing as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->phone }}</td>
                                    
                                    <td>
                                        <ul>
                                            <li>
                                            Loại tư vấn:
                                            @php
                                            echo $item['type'] == 2 ? 'Đăng kí xem hàng tại nhà' : 'Khảo sát tư vấn lắp đặt tại nhà';
                                            @endphp
                                            </li>
                                            <li>Thời gian tư vấn : {{ $item['sp_time']}} </li>
                                            @if (!empty(get_detail_products_by_id($item['product_id'])->slug))
                                            <li>Sản phẩm cần tư vấn : <a href="{{ url('/').'/'.get_detail_products_by_id($item['product_id'])->slug  }}"
                                                    target="_blank"> {{ get_detail_products_by_id($item['product_id'])->name }} </a> </li>
                                            @endif
                                            <li>Địa chỉ tư vấn : {{ $item['address']}} </li>

                                        </ul>
                                    </td>
                                    <td>
                                        <a href="/admin/register_advisory/change_status/{{ $item->id }}"
                                            class="btn-xl btn btn-warning"><i class="fa fa-pencil"
                                                aria-hidden="true"></i>Xử lý</a>
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
<!--/.row-->


</div>

<!--end main-->
@endsection