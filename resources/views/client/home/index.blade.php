@extends('client.master.master')
@section('title','Trang chủ')
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

		@if (!empty($allCategory) && count($allCategory))
			<div class="wrap-category">
				<div class="container">
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
						@foreach ($arr_name_sub_category as $key => $item2)
						<a href="{{url('danh-muc').'/'.$arr_slug_sub_category[$key]}}" class="itemprop"
							title="{{$item2}}">{{$item2}}</a>
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
											<img src="{{!empty($product->galleries) ?  $product->galleries[0]->image : ''}}" alt="{{$product->name}}">
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
		                @foreach ($category_news->posts as $item)
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="blog-container-inner">
									<div class="post-thumb">
										<a href="#">
											<img class="attachment-blog-list wp-post-image" alt="blog-2"
												src="client/img/bep-tu-bosch-pxv975dc1e-depx500x500x4.jpg"></a>
									</div>
									<div class="visual-inner">
										<h2 class="blog-title">
											<a href="#">{{$item->title}}</a>
										</h2>
										<div class="blog-meta">
											<span class="published">
												<i class="fa fa-clock-o"></i>
												{{$item->created_at}}
											</span>
										</div>
										<div class="blog-content-home">{{$item->short_desc}}</div>
									</div>
								</div>
							</div>
						@endforeach
		            </div>
		        </div>
		    </div>
		</div>
		@endif
		</div>
	</div>
@endsection

