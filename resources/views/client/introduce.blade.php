@extends('client.master.master')
@section('title')
{{ $title }}
@endsection
@section('name')
<style>
    html {
        overflow: hidden;
    }
</style>
@endsection
@section('content')
<div class="product blog">
    <div class="wrap-category hidden-xs hidden-sm" style="padding:0" id="ProductCategory">
        <div class="container" style="background-image: url({{ $introduce['banner'] }});height:100px;padding:0">
            <div style="background: black;width: 100%;height: 100px;opacity: 0.5; z-index: 1;">
        </div>
            <div class="col-md-12 text-center" style="height:100px;padding:0;z-index:2;margin-top:-100px;">
                <div class="con-text">
                    <div>
                        <h2 class="page-title" style="line-height:100px;color:white">
                            {{ $introduce['title_banner'] }}</h2>
                    </div>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <img src="{{ $introduce['img_introduce'] ? $introduce['img_introduce'] : '' }}" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    {!! $introduce['content'] ? $introduce['content'] : '' !!}
                </div>

            </div>
            <div class="row">
                <div style="padding-top:30px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h2>{{ $introduce['title_rep'] ? $introduce['title_rep'] : '' }}</h2>
                    <div class="owl-carousel owl-theme">

                       @if (!empty($introduce['table']['content']))
                        @foreach ($introduce['table']['content'] as $item)
                        <div class="item">
                            <h4> {!! $item['content2'] !!}</h4>
                        </div>
                        @endforeach
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
    $('.owl-carousel').owlCarousel({
        responsive: {
            0: {
                items: 1
            }
        }
    })
</script>
@endsection
