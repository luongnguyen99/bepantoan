@extends('admin.layout.master')


{{-- page title --}}
@section('page_title')
Sắp xếp hãng
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

    .drag_disabled{
    pointer-events: none;
    }
    
    .drag_enabled{
    pointer-events: all;
    }
</style>
@endsection


{{-- content --}}
@section('content')
<style>
    #updateCategory {
        opacity: 1 !important;
        /* overflow:  !important */
    }
</style>
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
    <div class="col-sm-7">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">
                    Sắp xếp hãng sản xuất <span style="color:red;font-size:15px"> ( Lưu ý : Mỗi khi thêm một hãng mới vào trong danh mục. Vui lòng làm mới để cập nhập hãng !!!) </span>
                </h3>
            </div>
            <div class="box-body">
                @if (count($brand_order) > 0)
                    @foreach ($brand_order as $item)
                        <div class="box-tools">
                            <h4 style="width:50%">{{get_category_by_id($item->category_id)->name}} <span> <i class="fa fa-minus click_hideshow"></i> </span> </h4>
                                <div class="dd nestable" id="nestable{{$item->category_id}}" category-id="{{$item->category_id}}">
                                    <ol class="dd-list">
                                      
                                        {{-- @if (!empty($item->get_brand_order)) --}}
                                        {{-- {{dd($item)}} --}}
                                            @foreach ($item->getBrandOrder as $key => $id_brand)
                                                {{-- {{dd($id_brand)}} --}}
                                                <li class="dd-item" data-id="{{$id_brand->brand_id}}">
                                                    <div class="dd-handle">{{get_brand_by_id($id_brand->brand_id)->name}}</div>
                                                </li>
                                            @endforeach   
                                        {{-- @endif --}}
                                       
                                    </ol>
                                </div>     
                        </div>
                    @endforeach
                @else
                    @foreach ($categories as $category)
                        <div class="box-tools">
                            <h4 style="width:50%">{{$category->name}} <span> <i class="fa fa-minus click_hideshow"></i> </span> </h4>
                            @php
                            $brands = show_brand_by_id_category($category->id);
                            @endphp
                            @if (count($brands) > 0)
                            <div class="dd nestable" id="nestable{{$category->id}}" category-id="{{$category->id}}">
                                <ol class="dd-list">
                                    @foreach ($brands as $brand)
                                    <li class="dd-item" data-id="{{$brand['id']}}">
                                        <div class="dd-handle">{{$brand['name']}}</div>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-1">
        <button type="button" style="position: fixed;margin-left: 70px;" class="btn btn-success save_attr">Lưu</button>
    </div>
    <div class="col-sm-2">
        <form action="{{route('admin.categories.reset_sort')}}" method="POST">
            @csrf
            <button type="submit" style="position: fixed;" class="btn btn-success reset">Làm mới</button>
        </form>
    </div>
</div>









<!----- javascript here -------->
@section('js')
<script src="{{asset('admin0/js/nestable.js')}}"></script>
<script>
@foreach ($categories as $category)
    $('#nestable{{$category->id}}').nestable({
        group: `{{$category->id}}`,
        maxDepth : 1,
    })
@endforeach

$('.click_hideshow').on('click',function(){
    if ($(this).hasClass('fa-minus')) {
        $(this).removeClass('fa-minus');
        $(this).addClass('fa-plus');
        
        $(this).parents('.box-tools').find('.nestable').css('display','none');

    }else{
        $(this).removeClass('fa-plus');
        $(this).addClass('fa-minus');

        $(this).parents('.box-tools').find('.nestable').css('display','block');
    }
});

$('.save_attr').on('click',function(){
    data = new Array();
    $('.nestable').each(function(i, obj) {
        let brand = new Array();
        let cate;
        let data2;
        cate = ($(this).attr('category-id'));
        $(this).find('.dd-item').each(function(i2,obj2){
            brand.push($(this).attr('data-id'));
        });
        data2 = {
            cate: cate,
            brand: brand,
        };
        data.push(data2);
        
    });
    $.ajax({
            url: "{{route('admin.categories.sort_brand')}}",
            method: 'post',
            data: {
                arr : data,
                _token : `{{csrf_token()}}`,
            },
            success: function (result) {
                swal("Thành công!",
                    "Cập nhập sắp xếp hãng thành công",
                    "success").then(function () {
                 
                    window.location.reload();
                });
                
            },
            
    });
});

@if (session('success_reload'))
    $('.save_attr').trigger('click');
@endif
</script>
@endsection
<!----- end javascript here -------->

@endsection