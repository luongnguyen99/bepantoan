@extends('client.master.master')
@section('seo')
	@if (!empty(get_option_by_key('seo_title_home')))
		<title>{{get_option_by_key('seo_title_home')}}</title>
	@else
		<title>Trang chủ</title>
	@endif
	<meta name="keywords" content="{{!empty(get_option_by_key('seo_keyword_home')) ? get_option_by_key('seo_keyword_home') : '' }}" />
	<meta name="description" content="{{!empty(get_option_by_key('seo_description_home')) ? get_option_by_key('seo_description_home') : '' }}" />

	@if (!empty(get_option_by_key('block_robot_google')))
		<meta name="robots" content="nofollow, noindex" />
	@else
		@if (!empty(get_option_by_key('block_robot_google_home')))
			<meta name="robots" content="nofollow, noindex" />
		@endif
	@endif
@endsection
@section('content')
<div class="home">
		@php
			$slides = get_option_by_key('slide');
		@endphp
		<div class="owl-carousel owl-theme slide-home">
			@if (!empty($slides))
				@php
					$slides = json_decode(get_option_by_key('slide'),true);
					
				@endphp
			
			@foreach ($slides[0] as $item)
				<div class="item">
					<a href="{{!empty($item['type']) ? $item['type'] : '#'}}">
						<img src="{{$item['img_']}}" alt="">
					</a>
				</div>
				@endforeach    
			@endif
		</div> <!-- end slide --> 

		
		@if (!empty($category_sale))
			<div class="notice-title">
				<div class="container">
					<ul>
						<li>
							<i class="fa fa-volume-up"></i>Thông tin khuyến mãi:<a href="#" target="_blank"> {{$category_sale->title}}.</a>
						</li>
					</ul>
					<span><a href="#" target="_blank" class="link-update">Xem thêm </a><i class="pe-7s-right-arrow"></i></span>
				</div>
			</div>			
		@endif
		
		@php
			$allCategory1 = json_decode(get_option_by_key('show_category_menu_mobile'),true);
			$allCategory = [];
			foreach ($allCategory1 as  $value) {
				if ($value['id']) {
					array_push($allCategory,get_category_by_id($value['id']));
				};
				// if (!empty($value['children'])) {
				// 	foreach ($value['children'] as $key => $value1) {
				// 		array_push($allCategory,get_category_by_id($value1['id']));
				// 	}
				// }
			}
			// dd($allCategory);
		@endphp
		@if (!empty($allCategory) && count($allCategory) > 0)
			
			<div class="wrap-category">
				<div class="container">
					<div class="section-title">
			            <h3>Danh mục sản phẩm</h3>
			        </div>
					<div class="owl-carousel owl-theme slide-pro-ctg">
						@foreach ($allCategory as $key => $item)
							@if ($key % 2 == 0)
								<div class="item">
										<div class="ctg-pro-item">
											<a href="{{route('category_detail',['slug' => $allCategory[$key]->slug])}}">
												<div class="category-card__image">
													<img src="{{!empty($allCategory[$key]->image) ? $allCategory[$key]->image : ''}}" alt="{{$allCategory[$key]->name}}">
												</div>
												<div class="category-card__name "><strong>{{$allCategory[$key]->name}}</strong></div>
											</a>
										</div>

										@if (isset($allCategory[$key + 1]) && !empty($allCategory[$key + 1]) )
											<div class="ctg-pro-item">
												<a href="{{route('category_detail',['slug' => $allCategory[$key + 1]->slug])}}">
													<div class="category-card__image">
														<img src="{{!empty($allCategory[$key + 1]->image) ? $allCategory[$key + 1]->image : ''}}" alt="{{$allCategory[$key + 1]->name}}">
													</div>
													<div class="category-card__name "><strong>{{$allCategory[$key + 1]->name}}</strong></div>
												</a>
											</div>	
										@endif			
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		@endif
	
		
		@if (count($categories_show_home) > 0 && !empty($categories_show_home))
		@foreach ($categories_show_home as $id)
		@php  $item  = get_detail_category_by_id_show_home($id) @endphp
		
		<div class="single-products">
			<div class="container">
				<div class="nav_cate_title">
					<h2 class="title">
						<a href="{{url('danh-muc').'/'.$item->slug}}" title="{{$item->name}}">{{$item->name}}</a>
					</h2>
					@if ($item->brand_name != null && $item->brand_slug != null)
						@php
						$arr_name_sub_category = explode(",",$item->brand_name);
						$arr_slug_sub_category = explode(",",$item->brand_slug);
						@endphp
						
						<div class="list-text-category hidden-xs hidden-sm">
							@if ($arr_slug_sub_category > 0 && !empty($arr_slug_sub_category))
							@foreach ($arr_name_sub_category as $key => $item2)
							@if ($key == 5)
								@break
							@endif
							<a href="{{url('danh-muc').'/'.(!empty($arr_slug_sub_category[$key]) ? $arr_slug_sub_category[$key] : '')}}"
								class="itemprop" title="{{$item2}}">{{$item2}}</a>
							@endforeach
							@endif
						
						</div>
					@endif
					
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
										<span>-{{$percent_sale2}}%</span>
									</div>
									@endif
		
									<div class="img-responsive">
										<a href="{{route('product_detail',['slug' => $product->slug])}}">
											@if (count($product->galleries) > 0 && !empty($product->galleries))
											<img src="{{!empty($product->galleries) ? !empty($product->galleries[0]->image) ? $product->galleries[0]->image : asset('client/img/default_product.png')  : asset('client/img/default_product.png')}}" alt="{{$product->name}}">
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
										@if (!empty($product->sale_price))
										<label>{{pveser_numberformat($product->sale_price)}}</label>
										<span>{{pveser_numberformat($product->price)}}</span>
										@else
										<label>{{ $product->price == 0 ?  'Liên hệ' : pveser_numberformat($product->price)}}</label>
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
		
		@if (!empty($category_advisory) && !empty($category_advisory->posts) && count($category_advisory->posts) > 0)
			<div class="tips-wrap">
				<div class="container">
					<div class="section-title">
						<h3>{{$category_advisory->name}}</h3>
						<div class="uploader-more hidden-xs">
							<a href="#">Xem thêm<i class="fa fa-angle-right"></i></a>
						</div>
					</div>
					
					<div class="hd-card-body">
						<ul class="tips-faq">
							@foreach ($category_advisory->posts as $item)
							
								<li class="item">
									<a href="#" target="_blank" class="ellipsis">{{$item->title}}</a>
								</li>
							@endforeach
						</ul>
					</div>
					
				</div>
			</div>
		@endif
		@if (!empty($category_news) && !empty($category_news->posts) && count($category_news->posts) > 0)
		<div class="blog section-news">
		    <div class="container">
		        <div class="row">
		            <div class="col-xs-12">
		                <div class="section-title">
		                    <h3>{{$category_news->name}}</h3>
		                </div>
		            </div>
		        </div>
		        <div class="re-blog">
		            <div class="row">
						@if (!empty($highlights_post))
						@foreach ($highlights_post as $item)
							
		                <div class="col-md-3 col-sm-6 col-xs-12">
		                    <div class="blog-container-inner">
		                        <div class="post-thumb">
		                            <a href="{{ $item->slug }}">
		                                <img class="attachment-blog-list wp-post-image" alt="blog-2" src="{{ $item->image }}"></a>
		                        </div>
		                        <div class="visual-inner">
		                            <h2 class="blog-title">
		                                <a href="{{ $item->slug }}">{{ $item->title }}</a>
		                            </h2>
		                            <div class="blog-meta">
		                                <span class="published">
		                                    <i class="fa fa-clock-o"></i>
		                                    {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
		                                </span>
		                            </div>
		                            <div class="blog-content-home">{{ $item->short_desc }}</div>
		                        </div>
		                    </div>
		                </div>
		                <!-- single blog item end -->
		                @endforeach
						@endif
		            </div>
		        </div>
		    </div>
		</div>
		@endif
		</div>
	</div>
@endsection

