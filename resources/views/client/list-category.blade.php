@extends('client.master.master')
@section('title','Sản phẩm')
@section('css')
    <style>
        @media only screen and (max-width: 768px) {
            .hd-card-body > .row > .col-md-5h.col-xs-6.col-sm-6:nth-child(2n-1){
            clear:both;
            }
        }
    </style>
@endsection
@section('content')
<div class="home">
    <div class="product">
    @php

    $allCategory1 = json_decode(get_option_by_key('show_category_menu_mobile'),true);
    $allCategory = [];
    if (!empty($inCategory) && count($inCategory) > 0) {
        $allCategory = $categories;
    }else{
        foreach ($allCategory1 as $value) {
            if ($value['id']) {
                array_push($allCategory,get_category_by_id($value['id']));
            };
        }
    }

    @endphp

    @if (!empty($allCategory) && count($allCategory) > 0)
    {{-- {{dd($allCategory)}} --}}
    <div class="wrap-category">
        <div class="container">
            <div class="section-title">
                <h3>Danh mục sản phẩm</h3>
            </div>
            <div class="owl-carousel owl-theme slide-pro-ctg">
                @if (!empty($inCategory) && count($inCategory) > 0)
                    @foreach ($allCategory as $key => $item)

                    <div class="item">
                        <div class="ctg-pro-item">
                            <a href="{{route('category_detail',['slug' => $allCategory[$key]->slug])}}">
                                <div class="category-card__image">
                                    <img src="{{!empty($allCategory[$key]->image) ? $allCategory[$key]->image : ''}}"
                                        alt="{{$allCategory[$key]->name}}">
                                </div>
                                <div class="category-card__name "><strong>{{$allCategory[$key]->name}}</strong></div>
                            </a>
                        </div>
                    </div>

                    @endforeach
                @else
                    @foreach ($allCategory as $key => $item)
                    @if ($key % 2 == 0)
                    <div class="item">
                        <div class="ctg-pro-item">
                            <a href="{{route('category_detail',['slug' => $allCategory[$key]->slug])}}">
                                <div class="category-card__image">
                                    <img src="{{!empty($allCategory[$key]->image) ? $allCategory[$key]->image : ''}}"
                                        alt="{{$allCategory[$key]->name}}">
                                </div>
                                <div class="category-card__name "><strong>{{$allCategory[$key]->name}}</strong></div>
                            </a>
                        </div>

                        @if (isset($allCategory[$key + 1]) && !empty($allCategory[$key + 1]) )
                        <div class="ctg-pro-item">
                            <a href="{{route('category_detail',['slug' => $allCategory[$key + 1]->slug])}}">
                                <div class="category-card__image">
                                    <img src="{{!empty($allCategory[$key + 1]->image) ? $allCategory[$key + 1]->image : ''}}"
                                        alt="{{$allCategory[$key + 1]->name}}">
                                </div>
                                <div class="category-card__name "><strong>{{$allCategory[$key + 1]->name}}</strong></div>
                            </a>
                        </div>
                        @endif
                    </div>
                    @endif
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    @endif
    {{-- <div class="wrap-brand">
        <div class="container">
            @if (count($brands) > 0 && !empty($brands))
                <div class="section-title">
                    <h3>Hãng sản xuất</h3>
                    <div class="uploader-more hidden-xs">
                        <a href="#">Xem thêm<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme slide-pro-ctg slide-brand">
                    @foreach ($brands as $key => $item)

                            <div class="item">
                                <div class="brand-item">
                                    <a href="{{route('brand_category',['slug' => $brands[$key]->slug])}}" title="{{$brands[$key]->name}}">
                                        <div class="category-card__image">
                                            <img src="{{!empty($brands[$key]->image) ? $brands[$key]->image : '' }}" alt="{{$brands[$key]->name}}">
                                        </div>
                                    </a>
                                </div>
                            </div>


                    @endforeach
                </div>
            @endif

        </div>
    </div> --}}
    </div>
    {{-- Hiển thị danh mục theo sort brand --}}
    @if ($checkIsOrder > 0)
        @if (count($brand_order) > 0 && !empty($brand_order))
        {{-- {{dd($brand_order)}} --}}
        @foreach ($brand_order as $item)
        <div class="single-products">
            <div class="container">
                <div class="nav_cate_title">
                    <h2 class="title">

                        <a href="{{url('danh-muc').'/'.get_category_by_id(!empty($item->category_id) ? $item->category_id : $item->id )->slug}}" title="{{get_category_by_id(!empty($item->category_id) ? $item->category_id : $item->id)->name}}">{{get_category_by_id(!empty($item->category_id) ? $item->category_id : $item->id)->name}}</a>
                    </h2>
                    <!-- <div class="owl-carousel owl-theme sub-cate-title"> -->
                    @if (count($item->getBrandOrder) > 0)
                        @foreach ($item->getBrandOrder as $key => $brand_id)
                            @php
                            if ($key == 5) {
                                break;
                            };
                            @endphp
                        <!-- <div class="item"> -->
                            <div class="list-text-category hidden-xs hidden-sm">
                                <a href="{{url('danh-muc').'/'.get_category_by_id(!empty($item->category_id) ? $item->category_id : $item->id)->slug.'/'.get_brand_by_id($brand_id->brand_id)->slug}}"
                                    class="itemprop"
                                    title="{{get_category_by_id(!empty($item->category_id) ? $item->category_id : $item->id)->name.' '.get_brand_by_id($brand_id->brand_id)->name}}">
                                    {{(!empty(get_category_by_id(!empty($item->category_id) ? $item->category_id : $item->id)->short_name) ? get_category_by_id(!empty($item->category_id) ? $item->category_id : $item->id)->short_name :
                                                                get_category_by_id(!empty($item->category_id) ? $item->category_id : $item->id)->name).' '.get_brand_by_id($brand_id->brand_id)->name}}
                                </a>
                            </div>
                        <!-- </div> -->
                        @endforeach
                    @endif

                    <a href="{{url('danh-muc').'/'.get_category_by_id(!empty($item->category_id) ? $item->category_id : $item->id)->slug}}" class="viewall">Xem thêm<i class="fa fa-angle-right"></i></a>
                    <!-- </div> -->
                </div>
                <div class="hd-card-body">
                    <div class="row">
                        @php
                        $products = get_products_by_category_id(!empty($item->category_id) ? $item->category_id : $item->id);
                        @endphp
                        @if (!empty($products))
                        @foreach ($products as $product)
                        <div class="col-md-5h col-xs-6 col-sm-6">
                            <div class="product-item">
                                @php
                                if (!empty($product->sale_price) && $product->price != 0) {
                                $percent_sale = (($product->sale_price / $product->price)*100);

                                $percent_sale2 = FLOOR(100 - $percent_sale);
                                };
                                @endphp
                                <div class="product-img">
                                    @if (!empty($product->sale_price) && $product->price != 0)
                                    <div class="pro-badge">
                                        <span>-{{ !empty($percent_sale2) ? $percent_sale2 : ''}}%</span>
                                    </div>
                                    @endif

                                    <div class="img-responsive">
                                        <a href="{{route('product_detail',['slug' => $product->slug])}}">
                                            @if (count($product->galleries) > 0 && !empty($product->galleries))
                                            <img src="{{!empty($product->galleries[0]->image) ? !empty($product->galleries[0]->image) ? $product->galleries[0]->image : asset('client/img/default_product.png') : asset('client/img/default_product.png')}}"
                                                alt="{{$product->name}}">
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="product-dsc">
                                    <h3><a href="{{route('product_detail',['slug' => $product->slug])}}">{{$product->name}}</a>
                                    </h3>
                                    <div class="cate_pro_title">
                                        <a href="{{route('brand_category',['slug' => $product->brand->slug])}}"
                                            class="prdBrand">
                                            <img alt="{{$product->brand->name}}" src="{{$product->brand->image}}"></a>
                                    </div>
                                    @if (!empty($product->gift))
                                    @php
                                    $arr_gift = json_decode($product->gift,true);
                                    @endphp
                                    @foreach ($arr_gift as $gift)
                                    <div class="gift-sale">
                                        <strong>{{$gift['value']}}</strong>
                                    </div>
                                    @endforeach
                                    @endif

                                    <div class="cate_pro_bot">
                                        @if (!empty($product->sale_price) )
                                        <label>{{pveser_numberformat($product->sale_price)}}</label>
                                        <span>{{pveser_numberformat($product->price)}}</span>
                                        @else
                                        <label>{{pveser_numberformat($product->price)}}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="actions-btn">
                                    <a href="{{route('product_detail',['slug' => $product->slug])}}"><i
                                            class="fa fa-eye"></i></a>
                                    <form action="{{route('cart.addCart')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_product" value={{$product->id}}>
                                        <input type="hidden" name="ip" value={{$_SERVER['REMOTE_ADDR']}}>
                                        <a href="#" id-product="{{$product->id}}" class="buy_now"><i
                                                class="fa fa-shopping-basket"></i></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    @else
        @if (count($categories) > 0 && !empty($categories))

        @foreach ($categories as $item)
            <div class="single-products">
                <div class="container">
                    <div class="nav_cate_title">
                        <h2 class="title">
                            <a href="{{url('danh-muc').'/'.$item->slug}}" title="{{$item->name}}">{{$item->name}}</a>
                        </h2>
                        @php
                        $arr_name_sub_category = explode(",",$item->brand_name);
                        $arr_slug_sub_category = explode(",",$item->brand_slug);
                        @endphp

                        <div class="list-text-category hidden-xs hidden-sm">
                            <!-- <div class="owl-carousel owl-theme sub-cate-title"> -->
                                @if ($arr_slug_sub_category > 0 && !empty($arr_slug_sub_category))
                                @foreach ($arr_name_sub_category as $key => $item2)
                                @if ($key == 5)
                                @break
                                @endif

                                    <a href="{{url('danh-muc').'/'.$arr_slug_sub_category[$key]}}" class="itemprop" title="{{$item2}}">{{$item2}}</a>
                                <!-- </div> -->
                                @endforeach
                                @endif


                        </div>

                        <a href="{{url('danh-muc').'/'.$item->slug}}" class="viewall">Xem thêm<i class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="hd-card-body">
                        <div class="row">
                            @php
                            $products = get_products_by_category_id($item->id);
                            @endphp
                            @if (count($products) > 0 && !empty($products))
                            @foreach ($products as $product)
                            <div class="col-md-5h col-xs-6 col-sm-6">
                                <div class="product-item">
                                    @php
                                    if (!empty($product->sale_price) && $product->price != 0) {
                                    $percent_sale = (($product->sale_price / $product->price)*100);

                                    $percent_sale2 = FLOOR(100 - $percent_sale);
                                    };
                                    @endphp
                                    <div class="product-img">
                                        @if (!empty($product->sale_price) && $product->price != 0)
                                        <div class="pro-badge">
                                            <span>-{{ !empty($percent_sale2) ? $percent_sale2 : ''}}%</span>
                                        </div>
                                        @endif

                                        <div class="img-responsive">
                                            <a href="{{route('product_detail',['slug' => $product->slug])}}">
                                                @if (count($product->galleries) > 0 && !empty($product->galleries))
                                                <img src="{{!empty($product->galleries[0]->image) ? !empty($product->galleries[0]->image) ? $product->galleries[0]->image : asset('client/img/default_product.png') : asset('client/img/default_product.png')}}"
                                                    alt="{{$product->name}}">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-dsc">
                                        <h3><a href="{{route('product_detail',['slug' => $product->slug])}}">{{$product->name}}</a>
                                        </h3>
                                        <div class="cate_pro_title">
                                            <a href="{{route('brand_category',['slug' => $product->brand->slug])}}"
                                                class="prdBrand">
                                                <img alt="{{$product->brand->name}}" src="{{$product->brand->image}}"></a>
                                        </div>
                                        @if (!empty($product->gift))
                                        @php
                                        $arr_gift = json_decode($product->gift,true);
                                        @endphp
                                        @foreach ($arr_gift as $gift)
                                        <div class="gift-sale">
                                            <strong>{{$gift['value']}}</strong>
                                        </div>
                                        @endforeach
                                        @endif

                                        <div class="cate_pro_bot">
                                            @if (!empty($product->sale_price) )
                                            <label>{{pveser_numberformat($product->sale_price)}}</label>
                                            <span>{{pveser_numberformat($product->price)}}</span>
                                            @else
                                            <label>{{pveser_numberformat($product->price)}}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="actions-btn">
                                        <a href="{{route('product_detail',['slug' => $product->slug])}}"><i
                                                class="fa fa-eye"></i></a>
                                        <form action="{{route('cart.addCart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_product" value={{$product->id}}>
                                            <input type="hidden" name="ip" value={{$_SERVER['REMOTE_ADDR']}}>
                                            <a href="#" id-product="{{$product->id}}" class="buy_now"><i
                                                    class="fa fa-shopping-basket"></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        @endif
    @endif





</div>
@endsection
