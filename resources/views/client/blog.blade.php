@extends('client.master.master')
@if (!empty($db))
	
	@if (!empty($db->seo_title))
		<title>{{$db->seo_title}}</title>
	@else
		<title>{{ $title }}</title>
	@endif
	<meta name="keywords" content="{{!empty($db->seo_keyword) ? $db->seo_keyword : '' }}" />
	
	
	<meta name="description" content="{{!empty($db->seo_description) ? $db->seo_description :  '' }}" />

	@if (!empty(get_option_by_key('block_robot_google')))
		<meta name="robots" content="nofollow, noindex" />
	@else
		@if (!empty($db->block_robot_google))
			<meta name="robots" content="nofollow, noindex" />
		@endif
	@endif
@else

	@if (!empty($db_detail->seo_title))
		<title>{{$db_detail->seo_title}}</title>
	@else
		<title>{{ $title }}</title>
	@endif
	<meta name="keywords" content="{{!empty($db_detail->seo_keyword) ? $db_detail->seo_keyword : '' }}" />
	@if (!empty($db_detail->short_desc))
		@php
			$seo_desc = substr($db_detail->short_desc,0,150);
		@endphp
	@else
		@php
			$seo_desc = '';
		@endphp
	@endif
	
	<meta name="description" content="{{!empty($db_detail->seo_description) ? $db_detail->seo_description :  $seo_desc }}" />

	@if (!empty(get_option_by_key('block_robot_google')))
		<meta name="robots" content="nofollow, noindex" />
	@else
		@if (!empty($db_detail->block_robot_google))
			<meta name="robots" content="nofollow, noindex" />
		@endif
	@endif
@endif
@section('title')

@endsection
@section('content')
<div class="product blog">
    {{-- <div class="wrap-category hidden-xs hidden-sm" id="ProductCategory">
        <div class="container">
            <div class="arrows-category">
                <div class="menu-cate">
                    @if (!empty($cate))
                    @foreach ($cate as $item)

                    <div class="ctg-pro-item">
                        <a href="{{route('category_detail',['slug' => $item->slug])}}">
                            <div class="category-card__image">
                                <img src="{{ $item->image }}" alt="{{ $item->name }}">
                            </div>
                            <div class="category-card__name "><strong>{{ $item->name }}</strong></div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
    <div class="page-bread">
        <div class="container">
            <ul>
                <li><a href="/">bepantoan.vn</a></li>
                <li>{{ $title }}</li>
            </ul>
        </div>
    </div>
    <div class="blog-content">
        <div class="container">

            <div class="row">
                @if (!empty($db))
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    @if (!empty($db))
                    @foreach ($db as $item)
                    <div class="tb-post-item">
                        <a href="{{ $item->slug }}">
                            <div class="tb-thumb">
                                <figure>
                                    <img src="{{ $item->image  }}" alt="{{ $item->title }}">
                                </figure>
                                <span class="tb-publish font-noraure-3">
                                    @if ($item->created_at != null)
                                    <span>{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</span>
                                    @else
                                    <span></span>
                                    @endif
                                </span>
                            </div>
                        </a>
                        <div class="tb-content7">
                            <a href="{{ $item->slug }}">
                                <h4 class="tb-titlel">{{ $item->title }}</h4>
                            </a>
                            <div class="tb-excerpt">{!! get_excerpt($item->short_desc,350) !!}</div>
                            <a class="blog7" href="{{ $item->slug }}">Xem thêm <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                    @endif


                    <div class="pagenavi">
                        @if ($db)
                        {{ $db->links() }}
                        @endif
                    </div>
                </div>
                @else
                {{-- Nếu là chi tiết sản phẩm --}}
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="tb-post-item ma-nn">
                        <div class="tb-content7">
                            <h1 class="tb-titlel">{{ $db_detail->title }}</h1>
                            <div class="tb-date-view"><i class="fa fa-calendar"></i>
                                @if ($db_detail->created_at != null)
                                <span>{{ Carbon\Carbon::parse($db_detail->created_at)->format('d/m/Y') }}</span>
                                @else
                                <span></span>
                                @endif
                            </div>
                            {!! $db_detail->content !!}

                        </div>
                    </div>
                    <div class="late-news">
                        <h4 class="tb-titlel">Các tin khác</h4>
                        <ul class="list-item-news">
                            @if (!empty($post_other))
							@foreach ($post_other as $item)
							@if ($item->slug != $db_detail->slug)
                            <li>
                                <div class="img-news">
                                    <a href="{{ $item->slug }}" title="{HỎI ĐÁP} Bếp từ chefs eh-dih888 có tốt không">
                                        <img src="{{ $item->image }}" alt="{{ $item->title }}">
                                    </a>
                                </div>
                                <div class="text-news">
                                    <h3 class="title"><a href="{{ $item->slug }}"
                                            title="{{ $item->title }}">{{ $item->title }}</a></h3>
                                    @if ($db_detail->created_at != null)
                                    <span>{{ Carbon\Carbon::parse($db_detail->created_at)->format('d/m/Y') }}</span>
                                    @else
                                    <span></span>
                                    @endif
                                </div>
                            </li>
                            @endif
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                @endif
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="sidebar-post">
                        <div class="zo-recent-posts">
                            <h3 class="wg-title">Bài viết nổi bật</h3>
                            <ul>
                                @if (!empty($highlights_post))
                                @foreach ($highlights_post as $item)

                                <li>
                                    <div class="tb-recent-thumbb">
                                        <a href="{{ $item->slug }}" class="active">
                                            <img src="{{ $item->image }}" alt="{{ $item->title }}">
                                        </a>
                                        <div class="recent-thumb-overlay"></div>
                                    </div>
                                    <div class="tb-recentb">
                                        <h3 class="tb-postb">
                                            <a href="{{ $item->slug }}">{{ $item->title }}</a>
                                        </h3>
                                        <div class="tb-postd">
                                            @if ($item->created_at != null)
                                            <span>{{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</span>
                                            @else
                                            <span></span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="zo-recent-posts2">
                            <h3 class="wg-title">Bài viết mới nhất</h3>
                            <ul>
								@if ($new_post)
                                @foreach ($new_post as $item)
                                <li>
                                    <a href="{{ $item->slug }}">{{ get_excerpt($item->title,60) }}</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="zo-recent-posts2 os4">
                            <h3 class="wg-title">Danh mục tin tức</h3>
                            <ul>
                                @if (!empty($post_cate))
                                @foreach ($post_cate as $item)
                                <li>
                                    <a href="/{{ $item->slug }}">{{ $item->name }}</a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
