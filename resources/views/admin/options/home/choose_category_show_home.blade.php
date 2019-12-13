@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Chọn danh mục nổi bật
@endsection
@section('style')
    <style>
        .cke_contents {
            min-height: 100px !important;
        }
    
        .col-xs-12 {
            margin-top: 10px !important;
        }
    
        .pull-right {
            margin-left: 5px;
        }
    
        .dd-empty {
            display: none
        }
    
        #nestable3 {
            padding: 4px 8px !important;
            border: 1px #e0e0e0 solid;
            min-height: 40px;
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

<div class="row">

    {{-- ****************** --}}

    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-body">
                <form class="repeater" method="POST" action="https://thanhca.pveser.com/admin/options/save_sort_category">
                    <input type="hidden" name="_token" value="1n5DbAORUApmQxZIrMQ4K79r4oGhxwAroUgYb7vW">
                    <div data-repeater-list="outer_list" class="abcd">
                        <div data-repeater-item="" class="repeater_div">
    
                            <div class="form-group row">
                                <div class="col-xs-10">
                                    <label>Danh mục</label>
                                    <select name="outer_list[0][category]" id="category" class="form-control category">
                                        @foreach ($categories as $item) 
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                      
                                    </select>
                                </div>
                                <div class="col-xs-2">
    
                                    <a class="btn btn-info up" style="margin-top:25px"><i class="fa fa-arrow-up"></i></a>
                                    <a class="btn btn-success down" style="margin-top:25px"><i
                                            class="fa fa-arrow-down"></i></a>
                                    <input data-repeater-delete="" type="button" value="Xóa" class="btn btn-danger"
                                        style="margin-top:25px">
                                </div>
                            </div>
    
    
                            <!-- innner repeater -->
                            <div class="inner-repeater">
                                <div>
                                    <div>
                                        <div class="form-group">
                                            <label>Hãng sản xuất</label>
                                            <select name="brands[]" 
                                                class="form-control brands" multiple>
                                               <option value="">--Chọn--</option>
                                                
                                            </select>
                                        </div>
    
                                    </div>
                                </div>
    
                            </div>
    
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <input data-repeater-create="" type="button" value="Thêm" class="btn btn-primary callBackSelect2">
                </form>
            </div>
        </div>
    </div>
</div>







@endsection
<!----- javascript here -------->
@section('js')
<script src="{{asset('admin0/js/repeater.js')}}"></script>

<script>
    
    $('.btn_save').click(function () {
        var myJSON = JSON.stringify(a);
        var formData = new FormData();
        $.ajax({
            url : `{{route('admin.options.choose_category_show_home')}}`,
            method: 'post',
            type: 'json',
            dataType: 'json',
            data: {
                categories: myJSON,
                _token: '{{ csrf_token() }}'
            },
        }).done(
            result => {
                var msg = result;
                if (result.error == false) {
                    window.location.reload();
                } else {       
                    window.location.reload();
                }
              
        });
    })

</script>
<script>
$(document).ready(function () {
    jQuery('.repeater').repeater({});
    $('body').find('.category').select2();
    $('body').find('.brands').select2();
    $('.callBackSelect2').click(function(){
        $('body').find(".category:last").select2({});
        $('body').find('.brands:last').select2();
    });
    jQuery('body').on('click','.up',function(){
        divCurrent = $(this).parents('.repeater_div');
        var wrapper = $(this).closest('.repeater_div');

        var selectEq1_1 = $(divCurrent.prev()).find('select:eq(0)').attr('name');
        var selectEq1_2 = $(divCurrent).find('select:eq(0)').attr('name');

        var selectEq2_1 = $(divCurrent.prev()).find('select:eq(1)').attr('name');
        var selectEq2_2 = $(divCurrent).find('select:eq(1)').attr('name');

        $(wrapper).find('select:eq(0)').attr('name',selectEq1_1);
        $(divCurrent.prev()).find('select:eq(0)').attr('name',selectEq1_2);

        $(wrapper).find('select:eq(1)').attr('name',selectEq2_1);
        $(divCurrent.prev()).find('select:eq(1)').attr('name',selectEq2_2);

        wrapper.insertBefore(divCurrent.prev());
    }); 

    jQuery('body').on('click','.down',function(){
        divCurrent = $(this).parents('.repeater_div');
        var wrapper = $(this).closest('.repeater_div');

        var selectEq1_1 = $(divCurrent.next()).find('select:eq(0)').attr('name');
        var selectEq1_2 = $(divCurrent).find('select:eq(0)').attr('name');

        var selectEq2_1 = $(divCurrent.next()).find('select:eq(1)').attr('name');
        var selectEq2_2 = $(divCurrent).find('select:eq(1)').attr('name');

        $(wrapper).find('select:eq(0)').attr('name',selectEq1_1);
        $(divCurrent.next()).find('select:eq(0)').attr('name',selectEq1_2);

        $(wrapper).find('select:eq(1)').attr('name',selectEq2_1);
        $(divCurrent.next()).find('select:eq(1)').attr('name',selectEq2_2);


        wrapper.insertAfter(divCurrent.next());
    });
});
</script>



@endsection


