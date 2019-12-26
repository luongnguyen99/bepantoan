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
                <form class="repeater" method="POST" action="{{route('admin.options.choose_category_show_home')}}">
                    @csrf
                    @php
                        $categories_show_home = json_decode(get_option_by_key('categories_show_home'),true);
                        // dd($categories_show_home);
                    @endphp
                    
                    <div data-repeater-list="outer_list" class="abcd">
                        @if (!empty($categories_show_home) && count($categories_show_home) > 0)
                            @foreach ($categories_show_home as $element)
                            {{-- {{dd($element)}} --}}
                                <div data-repeater-item="" class="repeater_div">
                                    <div class="form-group row">
                                        <div class="col-xs-10">
                                            <label>Danh mục</label>
                                            <select name="category" id="category" class="form-control category abc">
                                                <option value="">---Chọn---</option>
                                                @foreach ($categories as $item)
                                                    <option {{$item->id == $element['category'] ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-2">
                                            <a class="btn btn-info up" style="margin-top:25px"><i class="fa fa-arrow-up"></i></a>
                                            <a class="btn btn-success down" style="margin-top:25px"><i class="fa fa-arrow-down"></i></a>
                                            <input data-repeater-delete="" type="button" value="Xóa" class="btn btn-danger" style="margin-top:25px">
                                        </div>
                                    </div>
                                
                                
                                    <!-- innner repeater -->
                                    <div class="inner-repeater">
                                        <div class="form-group">
                                            @php $brand_category =  !empty($element['brands']) ? $element['brands'] : [0 => 'abc']  @endphp
                                            @php $brands = show_brand_by_id_category($element['category']) @endphp
                                            <label class="title_brand">Hãng sản xuất</label>
                                            
                                            <select name="brands" class="form-control brands" multiple>
                                                @if (!empty($brands))
                                                    @foreach ($brands as $brand)
                                                        {{-- {{dd($brand['id'])}} --}}
                                                        <option {{in_array($brand['id'],$brand_category) ? 'selected' : ''}} value="{{$brand['id']}}">{{$brand['name']}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="title_product">Sản phẩm</label>
                                            @php
                                            $product_arr =  !empty($element['products']) ? $element['products'] : [0 => 'abc'];
                                            $products = get_products_by_category_id_option($element['category']);
                                            
                                            @endphp
                                            <select name="products" class="form-control products" multiple>
                                                @foreach ($products as $product)
                                                    <option {{in_array($product['id'],$product_arr) ? 'selected' : ''}} value="{{$product['id']}}">{{$product['name']}}</option>
                                                @endforeach
        
                                            </select>
                                        </div>                      
                                    </div>                          
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <div data-repeater-item="" class="repeater_div">
                                <div class="form-group row">
                                    <div class="col-xs-10">
                                        <label>Danh mục</label>
                                        <select name="category" id="category" class="form-control category abc">
                                            <option value="">---Chọn---</option>
                                            @foreach ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-2">
                            
                                        <a class="btn btn-info up" style="margin-top:25px"><i class="fa fa-arrow-up"></i></a>
                                        <a class="btn btn-success down" style="margin-top:25px"><i class="fa fa-arrow-down"></i></a>
                                        <input data-repeater-delete="" type="button" value="Xóa" class="btn btn-danger" style="margin-top:25px">
                                    </div>
                                </div>
                            
                            
                                <!-- innner repeater -->
                                <div class="inner-repeater">
                                    
                                    <div class="form-group">
                                        <label class="title_brand">Hãng sản xuất</label>
                                        <select name="brands" class="form-control brands" multiple>        
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="title_product">Sản phẩm</label>
                                        <select name="products" class="form-control products" multiple>
                                        </select>
                                    </div>
    
                                </div>
                            </div>
                        @endif
                        
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
$(document).ready(function () {
    jQuery('.repeater').repeater({});
    $('body').find('.category').select2();
    $('body').find('.brands').select2({});
    $('body').find('.products').select2({});

    $('.callBackSelect2').click(function(){
        $('body').find(".category:last").select2({
            // tags: true;
        });
        $('body').find('.brands:last').select2({
            // tags: true,
        });
        $('body').find('.products:last').select2({
        // tags: true,
        });
    });
    $("select").on("select2:select", function (evt) {
        var element = evt.params.data.element;
        var $element = $(element);
        
        $element.detach();
        // console.log($element);
        $(this).append($element);
        $(this).trigger("change");
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
$(document).on('change','.category.abc',function() {
var i = 0;
    if (i == 0) {
        // console.log('aa');
        scope = $(this);
        var id = $(this).find("option:selected").val();
        $.ajax({
                url : `{{route('admin.options.show_brand_by_id_category')}}`,
                method: 'POST',
                type: 'json',
                dataType: 'json',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                beforeSend: function() {
                    scope.parents('.repeater_div').find('.title_brand').html('Hãng sản xuất  <span style="font-weight: 100;color:red"> Loading ... </span>');
                }
            }).done(
                result => {
                    scope.parents('.repeater_div').find('.title_brand').html('Hãng sản xuất');
                    html = '';
                    result.forEach(element => {
                    html += `<option value="${element.id}">${element.name}</option>`;
                    });
                    $(this).parents('.repeater_div').find('.brands').html(html);
        });

        $.ajax({
            url : `{{route('admin.options.show_product_by_id_category')}}`,
            method: 'POST',
            type: 'json',
            dataType: 'json',
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {
                    scope.parents('.repeater_div').find('.title_product').html('Sản phẩm  <span style="font-weight: 100;color:red"> Loading ... </span>');
            }
        }).done(
            result => {
                scope.parents('.repeater_div').find('.title_product').html('Sản phẩm');
                html = '';
                result.forEach(element => {
                html += `<option value="${element.id}">${element.name}</option>`;
                });
                $(this).parents('.repeater_div').find('.products').html(html);
        });

        i = 1;  
    }else{
        i = 0;
    }
   


});


</script>

@endsection


