@extends('client.master.master')
@section('title')
Tìm kiếm: {{$_GET['search']}}
@endsection
@section('content')
<div class="home">
    
    <div class="single-products">
        <div class="container">
            <div class="hd-card-body">
            <div style="padding: 20px;"><h3> Tìm kiếm: {{$_GET['search']}}</h3></div>
                <div class="row">
                    @if (!empty($products) && count($products) > 0 )
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
                                    <a href="{{route('brand_category',['slug' => $product->brand->slug])}}" class="prdBrand">
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
                                <a href="{{route('product_detail',['slug' => $product->slug])}}"><i class="fa fa-eye"></i></a>
                                <form action="{{route('cart.addCart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_product" value={{$product->id}}>
                                    <input type="hidden" name="ip" value={{$_SERVER['REMOTE_ADDR']}}>
                                    <a href="#" id-product="{{$product->id}}" class="buy_now"><i class="fa fa-shopping-basket"></i></a>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                    <div class="col-sm-12" >
                        {{$products->appends(request()->except('page'))->links()}}
                    </div>
                    @else
                    <div class="col-sm-12">
                        <div class="alert alert-danger" role="alert">
                            Không có kết quả tìm kiếm !!!
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
