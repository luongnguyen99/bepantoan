@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Đơn hàng
@endsection


{{-- style --}}
@section('style')
<style>
    tr:hover .div-action {
        animation-delay: 2s;
        /* display: block; */

        visibility: visible;
    }

    .div-action {
        visibility: hidden;
        /* display: none; */
    }

    .td-action a:hover {
        color: #000000;
    }

    .dataTables_length {
        float: left;
    }
</style>
@endsection


{{-- content --}}
@section('content')

{{-- alert --}}
@if (session('success'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif

@if (session('error'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible show" role="alert">
            <strong>Thông báo!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>
@endif
{{-- end alert --}}


<!-- main content -->
<div class="row">

    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách sản phẩm
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
                    <table class="table table-hover table-striped" id="datatable"></table>
                </div>



                <!-- end content here -->
            </div>
        </div>
    </div>
</div>
<!-- end main content -->








<!----- javascript here -------->
@section('js')

<script>
    
    
    var table;
    $(function () {
        
        var table = $('#datatable').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            stateSave: true,
            "ordering": false,
            ajax: "{{ route('admin.orders.data') }}",
            // order: [
            //     [0, 'desc']
            // ],
            lengthMenu: [20, 30, 50, 100],
            iDisplayLength: 20,
           
            columns: [
                {
                    data: 'id',
                    title: `<input id="checkAll" value="all" class="checkAll" type="checkbox" name="checkAll">`,
                    render : function (data) {
                        // console.log(data);
                        return `<input type="checkbox" class="checkbox" value="${data}" name="checkbox">`
                    }
                },
                {
                    data: null,
                    title: "Mã số đơn hàng",
                    render : function (data, type, row){
                        return `
                        <div># ${data.id}</div>
                        <div class="div-action"><a class="btn-edit" href="{{ url('admin/orders/detail/') }}/${data.id}">Chi tiết</a>
                            | <a class="btn-remove" data-id="${data.id}" href="javascript:;">Xoá</a></div>
                        `;
                    }
                },
                {data: null,title :'Tên khách hàng',name : 'name_guest', render: function ( data, type, row ) {
                    let step = '';            
                    return `
                    <div>${step + data.name_guest}</div>
                    `;
                    }
                },
                {
                    data: 'total',
                    title: "Tổng tiền",
                    render: function(data){
                        console.log(data);
                        total = data.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        // total = total.replace('.00', "đ");

                        return `${total}đ`;
                    }
                },
                {
                    data: null,
                    title: "Trạng thái",
                    autoWidth: true,
                    render : function (data) {
                        return data.status.name;
                    }
                },
                {
                    data: 'created_at',
                    title: "Ngày đặt hàng",
                    autoWidth: true,
                    
                },

            ],
            "language": {
                "lengthMenu": "_MENU_ ",
                "zeroRecords": "Không có dữ liệu để hiển thị",
                "info": "_PAGE_/_PAGES_",
                // "infoEmpty": "No records available",
                "infoEmpty": "Không có dữ liệu để hiển thị",
                // "infoFiltered": "(filtered from _MAX_ total records)",
                "infoFiltered": "(_MAX_/tổng số)",
                "search": 'Tìm kiếm: ',
                "paginate": {
                    "first": "Trang đầu",
                    "last": "Trang cuối",
                    "next": "Trang sau",
                    "previous": "Trang trước"
                },
            },

           
        

        })

    });
    
    $(function() {
        $(document).find('.content-wrapper').find('.dataTables_wrapper').find('.row:eq(0)').find('.col-sm-6:eq(0)').append(`
        <div style="float: left;margin-left:10px">
            <form class="form-action" id="form-action">
                <div style="margin-right: 5px !important;" class="pull-left">
                    <select name="action" id="action" class="form-control input-sm action ">
                        <option value="0">Tác vụ</option>
                        <option value="delete">Xoá</option>
                    </select>
                </div>
                <div class="pull-left">
                    <button id="btn-action" class="btn btn-secondary btn-sm btn-flat btn-action">Áp dụng</button>
                </div>
            </form>
        </div>`);

        $(document).on('click','.btn-remove',function(e) {
            e.preventDefault();
            swal({
                title: "Chắc chắn xóa?",
                text: "Đơn hàng bị xóa. Sẽ không thể khôi phục!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    id = $(this).attr('data-id');
                             $.ajax({
                                url: `{{route('admin.orders.delete')}}`,
                                method: 'POST',
                                data: {
                                    _token: '{{csrf_token()}}',
                                    id : id,
                                }
                            }).done(result => {
                                
                                if (result.err == false) {
                                    swal("Thành công!",
                                        "Xóa thành công.",
                                        "success").then(function () {
                                        $('#datatable').DataTable().ajax.reload();
                                });
                            }    
                    });
                };
            });
        })
    })
    


    
 
$(function() {
    $('body').on('click', '#btn-action', function(e) {
            e.preventDefault();
            var action = $('body').find('#action').val();
            if (parseInt(action) != 0) {
                if (action == 'delete') {
                    var data = [];
                    $.each($("input[name='checkbox']:checked"), function() {
                        data.push($(this).val());
                    });
                    var formData = new FormData();
                    formData.append('data', data);
                    if (data.length != 0) {
                        swal({
                                title: "Chắc chắn xóa?",
                                text: "Đơn hàng bị xóa. Sẽ không thể khôi phục!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    ajaxFunc("{{route('admin.orders.deleteMulti')}}", formData);
                                    swal("Thành công!",
                                        "Xóa thành công.",
                                        "success").then(function() {
                                        $('#datatable').DataTable().ajax.reload();
                                    });                                    
                                };
                            })
                } else {
                    alert('Vui lòng chọn đơn hàng!')
                }
            }
        }
    })
})

</script>

@endsection


@endsection