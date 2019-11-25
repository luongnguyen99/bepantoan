@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Thuộc tính
@endsection


{{-- style --}}
@section('style')
<style>
    td:hover .div-action {
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
    <div class="col-sm-4">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Thêm thuộc tính mới
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <form id=create_>
                    {{-- {{@csrf_field()}} --}}
                    <div class="form-group">
                        <label for="name">Tên thuộc tính</label>
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ !empty(old('name')) ? old('name') : ''}}">
                        <div class="text-danger error_name" id="error_name"></div>
                    </div>
                   
                    
                    <div class="form-group">
                        <button class=" btn btn-success" type="submit">Lưu</button>
                    </div>
                </form>



                <!-- end content here -->
            </div>
        </div>
    </div>
    {{-- /////////////////// --}}
    <div class="col-sm-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Danh sách thuộc tính
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
    $('body').on('click', '#choose_image', function(){
        var choose = $(this);
        CKFinder.popup( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    
                    var file_name = file.getUrl();
                    $('#thumbnail').val(file_name);

                    $('#this-img').show();
                    $('img#this-img').attr('src',file_name);
                } );
            }
        } );

    })
    
    var table;
    $(function () {
        

        var table = $('#datatable').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            stateSave: true,
            "ordering": false,
            ajax: "{{ route('admin.properties.data') }}",
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
                        return `<input type="checkbox" class="checkbox" value="${data}" name="checkbox">`
                    }
                },
                {data: null,title :'Tên thuộc tính',name : 'name', render: function ( data, type, row ) {
                    // console.log(data);
                    let step = '';   
                    return `
                    <div>${step + data.name}</div>
                    <div class="div-action"><a class="btn-edit"
                        href="{{ url('admin/properties/edit/') }}/${data.id}">Sửa</a>
                        | <a class="btn-remove" data-id ="${data.id}"  href="javascript:;">Xoá</a>
                        | <a href="{{url('admin/properties/${data.id}')}}">Thêm giá trị</a></div>
                    `;
                    }
                },
                {
                    data: null,
                    title: 'Giá trị',
                    render : function (data) {
                    var str = '';
                    dataEach = data.property_values;
                    for (let i = 0; i < dataEach.length; i++) {
                        str += `<span class="label label-primary" style="margin-right:5px;font-size: 11px"><a style="color:white" href="{{url('admin/properties/edit_value')}}/${dataEach[i].id}"> ${dataEach[i].name} </a></span>`; 
                    }
                    return `${str}`
                    }
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

    $('body').on('submit','#create_',function(e) {
        e.preventDefault();
        var form = $(this);
        let dataForm = new FormData(form[0]);
        dataForm.set('_token', '{{csrf_token()}}');
        
        $.ajax({
            url: "{{route('admin.properties.saveAdd')}}",
            // url: window.location.href,
            method: 'post',
            processData: false,
            contentType: false,
            data: dataForm,
            success: function (result) {},
            }).done(
                result => {
                    var msg = result.messages;                   
                    if (result.err) {
                        var msg = result.messages;            
                        typeof msg.name != 'undefined' ? form.find('.error_name').html(msg.name[0]) : form
                            .find('.error_name').html('');
                        
                        
                    } else {
                        
                        form.find('.error_name').html('');
                        swal("Deleted!",
                                "Thêm thành công.",
                                "success").then(function () {
                                $('#datatable').DataTable().ajax.reload();
                            })
                        };
                        form.find('input[name=name]').val('');
                    
            });
        });
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
                text: "Danh mục bị xóa. Sẽ không thể khôi phục!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    id = $(this).attr('data-id');
                             $.ajax({
                                url: `{{route('admin.properties.delete')}}`,
                                method: 'POST',
                                data: {
                                    _token: '{{csrf_token()}}',
                                    id : id,
                                }
                            }).done(result => {
                                
                                if (result.err == false) {
                                    swal("Deleted!",
                                        "Xóa thành công.",
                                        "success").then(function () {
                                        $('#datatable').DataTable().ajax.reload();
                                })
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
                                text: "Danh mục bị xóa. Sẽ không thể khôi phục!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    ajaxFunc("{{route('admin.properties.deleteMulti')}}", formData);
                                    swal("Deleted!",
                                        "Xóa thành công.",
                                        "success").then(function() {
                                        $('#datatable').DataTable().ajax.reload();
                                    });                                    
                                };
                            })
                } else {
                    alert('Vui lòng chọn danh mục!')
                }
            }
        }
    })
})

</script>

@endsection


@endsection