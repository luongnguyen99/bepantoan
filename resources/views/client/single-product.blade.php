@extends('client.master.master')
@section('title')
{{ $product->name }}
@endsection
@section('content')

	<div class="single-pro product">
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
				    <li><a href="{{route('home_client')}}">bepantoan.vn</a></li>
					<li><a href="{{route('category_detail',['slug' => get_category_by_id($product->category_id)->slug])}}">{{get_category_by_id($product->category_id)->name}}</a></li>
					<li>{{$product->name}}</li>
				</ul>
			</div>
		</div>
		<div class="pro-content">
			<div class="container">
				<div class="hd-card-body-view section-margin-bottom">
					<div class="pro-content-top">
						<div class="row">
							<div class="col-md-5 col-xs-12 col-sm-12">
								<div class="slide-pro-img">
									<div id="sync1" class="owl-carousel owl-theme">
										@if (count($product->galleries) > 0) 
											@foreach ($product->galleries as $image)
												<div class="item">
													<img src="{{$image->image}}" alt="">
												</div>
											@endforeach
										@endif
									</div>
									<div id="sync2" class="owl-carousel owl-theme">
										@if (count($product->galleries) > 0) 
											@foreach ($product->galleries as $image)
												<div class="item">
													<img src="{{$image->image}}" alt="">
												</div>
											@endforeach
										@endif
									</div>
								</div>
								
								@if (!empty($product->gift))
								<div class="box-qua">
									<span class="icon-qua">
										<img src="{{asset('client/img/icon-qua2.png')}}" alt="">
									</span>
									@php
									$gift_arr = json_decode($product->gift,true);
									
									@endphp
									<ul class="ul-b list-qua">
										
										@foreach ($gift_arr as $gift)
										
										<li>
										<a href="{{!empty($gift['link']) ? $gift['link'] : ''}}"> <span><img style="width: 60px;" src="{{!empty($gift['image']) ? $gift['image'] : ''}}"></span><span><strong class="red">{{$gift['value']}}</strong></span></a>
										</li>
										@endforeach
										
									</ul>
								</div>
								@endif
									
		                        
							</div>
							<div class="col-md-4 col-xs-12 col-sm-12">
								<div class="productdecor-details">
								<h1>{{$product->name}}</h1>
									<div class="product-sets">
                                        <div class="pro-rating cendo-pro">
                                            <div class="pro_one">
												@php
													$width = $avg_comment * 20;
												@endphp
												@if ($width != 0)
                                                	<div class="tf-stars tf-stars-svg"><span style="width: {{$width}}% !important" class="tf-stars-svg"></span></div>
												@else
													<div class="tf-stars tf-stars-svg"><span style="width: 100% !important" class="tf-stars-svg"></span></div>
												@endif
                                            </div>
                                            <p class="rating-links">
												
												@if (!empty($avg_comment))
													<a>{{number_format($avg_comment,1,".","")}}</a> ({{$total_comment}} đánh giá)
												@else
													<a>5.0</a> ({{$total_comment}} đánh giá)
												@endif
                                            </p>
                                        </div>
                                    </div>
                                    <div id="product-details-lists">
										@php echo !empty($product->description) ? $product->description : 'Chưa cập nhập' @endphp
                                    </div>
                                    <div class="productdecor-price">
										
                                        <strong class="price">
											
											@if (!empty($product->sale_price) && $product->price != 0)
												<del><span>{{pveser_numberformat($product->price)}}</span></del>
												<span>{{pveser_numberformat($product->sale_price)}}</span>
											@else
												<span>{{ $product->price == 0 ? 'Liên hệ' : pveser_numberformat($product->price)}}</span>
											@endif
                                        </strong>
                                    </div>
                                    <div class="box_support">
                                        @if(!empty(get_option_by_key('sale')))
										{!! get_option_by_key('sale') !!}
										@endif
                                        <div class="product-call-requests">
                                        	<form>
                                        		<input class="ty-input-text-full cm-number form-control" id="PhoneRegister" type="tel" placeholder="Nhập số điện thoại " value="">
                                        		<button type="button" class="btn">Đăng ký ngay</button>
                                        		
                                        	</form>
                                            <span class="call-note">Chúng tôi sẽ gọi lại cho quý khách</span>
                                        </div>
                                    </div>
                                    <div class="product-sets">
                                        <div class="qty-block">
											<fieldset id="product-actions-fieldset">
												@if(!empty(get_option_by_key('hotline')))
												<?php $hotline = json_decode(get_option_by_key('hotline'),true) ?>
													<a class="btn" href="tel:{{ $hotline['phone'] }}"><i class="pe-7s-call"></i>Liên hệ trực tiếp:
													{{ $hotline['phone'] }} @endif 
												<span>(Để có giá tốt nhất)</span></a>
												@if (!empty($product->price) != 0)
													<form action="{{route('cart.addCart')}}" method="POST">
														@csrf
														<input type="hidden" name="id_product" value={{$product->id}}>
														<input type="hidden" name="ip" value={{$_SERVER['REMOTE_ADDR']}}>
														<a href="#" id-product={{$product->id}} class="buy_now btn btn-default btn-b1 btn-cart">
															<i class="pe-7s-cart"></i>Mua ngay<span>(Xem hàng, không mua không sao)</span>
														</a>
													</form>
												@endif
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="whotline">
                                        <li>
											@if (!empty(get_option_by_key('switchboard')))
												@php
												$sb = json_decode(get_option_by_key('switchboard'),true)
												@endphp
													<a href="tel:{{ $sb['content'] }}">
                                                <span>{{ $sb['content'] }}</span>
												<p class="hotline">{{ $sb['phone'] }}</p>
												@endif
                                            </a>
                                        </li>
                                        <li>
											@if (!empty(get_option_by_key('hotline')))
												@php
													$hl = json_decode(get_option_by_key('hotline'),true)
												@endphp
                                            	<a href="tel:{{ $hl['content'] }}">
												<span>{{ $hl['content'] }}</span>
												<p class="hotline">{{ $hl['phone'] }}</p>
												@endif
                                            </a>
                                        </li>
                                    </div>
								</div>
							</div>
							<div class="col-md-3 col-xs-12 col-sm-12">
								<div class="why-buy hidden-xs">
		                            <label>Tại sao mua hàng tại BEPANTOAN.VN ?</label>
		                        </div>
		                        <div class="wsupport-s">
									@if (!empty(get_option_by_key('sidebar')))
									@php
										$sb = json_decode(get_option_by_key('sidebar'),true);
									@endphp
									@if (!empty($sb))
										@foreach ($sb as $item)
										<li>
											<i class="{{ $item['icon'] }}"></i>
											<p>
												{{ $item['text'] }}
											</p>
										</li>
										@endforeach
									@endif
									@endif
		                        </div>
		                        <div class="map-bt">
									@if (count($showrooms) > 0 && !empty($showrooms) )
										<label>Hệ thống siêu thị:</label>
										@foreach ($showrooms as $item)
											<p>
											<i class="fa fa-map-marker"></i>{{$item->name}}<br>
												<span>{{!empty($item->address) ? $item->address : ''}}</span>
											</p>
										@endforeach
									@endif
		                            
		                        </div>
							</div>
						</div>
						<div class="col_product_view">
							<div class="row">
		                        <div class="col-md-8 pdr_0 col-xs-12 col-sm-8">
		                            <div class="description-title">Thông tin chi tiết</div>
		                            <div class="description-content">
		                                @php echo !empty($product->infomation_detail) ? $product->infomation_detail : 'Chưa cập nhập' @endphp

		                            </div>
		                            <div class="show-more">
		                                <a href="javascript:void(0)" class="readmore" id="js-show-more"> Xem Thêm</a>
		                            </div>
		                        </div>

		                        <div class="col-md-4 col-xs-12 col-sm-4 pdl_0">
		                            <div class="attribute-title">Thông số kỹ thuật</div>
		                            <div class="attribute-content">
										@if (!empty($product->specifications))
										@php
											$specifications_arr = json_decode($product->specifications,true);
											
										@endphp
											<table border="0" cellpadding="0" class="table">
												<tbody>
												@foreach ($specifications_arr as $specification)
													<tr>
														<td>
															<p>{{$specification['key']}}</p>
														</td>
														<td>
															<p>{{$specification['value']}}</p>
														</td>
													</tr>
												@endforeach
												</tbody>
											</table>
										@endif
									
		                            </div>
		                              <div class="show-more">
		                                <a href="javascript:void(0)" class="readmore" id="js2-show-more">Xem thêm thông số  </a>
		                            </div>
		                        </div>
		                    </div>
						</div>
					</div>
				</div>
				<div class="hd-card-body section-margin-bottom">
					@if (!empty(get_products_by_category_id($product->category_id)))
						<div class="hd-module-title">
							<h3 class="module-title">Sản phẩm Liên quan</h3>
						</div>
						<div class="row">
						
							@foreach (get_products_by_category_id($product->category_id) as $item_product)
								
								<div class="col-md-5h col-xs-6 col-sm-6">
									<div class="product-item">
										<div class="product-img">
											@php
											if (!empty($item_product->sale_price) && $item_product->price != 0) {
												$percent_sale = ((int)$item_product->sale_price / (int)$item_product->price)*100;
												$percent_sale2 = round(100 - $percent_sale,0);
												// dd($percent_sale2);
											};
											@endphp
											@if (!empty($item_product->sale_price) && $item_product->price != 0)
												<div class="pro-badge">
													<span>-{{$percent_sale2}}%</span>
												</div>
											@endif
											<div class="img-responsive">
												<a href="{{route('product_detail',['slug' => $item_product->slug])}}">
													@if (count($item_product->galleries) > 0 && !empty($item_product->galleries))
													<img src="{{$item_product->galleries[0]->image}}" alt="{{$item_product->name}}">
													@endif
												</a>
											</div>
										</div>
										<div class="product-dsc">
											<h3><a href="{{route('product_detail',['slug' => $item_product->slug])}}">{{$item_product->name}}</a></h3>
											<div class="cate_pro_title">
												<a href="#" class="prdBrand">
												<img alt="{{$item_product->brand->name}}" src="{{$item_product->brand->image}}"></a>
											</div>
											@if (!empty($item_product->gift))
                                            @php
                                            $arr_gift = json_decode($item_product->gift,true);
                                            @endphp
                                                @foreach ($arr_gift as $gift)
                                                    <div class="gift-sale">
                                                        <strong>{{$gift['value']}}</strong>
                                                    </div>
                                                @endforeach
                                            @endif
											<div class="cate_pro_bot">
												@if (!empty($item_product->sale_price) && $item_product->price != 0)
                                                    <label>{{pveser_numberformat($item_product->sale_price)}}</label>   
                                                    <span>{{pveser_numberformat($item_product->price)}}</span>
                                                @else
                                                    <label>{{$item_product->price == 0 ? 'Liên hệ' : pveser_numberformat($item_product->price)}}</label>
                                                @endif
									
											</div>
										</div>
										<div class="actions-btn">
											<a href="{{route('product_detail',['slug' => $item->slug])}}"><i class="fa fa-eye"></i></a>
											
											<form action="{{route('cart.addCart')}}" method="POST">
												@csrf
												<input type="hidden" name="id_product" value={{$item_product->id}}>
												<input type="hidden" name="ip" value={{$_SERVER['REMOTE_ADDR']}}>
												<a href="#" id-product="{{$item_product->id}}" class="buy_now"><i class="fa fa-shopping-basket"></i></a>
											</form>
											
										</div>
									</div>
								</div>
							@endforeach
							
						</div>
					@endif
				</div>
				<div class="hd-card-body section-margin-bottom ">
					@if (count($productsRandom) > 0 && !empty($productsRandom))
						<div class="hd-module-title">
							<h3 class="module-title">Sản phẩm khách hàng quan tâm</h3>
						</div>
						<div class="row">
							@foreach ($productsRandom as $product_random)
								<div class="col-md-5h col-xs-6 col-sm-6">
									<div class="product-item">
										<div class="product-img">
											@php
											if (!empty($product_random->sale_price) && $product_random->price != 0) {
											$percent_sale = ((int)$product_random->sale_price / (int)$product_random->price)*100;
											$percent_sale2 = round(100 - $percent_sale,0);
										
											};
											@endphp
											@if (!empty($product_random->sale_price) && $product_random->price != 0 )
											<div class="pro-badge">
												<span>-{{$percent_sale2}}%</span>
											</div>
											@endif
											<div class="img-responsive">
												<a href="{{route('product_detail',['slug' => $product_random->slug])}}">
													@if (count($product_random->galleries) > 0 && !empty($product_random->galleries))
													<img src="{{$product_random->galleries[0]->image}}" alt="{{$product_random->name}}">
													@endif
												</a>
											</div>
										</div>
										<div class="product-dsc">
											<h3><a href="{{route('product_detail',['slug' => $product_random->slug])}}">{{$product_random->name}}</a></h3>
											<div class="cate_pro_title">
												<a href="#" class="prdBrand">
													<img alt="{{$product_random->brand->name}}" src="{{$product_random->brand->image}}"></a>
											</div>
											@if (!empty($product_random->gift))
											@php
											$arr_gift = json_decode($product_random->gift,true);
											@endphp
											@foreach ($arr_gift as $gift)
											<div class="gift-sale">
												<strong>{{$gift['value']}}</strong>
											</div>
											@endforeach
											@endif
											<div class="cate_pro_bot">
												@if (!empty($product_random->sale_price))
												<label>{{pveser_numberformat($product_random->sale_price)}}</label>
												<span>{{pveser_numberformat($product_random->price)}}</span>
												@else
												<label>{{$item_product->price == 0 ? 'Liên hệ' : pveser_numberformat($item_product->price)}}</label>
												@endif
									
											</div>
										</div>
										<div class="actions-btn">
											<a href="{{route('product_detail',['slug' => $product_random->slug])}}"><i class="fa fa-eye"></i></a>
											<form action="{{route('cart.addCart')}}" method="POST">
												@csrf
												<input type="hidden" name="id_product" value={{$product_random->id}}>
												<input type="hidden" name="ip" value={{$_SERVER['REMOTE_ADDR']}}>
												<a href="#" id-product="{{$product_random->id}}" class="buy_now"><i class="fa fa-shopping-basket"></i></a>					
											</form>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					@endif
				</div>
				<div class="hd-card-body over section-margin-bottom ">
					<div class="hd-module-title">
	                    <h3 class="module-title">Đánh giá </h3>
	                </div>
	                <div class="warr-reviews">
	                	<div class="row">
	                        <div class="col-md-4 col-sm-6 col-xs-6">
	                            <div class="tf-score">
									
	                                <div class="tf-rating">{{ !empty($avg_comment) ? number_format($avg_comment,1,".","") : 5}}/5</div>
	                                <div class="tf-stars tf-stars-svg"><span style="width: 100% !important" class="tf-stars-svg"></span></div>
	                                <div class="tf-based">Có {{$total_comment}} đánh giá</div>
	                            </div>
							</div>
							@php
								$total_comment = $total_comment < 1 ? 1 :  $total_comment;
								$width_5s = ($total_comment_5s / $total_comment) * 100;
								$width_4s = ($total_comment_4s / $total_comment) * 100;
								$width_3s = ($total_comment_3s / $total_comment) * 100;
								$width_2s = ($total_comment_2s / $total_comment) * 100;
								$width_1s = ($total_comment_1s / $total_comment) * 100;
								// dd($width_5s);
							@endphp
	                        <div class="col-md-4 col-sm-6 col-xs-6">
	                            <ul class="ratingBarList">
	                                <li class="ratingBarListItem">
	                                    <span class="ratingBarLabel ">5 ☆</span>
	                                    <span class="ratingBarLineCell">
	                                        <span class="ratingBarLine">
	                                            <span style="width: {{$width_5s}}%;" class="ratingBarLevel"></span>
	                                        </span>
	                                    </span>
										<span class="ratingBarCount">{{$total_comment_5s}}</span>
	                                </li>
	                                <li class="ratingBarListItem">
	                                    <span class="ratingBarLabel ">4 ☆</span>
	                                    <span class="ratingBarLineCell">
	                                        <span class="ratingBarLine">
	                                            <span style="width: {{$width_4s}}%;" class="ratingBarLevel"></span>
	                                        </span>
	                                    </span>
	                                    <span class="ratingBarCount">{{$total_comment_4s}}</span>
	                                </li>
	                                <li class="ratingBarListItem">
	                                    <span class="ratingBarLabel ">3 ☆</span>
	                                    <span class="ratingBarLineCell">
	                                        <span class="ratingBarLine">
	                                            <span style="width: {{$width_3s}}%;" class="ratingBarLevel"></span>
	                                        </span>
	                                    </span>
	                                    <span class="ratingBarCount">{{$total_comment_3s}}</span>
	                                </li>
	                                <li class="ratingBarListItem">
	                                    <span class="ratingBarLabel ">2 ☆</span>
	                                    <span class="ratingBarLineCell">
	                                        <span class="ratingBarLine">
	                                            <span style="width: {{$width_2s}}%;" class="ratingBarLevel"></span>
	                                        </span>
	                                    </span>
	                                    <span class="ratingBarCount">{{$total_comment_2s}}</span>
	                                </li>
	                                <li class="ratingBarListItem">
	                                    <span class="ratingBarLabel ">1 ☆</span>
	                                    <span class="ratingBarLineCell">
	                                        <span class="ratingBarLine">
	                                            <span style="width: {{$width_1s}}%;" class="ratingBarLevel"></span>
	                                        </span>
	                                    </span>
	                                    <span class="ratingBarCount">{{$total_comment_1s}}</span>
	                                </li>
	                            </ul>
	                        </div>
	                        <div class="col-md-4 col-sm-6 col-xs-12">
	                            <div class="review-btn">
	                                <p>Bạn nghĩ sao về sản phẩm này?</p>
	                                <button class="btn add_review" type="submit">Đánh giá ngay</button>
	                            </div>
	                        </div>
	                    </div>
						<form class="form-horizontal form-review" method="post" name="comment_form" id="commentForm" >
							<h2 class="write">Viết nội dung đánh giá</h2>
							@csrf
	                        <div class="ratingStars">
	                            <div class="ratingStarsWrap">
	                                <input class="ratingStarsInput" id="ratingStarsItem-5" type="radio" name="vote" value="5">
	                                <label class="ratingStarsStar" for="ratingStarsItem-5" data-title="Rất tốt"></label>
	                                <input class="ratingStarsInput" id="ratingStarsItem-4" type="radio" name="vote" value="4">
	                                <label class="ratingStarsStar" for="ratingStarsItem-4" data-title="Tốt"></label>
	                                <input class="ratingStarsInput" id="ratingStarsItem-3" type="radio" name="vote" value="3">
	                                <label class="ratingStarsStar" for="ratingStarsItem-3" data-title="Bình thường"></label>
	                                <input class="ratingStarsInput" id="ratingStarsItem-2" type="radio" name="vote" value="2">
	                                <label class="ratingStarsStar" for="ratingStarsItem-2" data-title="Tệ"></label>
	                                <input class="ratingStarsInput" id="ratingStarsItem-1" type="radio" name="vote" value="1">
	                                <label class="ratingStarsStar" for="ratingStarsItem-1" data-title="Rất tệ"></label>
	                            </div>
	                        </div>

	                        <div class="form-group required">
	                            <div class="col-sm-6">
	                                <label class="control-label" for="input-name">Họ và tên</label>
	                                <input name="name" id="name" class="form-control" type="text" value="">
	                            </div>
	                            <div class="col-sm-6">
	                                <label class="control-label" for="input-name">Số điện thoại</label>
	                                <input name="phone" id="phone" class="form-control" type="text" value="">
	                            </div>
	                        </div>
	                        <div class="form-group required">
	                            <div class="col-sm-12">
	                                <label class="control-label" for="input-review">Nội dung</label>
	                                <textarea name="content" id="content" class="form-control" rows="5"></textarea>
	                            </div>
	                        </div>
	                        {{-- <div class="form-group info-cus col-md-6"> --}}
	                            {{-- <input type="text" class="form-control w30p security fl" name="XNCode" id="ValidCode" required="required" autocomplete="off" value="" size="40" placeholder="Mã bảo mật"> --}}
	                            <!-- <img src="/ajax/Security.html" class="vAlignMiddle pl10" id="imgValidCode" alt="security code">
	                            <a href="javascript:void(0)" onclick="change_captcha()" title="Tạo mã khác" rel="nofollow">
	                                <img src="/Content/pc/css/images/icon-refreh.png" alt="refresh security code">
	                            </a> -->
	                        {{-- </div> --}}
	                        
	                        <div class="form-group">
	                            <button type="submit" class="btn submitcomment">Gửi</button>
	                        </div>
	                    </form>
	                    <ul class="comments-list"></ul>
	                </div>
				</div>
				<div class="hd-card-body section-margin-bottom ">
	                <div class="hd-module-title">
	                    <h3 class="module-title">Sản phẩm đã xem</h3>
	                </div>
	                <div class="single-sidebar">
	                	<div class="owl-carousel owl-theme slide-pro-seen">
							@if (!empty($_COOKIE['arr_id_history']))
								@php
								$arr_history = json_decode($_COOKIE['arr_id_history'],true);
								@endphp
								@if (count($arr_history) > 0)
									@foreach (array_reverse($arr_history) as $item)
									
										<div class="item">
											<div class="slide-pro-seen-item">
												<div class="tb-recent-thumbb">
													<a href="{{route('product_detail',['slug' => !empty(get_product_by_id($item)->slug) ? get_product_by_id($item)->slug : ''])}}" class="active">
														<img class="attachment"
													src="{{!empty(get_product_by_id($item)->galleries[0]) ?  get_product_by_id($item)->galleries[0]->image : ''}}"
															alt="{{!empty(get_product_by_id($item)->name) ? get_product_by_id($item)->name : ''}}">
													</a>
												</div>
												<div class="title-beg">
													<a href="{{ route('product_detail',['slug' => !empty(get_product_by_id($item)->slug) ? get_product_by_id($item)->slug : '']) }}">{{!empty(get_product_by_id($item)->name) ? get_product_by_id($item)->name : ''}}</a>
												</div>
												<div class="title-price-recent">{{!empty(get_product_by_id($item)->sale_price) ?
												!empty(get_product_by_id($item)->sale_price) ? pveser_numberformat(get_product_by_id($item)->sale_price) : '' :
												!empty(get_product_by_id($item)->price) ? pveser_numberformat(get_product_by_id($item)->price) : ''}}</div>
											</div> 
										</div>
									@endforeach
								@endif
							@endif
						</div>
	                </div>
	            </div>
			</div>
		</div>
	
	</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
	$(function() {
		$.ajax({
			url:"{{ route('saveCookieHistory') }}",
			method:"POST",
			data: {
				product_id : `{{$product->id}}`,
				_token : `{{csrf_token()}}`,
			},
			success : function(data) {
				console.log(data);
			}
		})
	})
	$(function(){
		$('.submitcomment').on('click',function(e) {
			e.preventDefault();
				var formData = new FormData($('#commentForm')[0]);
				formData.set('product_id',`{{$product->id}}`);
				$.ajax({
					url:"{{ route('rate_star') }}",
					method:"POST",
					processData: false,
					contentType: false,
					data: formData,
					success:function(data){
						if (data.errors) {
							html = '';
							if (typeof data.messages.vote != 'undefined') {
								html += `<li>${data.messages.vote[0]}</li>`;			
							};
							if (typeof data.messages.name != 'undefined') {
								html += `<li>${data.messages.name[0]}</li>`;
							};
							if (typeof data.messages.phone != 'undefined') {
								html += `<li>${data.messages.phone[0]}</li>`;
							};
							if (typeof data.messages.content != 'undefined') {
								html += `<li>${data.messages.content[0]}</li>`;
							};
							Swal.fire({
							
							icon: 'error',
							html:
							`<ul style="text-decoration: none;line-height: 2;font-size: 15px;">${html}</ul>`,
							focusConfirm: false,
							confirmButtonText:
							' Ok!',
							})
						}else{
							Swal.fire({
							icon: 'success',
							title: 'Thành công',
							text: 'Đánh giá thành công!',
							}).then((result) => {
								if (result.value) {
									window.location.reload();
								}
							})
							
						}
					}
			})
		})
	})
</script>
@endsection