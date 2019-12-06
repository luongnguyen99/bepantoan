@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Danh mục
@endsection


{{-- style --}}
@section('style')
<style>
    td:hover .div-action {  
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
    .dataTables_length{
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
                    Thêm mới danh mục
                </h3>
                
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""
                        data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <!--  content here -->
                <form id=create_category>
                    {{-- {{@csrf_field()}} --}}
                    <div class="form-group">
                        <label for="name">Tên danh mục</label>
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ !empty(old('name')) ? old('name') : ''}}">
                        <div class="text-danger error_name" id="error_name"></div>
                    </div>
                    <div class="form-group">
                        <label for="slug">Đường dẫn</label>
                        <input class="form-control" type="text" name=slug id=slug
                            value="{{ !empty(old('slug')) ? old('slug') : ''}}">
                        <div class="text-danger error_slug" id="error_slug"></div>
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Danh mục gốc</label>
                        <select name="parent_id" id="parent_id" class="form-control select2_add">
                            <option value="0">-- không --</option>
                            @foreach ($categories as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    <div classs="form-group">
                        <label for="properties">Thuộc tính</label>
                        <select class="properties_select2 form-control" name="properties[]" multiple="multiple">
                            @foreach ($properties as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <div id="box-img" class="box-img gallery2">
                            <div class="img2">
                            </div>
                        </div>
                        <a class="btn btn-primary choose_image_product" id="choose_image_product" >Chọn ảnh</a> 
                    </div>
                    
                    <div class="input-wrap" style="margin: 20px;">
                        <label class="checkbox">
                            <input type="checkbox" id="add_seo" name="add_seo">
                            <span class="ico"></span> Thiết lập SEO
                        </label>
                    </div>
                    <div class="seo_content" style="display:none">
                        <div class="form-group">
                            <label for="seo_title">Tiêu đề</label>
                            <input class="form-control" name="seo_title" value="" placeholder="Seo tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="seo_keyword">Từ khóa</label>
                            <input class="form-control" name="seo_keyword" value="" placeholder="Từ khóa">
                        </div>
                        <div class="form-group">
                            <label for="seo_description">Mô tả</label>
                            <textarea name="seo_description" class="form-control" id="seo_description" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Chặn robot google</label><br>
                            <label class="switch">
                                <input type="checkbox" name="block_robot_google">
                                <span class="slider round"></span>
                            </label>
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
    <div class="col-sm-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Danh mục 
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
                    <table class="table table-hover table-striped" id="table-categories"></table>
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

    jQuery('body').on('click', '#choose_image_product', function () {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files;
                    file.forEach(function (e) {
                        var url = e.getUrl();
                        jQuery('#box-img').html(`
                                <div class="img2">
                                    <img src="${url}" alt="image" style="width:300px">
                                    <input type="hidden" name="image"
                                        value="${url}">
                                    
                                </div>
								`)
                    });
                });
            }
        });
    });
    

</script>
<script>
    $(document).ready(function () {
        $("#updateCategory").on("hidden.bs.modal", function () {
            $("#show-alert").html("");
        });
    });
</script>
<script>
    var table;
    $(function () {
        $('#name').on('keyup', function () {
            ChangeToSlug('name', 'slug');
        })
        $('#name2').on('keyup', function () {
            ChangeToSlug('name2', 'slug2');
        })

        $(document).ready(function() {
            $('.select2_add').select2();
        });

        $(document).ready(function() {
            $('.properties_select2').select2();
        });

        var table = $('#table-categories').DataTable({
            serverSide: true,
            processing: true,
            responsive: true,
            stateSave: true,
            "ordering": false,
            ajax: "{{ route('admin.categories.data') }}",
           
            lengthMenu: [10, 30, 50, 100],
            iDisplayLength: 10,
           
            columns: [
                {
                    data: 'id',
                    title: `<input id="checkAll" value="all" class="checkAll" type="checkbox" name="checkAll">`,
                    render : function (data) {
                        // console.log(data);
                        return `<input type="checkbox" class="checkbox" value="${data}" name="checkbox">`
                    }
                },
                {data: null,title :'Tên danh mục',name : 'name', render: function ( data, type, row ) {
                    let step = '';            
                    return `
                    <div>${step + data.name}</div>
                    <div class="div-action">
                    <a href="{{url('danh-muc')}}/${data.slug}">Chi tiết</a> |
                    <a class="btn-edit"
                        href="{{ url('admin/categories/edit/') }}/${data.id}">Sửa</a>
                        | <a class="btn-remove" data-id ="${data.id}"  href="javascript:;">Xoá</a></div>
                    `;
                    }
                },
                {
                    data: 'slug',
                    title: "Đường dẫn tĩnh",
                    autoWidth: true
                },
                {
                    data: 'parent_name',
                    title: "Danh mục gốc",
                    autoWidth: true
                },
                {
                    data:null,
                    title: 'Thuộc tính',
                    autoWidth : true,
                    render : function (data,type,row){
                        var str = '';
                        if (data.properties.length > 0) {
                            data.properties.forEach(element => {
                                str += `<span class="label label-primary" style="margin-right:2px">${element.name}</span>`;
                            });
                        }
                        return str;
                    }
                }

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

    $('body').on('submit','#create_category',function(e) {
        e.preventDefault();
        var form = $(this);
        let dataForm = new FormData(form[0]);
        dataForm.set('_token', '{{csrf_token()}}');
        
        $.ajax({
            url: "{{route('admin.categories.saveAdd')}}",
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
                        typeof msg.slug != 'undefined' ? form.find('.error_slug').html(msg.slug[0]) : form
                            .find('.error_slug').html('');
                        typeof msg.brands != 'undefined' ? form.find('.error_brands').html(msg.brands[0]) : form
                        .find('.error_brands').html('');
                    } else {
                        form.find('.error_name').html('');
                        form.find('.error_slug').html('');
                        form.find('.error_brands').html('');
                        swal("success!",
                            "Thêm thành công.",
                            "success").then(function () {
                                $('#create_category')[0].reset();
                                window.location.reload();
                        });
                    }
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
                                url: `{{route('admin.categories.delete')}}`,
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
                                        $('#table-categories').DataTable().ajax.reload();
                                })
                            }    
                    });
                };
            });
        })
    })
    


    
 
$(function() {
    $('body').on('click', '#btn-action', function(e) {
            // console.log('a');
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
                                        ajaxFunc("{{route('admin.categories.deleteMulti')}}", formData);

                                        swal("Deleted!",
                                            "Xóa thành công.",
                                            "success").then(function() {
                                            $('#table-categories').DataTable().ajax.reload();
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