@extends('client.master.master')
@section('title')
{{ $title }}
@endsection
@section('content')

<div class="product blog">
    <div class="wrap-category hidden-xs hidden-sm" style="padding:0" id="ProductCategory">
        <div class="container" style="background-image: url({{ $introduce['banner'] }});height:100px">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title" style="line-height:100px">{{ $introduce['title_banner'] }}</h2>
                </div>
            </div>
           
        </div>
    </div>
    <div class="page-bread">
        <div class="container">
            <ul>
                <li><a href="#">beptot.vn</a></li>
                <li>Giới thiệu</li>
            </ul>
        </div>
    </div>
    <div class="blog-content">
        <div class="container">

            <div class="row">
              
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <img src="{{ $introduce['img_introduce'] }}" alt="">   
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="tb-excerpt">
                            {!! $introduce['content'] !!}
                        </div>
                           
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h2>{{ $introduce['orientation'] }}</h2>
                        <p>
                           {!! $introduce['content2'] !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
