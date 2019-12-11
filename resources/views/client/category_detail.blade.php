@extends('client.master.master')
@section('seo')
	@if (!empty($category->seo_title))
		<title>{{$category->seo_title}}</title>
	@else
		<title>{{$category->name}} {{!empty($brand) ? $brand->name : ''}}</title>
	@endif
	<meta name="keywords" content="{{!empty($category->seo_keyword) ? $category->seo_keyword : '' }}" />
	<meta name="description" content="{{!empty($category->seo_description) ? $category->seo_description : '' }}" />

	@if (!empty(get_option_by_key('block_robot_google')))
		<meta name="robots" content="nofollow, noindex" />
	@else
		@if (!empty($category->block_robot_google))
			<meta name="robots" content="nofollow, noindex" />
		@endif
	@endif
@endsection

@section('css')
	<style>
	input[type="radio"] {
	-webkit-appearance: checkbox;
	-moz-appearance: checkbox;
	-ms-appearance: checkbox; 
	-o-appearance: checkbox; 
	}
	</style>
@endsection
@section('content')
<div class="home">
	<div class="product">
		{{-- <div class="wrap-category hidden-xs hidden-sm" id="ProductCategory">
		    <div class="container">
				@if (!empty($categories))
					<div class="arrows-category">
						<div class="menu-cate">
							@foreach ($categories as $item)
								<div class="ctg-pro-item">
									<a href="{{route('category_detail',['slug' => $item->slug])}}">
										<div class="category-card__image">
											<img src="{{$item->image}}" alt="{{$item->name}}">
										</div>
										<div class="category-card__name "><strong>{{$item->name}}</strong></div>
									</a>
								</div>
							@endforeach		
						</div>
					</div>
				@endif
		    </div>
		</div> --}}
		<div class="page-bread">
			<div class="container">
				<ul>
					<li><a href="{{route('home_client')}}">bepantoan.vn</a></li>
					@if ($category->parent_id != 0)
						@php $c = get_category_by_id($category->parent_id) @endphp
						<li><a href="{{route('category_detail',['slug' => $c->slug])}}">{{$c->name}}</a></li>
					@endif
					@if ($category)
				    	<li><a href="{{route('category_detail',['slug' => $category->slug])}}">{{$category->name}}</a></li>		
					@endif
					@if (!empty($brand))
				    	<li><a href="{{route('category_detail',['slug' => $category->slug,'slug2' => $brand->slug])}}">{{$category->name}} {{!empty($brand) ? $brand->name : ''}}</a></li>	
					@endif
				</ul>
			</div>
		</div>
		<section class="new-filter-qh">
			<div class="container">
				<div class="hd-card-body">
					<div class="hd-module-title filterBoxFixed">
						<div class="row">
							<form id="form_filter" method="GET" action="">
							<div class="col-xs-12">
								
								@if (!empty($brands))
								<div class="boxFilterLeft btn-group">
									<button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown"
										aria-expanded="false">
										Hãng Sản xuất <span class="caret"></span>
									</button>
									<ul class="listform_filter category right-property dropdown-menu" role="menu">
										<div class="box-filter">
											<h3>HÃNG SẢN XUẤT</h3>
											<ul class="listform_filter filterBrand">
												@foreach ($brands as $item)
												<li>
													<div class="radio">
														<input type="radio" class="choose_value {{!empty($_GET['hang-san-xuat']) && $_GET['hang-san-xuat'] == $item->id  ? 'checked' : ''}}" name="hang-san-xuat"
															{{!empty($_GET['hang-san-xuat']) && $_GET['hang-san-xuat'] == $item->id  ? 'checked' : ''}}
															value="{{$item->id}}" id="brand_{{$item->id}}">
														<label for="brand_{{$item->id}}">
															<img src="{{$item->image}}" class="icImgBrand" alt="{{$item->name}}">
														</label>
													</div>
												</li>
												@endforeach
											</ul>
										</div>	
									</ul>
								</div>
								@endif
		
		
								<div class="boxFilterLeft btn-group">
									<button type="button" class="btn btn-filters btn-default dropdown-toggle"
										data-toggle="dropdown" aria-expanded="false">
										Mức giá <span class="caret"></span>
									</button>
									<ul class="listform_filter right-property dropdown-menu" role="menu">
		
										<li>
											<div class="radio">
												<input type="radio" name="muc-gia" class="choose_value {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '3000000-5000000'  ? 'checked' : ''}}" id="muc-gia102"
													{{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '3000000-5000000'  ? 'checked' : ''}}
													value="3000000-5000000">
												<label for="muc-gia102"> 3 triệu - 5 triệu</label>
											</div>
										</li>
										
										<li>
											<div class="radio">
												<input type="radio" name="muc-gia" class="choose_value {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '5000000-10000000'  ? 'checked' : ''}}" id="muc-gia103"
													{{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '5000000-10000000'  ? 'checked' : ''}}
													value="5000000-10000000">
												<label for="muc-gia103"> 5 triệu - 10 triệu</label>
											</div>
										</li>
										
										<li>
											<div class="radio">
												<input type="radio" name="muc-gia" class="choose_value {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '10000000-15000000'  ? 'checked' : ''}}" id="muc-gia104"
													{{!empty($_GET['muc-gia'])  && $_GET['muc-gia'] == '10000000-15000000'  ? 'checked' : ''}}
													value="10000000-15000000">
												<label for="muc-gia104"> 10 triệu - 15 triệu</label>
											</div>
										</li>
										
										<li>
											<div class="radio">
												<input type="radio" name="muc-gia" class="choose_value {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '15000000-max'  ? 'checked' : ''}}" id="muc-gia105"
													{{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '15000000-max'  ? 'checked' : ''}} value="15000000-max">
												<label for="muc-gia105">Trên 15 triệu</label>
											</div>
										</li>
										
										<li>
											<div class="radio">
												<input type="radio" name="muc-gia" class="choose_value {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == 'min-3000000'  ? 'checked' : ''}}" id="muc-gia490"
													{{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == 'min-3000000'  ? 'checked' : ''}} value="min-3000000">
												<label for="muc-gia490">Dưới 3 triệu</label>
											</div>
										</li>
		
									</ul>
								</div>
								@if (!empty($category))
									@if (count($category->properties) > 0)
										@foreach ($category->properties as $property)
											<div class="boxFilterLeft btn-group">
												<button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
													{{$property->name}} <span class="caret"></span>
												</button>
												
												<ul class="listform_filter right-property dropdown-menu" role="menu">
													@if (count($property->property_values) > 0)
														@foreach ($property->property_values as $property_value)
															<li>
																<div class="radio">
																<input class="choose_value {{!empty($_GET[$property->slug]) && $_GET[$property->slug] == $property_value->id  ? 'checked' : ''}}" type="radio" {{!empty($_GET[$property->slug]) && $_GET[$property->slug] == $property_value->id  ? 'checked' : ''}} name="{{$property->slug}}" value="{{$property_value->id}}" id="{{$property->slug.$property_value->id}}">
																	<label for="{{$property->slug.$property_value->id}}">{{$property_value->name}}</label>
																</div>
															</li>
														@endforeach
													@endif	
												</ul>
											</div>
										@endforeach
									@endif
								@endif
								<div class="boxFilterLeft btn-group">
									<button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown"
										aria-expanded="false">
										Sắp xếp theo <span class="caret"></span>
									</button>
									<ul class="listform_filter right-property dropdown-menu" role="menu">
								
										<li>
											<div class="radio">
												<input type="radio" class="choose_value {{!empty($_GET['sort']) && $_GET['sort'] == 'asc'  ? 'checked' : ''}}" name="sort" id="sort102"
													{{!empty($_GET['sort']) && $_GET['sort'] == 'asc'  ? 'checked' : ''}}
													value='asc'>
												<label for="sort102"> Từ thấp đến cao</label>
											</div>
										</li>
								
										<li>
											<div class="radio">
												<input type="radio" class="choose_value {{!empty($_GET['sort']) && $_GET['sort'] == 'desc'  ? 'checked' : ''}}" name="sort" id="sort103"
													{{!empty($_GET['sort']) && $_GET['sort'] == 'desc'  ? 'checked' : ''}}
													value="desc">
												<label for="sort103"> Từ cao đến thấp</label>
											</div>
										</li>
								
										
								
										
								
									</ul>
								</div>
								</form>	
								
		
								
							</div>
						</div>
					</div>
				</div>
		
			</div>
		</section>
		<div class="pro-content">
			<div class="container">
				<div class="pro-bg">
					<div class="row">
						
						
						{{-- <div class="col-md-3 col-xs-12 col-sm-12">
							<form id="form_filter" method="GET" action="">
								<div class="sidebar-left">
									@if (!empty($brands))
										<div class="box-filter">
											<h3>HÃNG SẢN XUẤT</h3>
											<ul class="listform_filter filterBrand">
												@foreach ($brands as $item)
													<li>
														<div class="radio">
														<input type="radio" name="hang-san-xuat" {{!empty($_GET['hang-san-xuat']) && $_GET['hang-san-xuat'] == $item->id  ? 'checked' : ''}} value="{{$item->id}}" id="brand_{{$item->id}}">
															<label for="brand_{{$item->id}}">
																<img src="{{$item->image}}" class="icImgBrand" alt="{{$item->name}}">
															</label>
														</div>
													</li>
												@endforeach
											</ul>
										</div>
									@endif
									<div class="box-filter">
										<h3>Mức giá</h3>
										<ul class="listform_filter right-property">
											<li>
												<div class="radio">
													<input type="radio" name="muc-gia" id="muc-gia102" {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '3000000-5000000'  ? 'checked' : ''}} value="3000000-5000000">
													<label for="muc-gia102"> 3 triệu - 5 triệu</label>
												</div>
											</li>
											
											<li>
												<div class="radio">
													<input type="radio" name="muc-gia" id="muc-gia103" {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '5000000-10000000'  ? 'checked' : ''}} value="5000000-10000000">
													<label for="muc-gia103"> 5 triệu - 10 triệu</label>
												</div>
											</li>
											
											<li>
												<div class="radio">
													<input type="radio" name="muc-gia" id="muc-gia104" {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '10000000-15000000'  ? 'checked' : ''}} value="10000000-15000000">
													<label for="muc-gia104"> 10 triệu - 15 triệu</label>
												</div>
											</li>
											
											<li>
												<div class="radio">
													<input type="radio" name="muc-gia" id="muc-gia105" {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == '15000000-max'  ? 'checked' : ''}} value="15000000-max">
													<label for="muc-gia105">Trên 15 triệu</label>
												</div>
											</li>
											
											<li>
												<div class="radio">
													<input type="radio" name="muc-gia" id="muc-gia490" {{!empty($_GET['muc-gia']) && $_GET['muc-gia'] == 'min-3000000'  ? 'checked' : ''}} value="min-3000000">
													<label for="muc-gia490">Dưới 3 triệu</label>
												</div>
											</li>
											
										</ul>
									</div>
									@if (!empty($category))
										@if (count($category->properties) > 0)
										@foreach ($category->properties as $property)
											<div class="box-filter">
												<h3>{{$property->name}}</h3>
												<ul class="listform_filter right-property">
													@if (count($property->property_values) > 0)
														@foreach ($property->property_values as $property_value)
															<li>
																<div class="radio">
																<input type="radio" {{!empty($_GET[$property->slug]) && $_GET[$property->slug] == $property_value->id  ? 'checked' : ''}} name="{{$property->slug}}" value="{{$property_value->id}}" id="{{$property->slug.$property_value->id}}">
																	<label for="{{$property->slug.$property_value->id}}">{{$property_value->name}}</label>
																</div>
															</li>
														@endforeach
													@endif	
												</ul>
											</div>
										@endforeach
										@endif
									@endif				
								</div>
							</form>
						</div> --}}
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="single-products">
								@if (!empty($products))
									<div class="hd-card-body">
										<h1><a href="#" class="fs-hotit"
												title="{{$category->name}} {{!empty($brand) ? $brand->name : ''}}">{{$category->name}}
												{{!empty($brand) ? $brand->name : ''}}</a></h1>
										<div class="row">
											@php
												$i = 1;
											@endphp
											@foreach ($products as $product)
												<div class="col-md-5h col-xs-6 col-sm-6">
													<div class="product-item">
														<div class="product-img">
															@php

															if (!empty($product->sale_price) && $product->price != 0) {
																$percent_sale = (($product->sale_price / $product->price)*100);
																
																$percent_sale2 = FLOOR(100 - $percent_sale);
															};
															@endphp
															@if (!empty($product->sale_price) && $product->price != 0)
																<div class="pro-badge">
																	<span>-{{ !empty($percent_sale2) ? $percent_sale2 : ''}}%</span>
																</div>
															@endif
												
															<div class="img-responsive">
																<a href="{{route('product_detail',['slug' => $product->slug])}}">
																	@if (count($product->galleries) > 0 && !empty($product->galleries))
																		<img src="{{!empty($product->galleries[0]->image) ? !empty($product->galleries[0]->image) ? $product->galleries[0]->image : asset('client/img/default_product.png') : asset('client/img/default_product.png')}}" alt="{{$product->name}}">
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
																	<label>{{$product->price != 0 ? pveser_numberformat($product->price) : 'Liên hệ'}}</label>
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
												@php
													$i++;
												@endphp
											@endforeach
										</div>
										<div class="lms-pagination pagination" total-post-current="{{get_option_by_key('posts_per_page')}}">
											<a style="cursor:pointer" class="next">Xem thêm <i class="fa fa-angle-right"></i></a>
										</div>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script>
		var form_filter = $('#form_filter').find('input[type=radio]');
		$(document).on('click','.choose_value',function() {
			
			if($(this).hasClass('checked')) {
				$(this).removeClass('checked');
				$(this).prop('checked', false );
				$('#form_filter').submit();
			} else {
				$(this).addClass('checked');
				$(this).prop('checked', true );
				$('#form_filter').submit();
			}
		})
	</script>
	
	<script>
		$('.lms-pagination.pagination').on('click',function() {
			total_post_current = $(this).attr('total-post-current');
			posts_per_page = `{{get_option_by_key('posts_per_page')}}`;
			$.ajax({
				url : `{{url('loadmore')}}`,
				method : 'POST',
				data : {
					_token : `{{csrf_token()}}`,
					total_post_current : total_post_current,
					category_id : `{{$category->id}}`,
					brand_id : `{{!empty($brand) ? $brand->id : null}}`,
					arr_get: `<?php echo !empty($_GET) ? json_encode($_GET) : '' ?> `,
				},
				success:function(data){ 
					
					new_posts_current = Number(total_post_current) + Number(posts_per_page);
					$('.pro-bg > .row').find('div.col-md-5h.col-xs-6.col-sm-6').last().after(data);
					$('.lms-pagination.pagination').attr('total-post-current',new_posts_current);
					
					if (data.length == 0) {
						$('.lms-pagination.pagination').remove();
					}
				}
			})
		});
	</script>
		
@endsection