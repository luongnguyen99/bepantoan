@extends('client.master.master')
@section('title','Sản phẩm')
@section('content')
<div class="home">
    <div class="wrap-category">
        <div class="container">
            @if (count($categories) > 0 && !empty($categories))
                <div class="owl-carousel owl-theme slide-pro-ctg">
                    @foreach ($categories as $item)
                        <div class="item">
                            <div class="ctg-pro-item">
                                <a href="#">
                                    <div class="category-card__image">
                                    <img src="{{!empty($item->image) ? $item->image : ''}}" alt="{{!empty($item->name) ? $item->name : ''}}">
                                    </div>
                                    <div class="category-card__name "><strong>{{!empty($item->name) ? $item->name : ''}}</strong></div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                </div>
            @endif
            

        </div>
    </div>
    <div class="wrap-brand">
        <div class="container">
            @if (count($brands) > 0 && !empty($brands))
                <div class="section-title">
                    <h3>Hãng sản xuất</h3>
                    <div class="uploader-more hidden-xs">
                        <a href="#">Xem thêm<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme slide-pro-ctg slide-brand">
                    @foreach ($brands as $item)
                        <div class="item">
                            <div class="brand-item">
                                <a href="#" title="{{$item->name}}">
                                    <div class="category-card__image">
                                        <img src="{{!empty($item->image) ? $item->image : '' }}" alt="{{$item->name}}">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
           
        </div>
    </div>

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
                            @if ($arr_slug_sub_category > 0 && !empty($arr_slug_sub_category))
                                @foreach ($arr_name_sub_category as $key =>  $item2)
                                    <a href="{{url('danh-muc').'/'.$arr_slug_sub_category[$key]}}" class="itemprop" title="{{$item2}}">{{$item2}}</a>   
                                @endforeach
                            @endif
            
                        </div>
                        <a href="#" class="viewall">Xem thêm<i class="fa fa-angle-right"></i></a>
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
                                            if (!empty($product->sale_price)) {
                                                $percent_sale = (($product->sale_price / $product->price)*100);
                                                
                                                $percent_sale2 = FLOOR(100 - $percent_sale);
                                            };
                                        @endphp
                                        <div class="product-img">
                                            @if (!empty($product->sale_price))
                                                <div class="pro-badge">
                                                    <span>-{{$percent_sale2}}%</span>
                                                </div>
                                            @endif
                                            
                                            <div class="img-responsive">
                                                <a href="{{route('product_detail',['slug' => $product->slug])}}">
                                                    @if (count($product->galleries) > 0 && !empty($product->galleries))
                                                        <img src="{{$product->galleries[0]->image}}" alt="{{$product->name}}">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-dsc">
                                            <h3><a href="{{route('product_detail',['slug' => $product->slug])}}">{{$product->name}}</a></h3>
                                            <div class="cate_pro_title">
                                                <a href="#" class="prdBrand">
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
                                                @if (!empty($product->sale_price))
                                                    <label>{{pveser_numberformat($product->sale_price)}}</label>   
                                                    <span>{{pveser_numberformat($product->price)}}</span>
                                                @else
                                                    <label>{{pveser_numberformat($product->price)}}</label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="actions-btn">
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="#" class="buy_now"><i class="fa fa-shopping-basket"></i></a>
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
    
    
    
   
</div>
@endsection