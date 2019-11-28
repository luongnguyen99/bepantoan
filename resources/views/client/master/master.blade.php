<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('client/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/font-akr.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/pe-icon-7-stroke.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/helper.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/style.css')}}">
	@yield('css')
</head>

<?php 

	$menu = get_option_by_key('logo');
	$name_site = get_option_by_key('general_name_site');
	$desc_site = get_option_by_key('general_description_site');
	$h_code = get_option_by_key('general_header_code');
	$f_code = get_option_by_key('general_footer_code');
	$logo = get_option_by_key('logo');
	$hotline = get_option_by_key('hotline');
	$menu = get_option_by_key('menu');
	$slide = get_option_by_key('slide');
	$menu_mobile = get_option_by_key('menu_phone');
	$payment = get_option_by_key('payment');
	$social_network_j = get_option_by_key('social_network');
	$footer_j = get_option_by_key('footer');

?>
{{ $h_code }}
<body>
	<header>
		
		<div class="header-pc hidden-xs hidden-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-xs-12 col-sm-12">
						<div class="logo">

							<a href="<?php echo URL::to('/'); ?>">
								@if($logo != null)
									<img src="{{ $logo }}" alt="{{ $name_site }}">
								@else
									<h1 class="text-logo-header"> {{$name_site}} </h1>
								@endif
							</a>
						</div>
					</div>
					<div class="col-md-3 col-xs-12 col-sm-12">
						<div class="form-search">
							<form method="post" action="{{ route('tim-kiem') }}">
								@csrf
								<input id="search" type="text" name="search" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
								<button type="button" class="btn">Tìm kiếm</button>
								<ul id="search_prd" class="resuiltSearch ul-menu-muiten search-suggest">
								</ul>

							</form>
						</div>
					</div>
					<div class="col-md-7 col-xs-12 col-sm-12">
						<div class="quick-menu hidden-xs">
							<?php								
								$menu = json_decode($menu, true);
							?>
							
							@if (isset($menu) && !empty($menu))
							@foreach ( $menu as $item_menu )
								<a href="{{ isset($item_menu['link']) && !empty($item_menu['link']) ? $item_menu['link'] : "#"  }}" class="{{ isset($item_menu['clss']) && !empty($item_menu['clss']) ? $item_menu['clss'] : false  }}" ><i class="{{ $item_menu['icon'] }}"></i>{{ $item_menu['name'] }}</a>
							@endforeach
							@endif


							@php
								$hotline = json_decode($hotline, true);
								$hotline = $hotline['phone'];
							@endphp
							
							<a class="hotline" href="tel:{{ $hotline }}" rel=""><i class="pe-7s-call"></i>
								@if ($hotline)
									{{ $hotline }}
								@endif
							</a>
					    </div>
					    <div class="quick-cart">
							<a href="{{route('showCart')}}" target="_blank" rel="">
							<img alt="BẾP TỐT" src="client/img/cart_bg.png"><span class="num">{{Cart::count()}}</span>
					        </a>
					    </div>
					</div>
				</div>
			</div>
		</div>

		<div class="header-mobile hidden-md hidden-lg">
			<div class="container">
				<div class="row">
					<div class="col-xs-3 col-sm-2">
						<div class="menu-site">
			                <button class="btn btn-show-menu hidden-md hidden-lg"><i class="fa fa-bars"></i></button>
			                <div class="menu-box">
								<div class="bg-menu hidden-md hidden-lg"></div>
								
			                    <ul class="main-menu">
			                    	<span class="logo-menu">
			                    		<img src="client/img/logo-bepantoan.png" alt="">
									</span>
									
									@php
										build_categories_tree();

									@endphp


									
									
					                <ul class="mobile-support">

										@if (isset($menu) && !empty($menu))
										@foreach ( $menu as $item_menu )
											<li><i class="pe-7s-news-paper"></i><a href="{{ $item_menu['link']  }}">{{ $item_menu['name'] }}</a></li>
										@endforeach
										@endif
								        <li>
											<a href="tel:{{$hotline}}">
								            	<i class="pe-7s-call"></i>
												Hotline <b>{{$hotline}}</b> (24h/7)
											</a> 
										</li>
										

    								</ul>

								</ul>
								

 			                    <!--<button class="btn btn-hide-menu hidden-md hidden-lg"><i class="fa fa-times"></i></button> -->
			                </div>
				        </div>
					</div>
					<div class="col-xs-6 col-sm-8">
						<div class="logo">
							<a href="#"><img src="client/img/logo-bepantoan.png" alt=""></a>
						</div>
						
					</div>

					<div class="col-xs-3 col-sm-2">
						<div class="quick-cart">
					        <a href="#" target="_blank" rel="">
					            <img alt="BẾP TỐT" src="client/img/cart_bg.png"><span class="num">0</span>
					        </a>
					    </div>
					</div>
					<div class="col-xs-12 col-sm-12">
						<div class="form-search">
							<form>
								<input  type="text" name="" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
								<button type="button" class="btn">Tìm kiếm</button>
								<ul class="resuiltSearch ul-menu-muiten search-suggest">
								    <li class="page">Tìm trong <a href="#" target="_blank">Lò nướng Hafele</a></li>
								    <li class="page">Tìm trong <a href="#" target="_blank">Tủ lạnh Hafele</a></li>
								    <li class="page">Tìm trong <a href="#" target="_blank">Tủ rượu Hafele</a></li>
								    <li>
                                        <a href="#">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="https://beptot.vn/Data/ResizeImage/images/7636_bep_gas_am_eurosun_eu_ga287x100x100x4.jpg" class="media-object thumb">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading name-prd">Bếp Gas Âm Eurosun EU-GA287</h4>
                                                    <p class="pri-item ss-name">2,760,000<sup>₫</sup></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="https://beptot.vn/Data/ResizeImage/images/7636_bep_gas_am_eurosun_eu_ga287x100x100x4.jpg" class="media-object thumb">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading name-prd">Bếp Gas Âm Eurosun EU-GA287</h4>
                                                    <p class="pri-item ss-name">2,760,000<sup>₫</sup></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
								</ul>

							</form>
						</div>
						
					</div>
					<div class="col-xs-12 col-sm-12">
						<div class="btn-group-cate hidden-lg hidden-md">
					        <button type="button" class="btn-category dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					            Danh mục sản phẩm <span class="caret"></span>
					        </button>
					        <ul class="dropdown-menu sub-categories-mobile" role="menu">
					        	<?php foreach(range(1, 8) as $number ): ?>
					            <li>
					            	<a href="#" rel=""><span>
					                <img src="https://beptot.vn/Data/ResizeImage/files/page/bep_tux100x100x4.png" alt="Bếp từ"></span>Bếp từ</a> 
					            </li>
					            <?php endforeach; ?>
					        </ul>
					    </div>
					</div>
				</div>
				
			</div>
		</div> <!-- menu mobile  -->
		
	</header><!-- /header -->

	@yield('content')

	<footer>
			<div class="footer-top">
				<div class="container">
					<div class="row">
						
						@if (!empty(get_option_by_key('footer')))
						@php
						$ft = json_decode(get_option_by_key('footer'),true);
						@endphp
						@foreach ($ft as $item)
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="single-text res-text">
							{!! $item !!}
							</div>
						</div>
						@endforeach
						@endif
						
					</div>
				</div>
				
			</div>
			<div class="social-media">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="paypal social-icon">
								<ul>
									{{-- @if (!empty($payment))
									@foreach ($payment as $item)
									<li><a href=""><i class="{{ $item['type'] }}"></i></a></li>
									@endforeach
									@endif --}}
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="social-icon">
								<ul class="floatright">
									{{-- @if ($social_network_j != null)
									@foreach ($social_network_j as $item)
									<li class="res-mar"><a href="#"><i class="{{ $item['type'] }}"></i></a></li>
									@endforeach
									@endif --}}
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-map">
				<div class="container">
					<div class="foot-head">
						Hệ thống showroom Beptot.vn
					</div>
					<ul class="footer-address">
						@php
							$sw = App\Models\Showroom::all();
						@endphp
						@if (!empty($sw))
						@foreach ($sw as $item)
						<li>
							<div class="bg">
								<h4>{{ $item->name }}</h4>
								<address>
									<b>{{ $item->address }}</b>
								</address>
								<div class="phone">
									<div>
										<label>Điện thoại cơ sở: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">{{ $item->hotline }}</a></span>
									</div>
									<div>
										<label style="color: black !important">Hotline: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">{{ $item->phone }}</a></span>
									</div>
								</div>
								<img src="{{ $item->img }}" alt="">
								<a href="#" title="Giới thiệu Showroom" class="btn btnintro" style="font: 11px/20px arial; color: #fff; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Xem chi tiết</a>
								<a data-toggle="modal" data-target="#exampleModalCenter{{ $item->id }}" href="#" id="map3" class="btn btnmap showMap" style="font: 11px/20px arial; color: #fff; background: #1665ab; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Bản đồ đường đi</a>
							</div>
						</li>
						@endforeach
						@endif
					</ul>
					
					@if (!empty($sw))
					@foreach ($sw as $item)
					<!-- Modal -->
					<div class="modal  fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog  modal-dialog-centered" role="document">
						<div class="modal-content" style="border-radius:0%">
						<div class="modal-header text-center" style="background-color:#dd1015;color:white">
							<h5 class="modal-title" style="line-height: 10%;padding-top: 10px;" id="exampleModalLongTitle">{{ $item->name }}</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div style="max-width:100%; overflow:hidden">
								{!! $item->embed_google_map !!}
							</div>
						</div>
						
						</div>
					</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							@if (isset($footer_j['footer']))
							<p>
								{{ $footer_j['footer'] }}
							</p>
							@endif
						</div>
					</div>
				</div>
			</div>
		</footer>	
	
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=503684500482559&autoLogAppEvents=1"></script>
	
		<script type="text/javascript" src="{{asset('client/js/jquery-1.9.1.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/jquery-ui.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/jquery-scrolltofixed-min.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/owl.carousel.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/custom.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/main.js')}}"></script>
		<script>
			
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$("#search").keyup(function() {
			var key = $('#search').val();
			
			if(key != ''){
				$.ajax({
					url:"{{ route("master.search") }}",
					method:"GET",
					data:{key:key},
					success:function(data){
						var arr_prd = data.prd;
						var arr_cate = data.cate;
						var html = '';
						jQuery.each(arr_cate,function(key,item){
							html += '<li class="page">Tìm trong <a href="#" target="_blank">'+item.name+'</a></li>'
						});
						jQuery.each(arr_prd,function(key,item){
							html += '<li>'+
							'<a href="san-pham/'+item.slug+'">'+
								'<div class="media">'+
									'<div class="media-left">'+
										'<img src="'+item.image+'" class="media-object thumb">'+
									'</div>'+
									'<div class="media-body">'+
										'<h4 class="media-heading name-prd">'+item.name+'</h4>'+
										'<p class="pri-item ss-name">'+item.price+'<sup>₫</sup></p>'+
									'</div>'+
								'</div>'+
							'</a>'+
							'</li>'
						});
						$('#search_prd').html(html);
					}
				});
			}else{
				$('#search_prd').html('')
			}
		});
		</script>
		@yield('js')
	</body>
	</html>