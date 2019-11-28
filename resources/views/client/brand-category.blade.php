@extends('client.master.master')
@section('title')
Thương hiệu {{$brand[0]->name}}
@endsection
@section('content')
<div class="home">
   
    <div class="product">
        <div class="page-bread">
            <div class="container">
                <ul>
                    <li><a href="{{route('home_client')}}">beptot.vn</a></li>
                    
                    <li>Thương hiệu {{$brand[0]->name}}</li>
                </ul>
            </div>
        </div>
        <div class="wrap-category hidden-xs hidden-sm" id="ProductCategory">
            <div class="container">
                @if (!empty($brand[0]->arr_id_category))
                    @php
                    $arr_id_category = explode(',',$brand[0]->arr_id_category);
                    $arr_brand_name = explode(',',$brand[0]->brand_name);
                    $arr_brand_slug = explode(',',$brand[0]->brand_slug);
                    
                    @endphp
                    
                    <div class="arrows-category">
                        <div class="menu-cate">
                            @foreach ($arr_id_category as $key => $item)
                            <div class="ctg-pro-item">
                                <a href="{{route('category_detail',['slug' => $arr_brand_slug[$key]])}}">
                                    <div class="category-card__image">
                                        <img src="{{!empty(get_category_by_id($item)->image) ? get_category_by_id($item)->image : ''}}" alt="{{$arr_brand_name[$key]}}">
                                    </div>
                                    <div class="category-card__name "><strong>{{$arr_brand_name[$key]}}</strong></div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endif   
            </div>
        </div>     
    </div>
    




</div>
@endsection