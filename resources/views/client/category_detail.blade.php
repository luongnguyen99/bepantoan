@extends('client.master.master')
@section('title')
{{$category->name}}
{{!empty($brand) ? $brand->name : ''}}
@endsection
@section('css')
	<style>
	input[type="radio"] {
	-webkit-appearance: checkbox;
	-moz-appearance: checkbox;
	-ms-appearance: checkbox; /* not currently supported */
	-o-appearance: checkbox; /* not currently supported */
	}
	</style>
@endsection
@section('content')
<div class="home">
	<div class="product">
		<div class="wrap-category hidden-xs hidden-sm" id="ProductCategory">
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
		</div>
		<div class="page-bread">
			<div class="container">
				<ul>
				    <li><a href="#">beptot.vn</a></li>
				    <li><a href="#">Bếp gas</a></li>
				    <li>Bếp gas Teka</li>
				</ul>
			</div>
		</div>
		<div class="pro-content">
			<div class="container">
				<div class="pro-bg">
					<div class="row">
						<div class="col-md-3 col-xs-12 col-sm-12">
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
						</div>
						<div class="col-md-9 col-xs-12 col-sm-12">
							<div class="single-products">
								@if (!empty($products))
									<div class="hd-card-body">
										<h1><a href="#" class="fs-hotit"
												title="{{$category->name}} {{!empty($brand) ? $brand->name : ''}}">{{$category->name}}
												{{!empty($brand) ? $brand->name : ''}}</a></h1>
										<div class="row product-fs">
											@php
												$i = 1;
											@endphp
											@foreach ($products as $product)
												<div class="col-md-3 col-xs-6 col-sm-6" style={{$i % 5 == 0 ? 'clear:both' : ''}}>
													<div class="product-item">
														<div class="product-img">
															@php
															if (!empty($product->sale_price)) {
																$percent_sale = (($product->sale_price / $product->price)*100);
																
																$percent_sale2 = FLOOR(100 - $percent_sale);
																};
															@endphp
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
															<a href="{{route('product_detail',['slug' => $product->slug])}}"><i class="fa fa-eye"></i></a>
															<a href="{{route('product_detail',['slug' => $product->slug])}}" class="buy_now"><i class="fa fa-shopping-basket"></i></a>
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
		$(document).on('change',form_filter,function() {
			$('#form_filter').submit();
		})
	</script>
	
	<script>
		$('.lms-pagination.pagination').on('click',function() {
			total_post_current = $(this).attr('total-post-current');
			$.ajax({
				url : `{{url('loadmore')}}`,
				method : 'POST',
				data : {
					_token : `{{csrf_token()}}`,
					total_post_current : total_post_current,
					category_id : `{{$category->id}}`,
					brand_id : `{{!empty($brand) ? $brand->id : null}}`,
					$_get: `{{!empty($_GET) ? $_GET : ''}}`,
				},
				success:function(data){ 
					console.log(data);
				}
			})
		});
	</script>
		
@endsection