@extends('client.master.master')
@section('seo')

	
@endsection

@section('content')
	<div class="product blog">
		<div class="wrap-category hidden-xs hidden-sm" id="ProductCategory">
		    <div class="container">
		        <div class="arrows-category">
		            <div class="menu-cate">
		            	@if (!empty($cate))
						@foreach ($cate as $item)
						
		                <div class="ctg-pro-item">
		                    <a href="#">
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
		</div>
		<div class="page-bread">
			<div class="container">
				<ul>
				    <li><a href="{{route('home_client')}}">bepantoan.vn</a></li>
				    <li>Tin tức</li>
				</ul>
			</div>
		</div>
		<div class="blog-content">
			<div class="container">
				<div class="row">
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
					            <li>
					                <div class="img-news">
					                    <a href="#" title="{HỎI ĐÁP} Bếp từ chefs eh-dih888 có tốt không">
					                        <img src="{{ $item->image }}" alt="{{ $item->title }}">
					                    </a>
					                </div>
					                <div class="text-news">
					                    <h3 class="title"><a href="#" title="{{ $item->title }}">{{ $item->title }}</a></h3>
					                    @if ($db_detail->created_at != null)
										<span>{{ Carbon\Carbon::parse($db_detail->created_at)->format('d/m/Y') }}</span>
										@else
										<span></span>
										@endif
					                </div>
					            </li> 
					            @endforeach
								@endif
					        </ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="sidebar-post">
							<div class="zo-recent-posts">
									<h3 class="wg-title">Bài viết nổi bật</h3>
									<ul>
										@if (!empty($highlights_post))
										@foreach ($highlights_post as $item)
										
										<li>
											<div class="tb-recent-thumbb">
												<a href="#" class="active">
													<img src="{{ $item->image }}" alt="{{ $item->title }}">
												</a>
												<div class="recent-thumb-overlay"></div>
											</div>
											<div class="tb-recentb">
												<h3 class="tb-postb">
													<a href="#">{{ $item->title }}</a>
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
								<div class="zo-recent-posts2">
									<h3 class="wg-title">Bài viết mới nhất</h3>
									<ul>
										@if ($new_post)
										@foreach ($new_post as $item)
										<li>
											<a href="#">{{ get_excerpt($item->title,60) }}</a>
										</li>
										@endforeach
										@endif
									</ul>
								</div>
							</div>
							<div class="zo-recent-posts2 os4">
								<h3 class="wg-title">Danh mục tin tức</h3>
								<ul>
									@if (!empty($post_cate))
									@foreach ($post_cate as $item)
									<li>
										<a href="#">{{ $item->name }}</a>
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