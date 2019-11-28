@extends('admin.layout.master')

@section('page_title')
Chi tiết đơn hàng #{{$order->id}}
@endsection

@section('style')

@endsection

@section('content')

<div class="box">
    <div class="box-header">
        {{-- <h3 class="box-title"> @yield('title') </h3> --}}
    </div>
    <section class="invoice" style="border:none !important;font-size: 15px;">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    </i>Chi tiết đơn hàng  #{{$order->id}}
                    <small class="pull-right">Thời gian đặt hàng: {{$order->created_at}}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info" style="font-size:15px">
            
            <!-- /.col -->
            <div class="col-sm-6 invoice-col" style="line-height:30px">
                Thông tin người đặt hàng
                <address style="line-height:30px">
                    Tên: <strong>{{$order->name_guest}}</strong><br>
                    Địa chỉ: {{$order->address}}<br>
                    Số điện thoại: {{$order->phone}}<br>
                    Email: {{$order->email}}<br>
                    Phương thức thanh toán: {{$order->method_payment == 1 ? 'Thanh toán sau khi nhận hàng' : 'Chuyển khoản'}} <br>
                    Ghi chú: {{$order->note}}<br>
                    Trạng thái :
                    <select name="status" id="status" class="form-control" style="width: 50%;">
                        @foreach ($status as $item)
                            <option {{$item->id == $order->status ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </address>
            </div>
           
        </div>
        <!-- /.row -->
    
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @if (count($order->order_details) > 0)
                        @foreach ($order->order_details as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td><a href="{{route('product_detail',['slug' => get_product_by_id($item->product_id)->slug])}}"> {{get_product_by_id($item->product_id)->name}} </a></td>
                                <td>
                                    @if (!empty(get_product_by_id($item->product_id)->sale_price))
                                        {{pveser_numberformat(get_product_by_id($item->product_id)->sale_price)}}
                                    @else
                                        {{pveser_numberformat(get_product_by_id($item->product_id)->price)}}
                                    @endif
                                </td>
                                <td>{{$item->qty}}</td>
                                <td>{{pveser_numberformat($item->amount)}}</td>
                            </tr>
                        @endforeach
                        @endif            
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
               
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width:50%">Tổng giá trị đơn hàng:</th>
                                <td>{{pveser_numberformat($order->total)}}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                
            <a href="{{route('admin.orders.index')}}" class="btn btn-success pull-right"><i class="fa fa-backward"></i> Danh sách đơn hàng
                </a>
                
            </div>
        </div>
    </section>
    <!-- ********** -->
    
        
        {{-- <form id="infomation" action="{{route('admin.products.saveAdd')}}" method="POST">
            @csrf
            <div class="col-md-6">
                <h4>Chi tiết đơn hàng</h4>
               <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
            </div>
            <div class="col-md-6">
                <hr class="hr hrhr" style="display:none">
                

               

                

                
              
                <div style="margin-top: 40px;" class="mt-2">
                    <button type="submit" class="btn btn-success submit_data">Lưu</button>
                    <a href="{{route('admin.products.index')}}" class="btn btn-danger">Huỷ</a>
                </div>
            </div>
        </form> --}}

    



    
    <!-- ********** -->
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer-->
</div>
@endsection

@section('js')

<script>
    
   

    


   

    $('body').on('change','#status',function(e) {
        e.preventDefault();
        value = $(this).val();
        if (confirm('Thay đổi trạng thái đơn hàng ?? ')) {
            $.ajax({
            url: "{{route('admin.orders.saveEdit',['id' => $order->id ])}}",
            method: 'post',
            data: {
                'value' : value
            },
        }).done(
            result => {
                    swal({
                        title: "Thành công!",
                        text: "Sửa sản phẩm thành công!",
                        icon: "success",
                        button: "OK",
                    }).then((willDelete) => {
                    if (willDelete) {
                        window.location.reload();
                    }
                    });
                    
            });
        }else{
            $(this).val(`{{$order->status}}`);
            return false;
        }
    });
        
    
   

</script>
@endsection