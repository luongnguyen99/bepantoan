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
// echo '<pre>';
// print_r($data_general);
// echo '</pre>';

// echo '<pre>';
// print_r(get_option_by_key('general_description_site'));
// echo '</pre>';

?>
<body>
	<header>
		<div class="header-pc hidden-xs hidden-sm">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-xs-12 col-sm-12">
						<div class="logo">
							{{-- <a href="<?php echo URL::to('/'); ?>"><img src="
								@if($logo != null)
								{{ $logo }}
								@endif
								" alt="{{ $data_general['name_site'] }}">
							</a> --}}
						</div>
					</div>
					<div class="col-md-3 col-xs-12 col-sm-12">
						<div class="form-search">
							<form>
								<input type="text" name="" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
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
					<div class="col-md-7 col-xs-12 col-sm-12">
						<div class="quick-menu hidden-xs">
					        <a href="#"><i class="pe-7s-shopbag"></i>Sản phẩm</a>
					        
					        <a href="#" rel=""><i class="pe-7s-news-paper"></i>Tin tức</a>
					        
					        <a href="#" rel=""><i class="pe-7s-tools"></i>Dịch vụ</a>
					        
							<a class="km" href="#" target="_blank" rel=""><i class="pe-7s-gift"></i>Khuyến mãi</a>
							
							
							<a class="hotline" href="tel:{{ $hotline_j['phone'] }}" rel=""><i class="pe-7s-call"></i>
								@if ($hotline_j['phone'])
									{{ $hotline_j['phone'] }}
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
			                        <li class="ng-scope  drop-icon re-icon">
					                    <a href="#"><span>
					                        <img src="https://beptot.vn/Data/ResizeImage/files/page/bep_tux100x100x4.png" alt="Bếp từ"></span>Bếp từ
					                    </a>
					                </li>
			                        <li class="ng-scope  drop-icon re-icon">
					                    <a href="#"><span>
					                        <img src="https://beptot.vn/Data/ResizeImage/files/page/bep_tux100x100x4.png" alt="Bếp từ"></span>Bếp từ
					                    </a>
					                </li>
					                <li class="ng-scope  drop-icon re-icon menu-item-has-children">
					                    <a href="#"><span>
					                        <img src="https://beptot.vn/Data/ResizeImage/files/page/bep_tux100x100x4.png" alt="Bếp từ"></span>Bếp từ
					                    </a>
					                    <ul class="sub-menu">
					                        <li class="ng-scope ng-has-child1"><a href="#">Máy sấy chén bát âm tủ</a> </li>
					                        <li class="ng-scope ng-has-child1"><a href="#">Máy sấy chén bát âm tủ</a> </li>
					                    </ul>
					                </li>
					                <ul class="mobile-support">
								        <li><i class="pe-7s-news-paper"></i><a href="#c">Tin tức</a></li>
								        <li><i class="pe-7s-tools"></i><a href="#">Dịch vụ</a></li>
								        <li><i class="pe-7s-gift"></i><a href="#">Khuyến mãi</a></li>
								        <li>
								            <i class="pe-7s-call"></i>
								            Hotline <b>0986.083.083</b> (24h/7) 
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
								<input type="text" name="" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
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
		</div>


		
	</header><!-- /header -->

	@yield('content')

	<footer>
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="single-text res-text">
								<div class="footer-title">
									<div class="logo-f">
										<a href="#">
											<img src="client/img/logo-bepantoan.png" alt=""></a>
									</div>
								</div>
								<div class="footer-text">
									<ul>
										<li>
											<i class="pe-7s-call"></i>
											<p>Mua hàng <a href="#"> 024 33 100 100</a> (7:00 - 20:00)</p>
										</li>
										<li>
											<i class="pe-7s-call"></i>
											<p>Bảo hành <a href="#"> 024 35 122 122 </a> (8:00 - 20:00)</p>
										</li>
										<li>
											<i class="pe-7s-call"></i>
											<p>Khiếu nại <a href="#"> 0912 220 883</a> (8:00 - 20:30)</p>
										</li>
										<li>
											<img src="client/img/icon-dangky.png">
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="single-text res-text">
								<div class="footer-title">
									<h4>Thông tin công ty</h4>
								</div>
								<div class="footer-menu">
									<ul>
										
										<li><a href="#">Giới thiệu</a></li>
										
										<li><a href="#">Tuyển dụng</a></li>
										
										<li><a href="#">Quy chế hoạt động</a></li>
										
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="single-text res-text">
								<div class="footer-title">
									<h4>Hỗ trợ khách hàng</h4>
								</div>
								<div class="footer-menu">
									<ul>
										
										<li><a href="#">Chính Sách Thanh Toán</a></li>
										
										<li><a href="#">Chính sách vận chuyển</a></li>
										
										<li><a href="#">Chính Sách Đổi Trả</a></li>
										
										<li><a href="#">Chính Sách Bảo Hành</a></li>
										
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="single-text res-text">
								<div class="footer-title">
									<h4>Hỗ trợ khách hàng</h4>
								</div>
								   <div class="fb-page" data-href="https://www.facebook.com/bepantoan.vn/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bepantoan.vn/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bepantoan.vn/">Bepantoan.vn</a></blockquote></div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
			<div class="social-media">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="paypal social-icon">
								<ul>
									@if ($payment_j != null)
									@foreach ($payment_j as $item)
									<li><a href=""><i class="{{ $item['type'] }}"></i></a></li>
									@endforeach
									@endif
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="social-icon">
								<ul class="floatright">
									@if ($social_network_j != null)
									@foreach ($social_network_j as $item)
									<li class="res-mar"><a href="#"><i class="{{ $item['type'] }}"></i></a></li>
									@endforeach
									@endif
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
						<li>
							<div class="bg">
								<h4>Beptot.vn - Đường Láng - Đống Đa</h4>
								<address>
									<b>330 Đường Láng - Đống Đa - Hà Nội ( Có Chỗ Để Xe Ô Tô ) </b>
								</address>
								<div class="phone">
									<div>
										<label>Điện thoại cơ sở: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">0986 083 083</a></span>
									</div>
									<div>
										<label style="color: black !important">Hotline: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">024 33 100 100</a></span>
									</div>
								</div>
								<img src="client/img/cn_lang.png" alt="">
								<a href="#" title="Giới thiệu Showroom" class="btn btnintro" style="font: 11px/20px arial; color: #fff; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Xem chi tiết</a>
								<a href="#" id="map3" class="btn btnmap showMap" style="font: 11px/20px arial; color: #fff; background: #1665ab; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Bản đồ đường đi</a>
							</div>
						</li>
						<li>
							<div class="bg">
								<h4>Beptot.vn - Đường Láng - Đống Đa</h4>
								<address>
									<b>338 Nguyễn Văn Cừ - Long Biên - Hà Nội ( Đối Diện Siêu Thị Nguyễn Kim, Có Chỗ Để Xe Ô Tô )</b>
								</address>
								<div class="phone">
									<div>
										<label>Điện thoại cơ sở: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">0986 083 083</a></span>
									</div>
									<div>
										<label style="color: black !important">Hotline: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">024 33 100 100</a></span>
									</div>
								</div>
								<img src="client/img/cn_lang.png" alt="">
								<a href="#" title="Giới thiệu Showroom" class="btn btnintro" style="font: 11px/20px arial; color: #fff; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Xem chi tiết</a>
								<a href="#" id="map3" class="btn btnmap showMap" style="font: 11px/20px arial; color: #fff; background: #1665ab; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Bản đồ đường đi</a>
							</div>
						</li>
						<li>
							<div class="bg">
								<h4>Beptot.vn - Đường Láng - Đống Đa</h4>
								<address>
									<b>330 Đường Láng - Đống Đa - Hà Nội ( Có Chỗ Để Xe Ô Tô ) </b>
								</address>
								<div class="phone">
									<div>
										<label>Điện thoại cơ sở: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">0986 083 083</a></span>
									</div>
									<div>
										<label style="color: black !important">Hotline: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">024 33 100 100</a></span>
									</div>
								</div>
								<img src="client/img/cn_lang.png" alt="">
								<a href="#" title="Giới thiệu Showroom" class="btn btnintro" style="font: 11px/20px arial; color: #fff; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Xem chi tiết</a>
								<a href="#" id="map3" class="btn btnmap showMap" style="font: 11px/20px arial; color: #fff; background: #1665ab; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Bản đồ đường đi</a>
							</div>
						</li>
						<li>
							<div class="bg">
								<h4>Beptot.vn - Đường Láng - Đống Đa</h4>
								<address>
									<b>330 Đường Láng - Đống Đa - Hà Nội ( Có Chỗ Để Xe Ô Tô ) </b>
								</address>
								<div class="phone">
									<div>
										<label>Điện thoại cơ sở: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">0986 083 083</a></span>
									</div>
									<div>
										<label style="color: black !important">Hotline: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">024 33 100 100</a></span>
									</div>
								</div>
								<img src="client/img/cn_lang.png" alt="">
								<a href="#" title="Giới thiệu Showroom" class="btn btnintro" style="font: 11px/20px arial; color: #fff; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Xem chi tiết</a>
								<a href="#" id="map3" class="btn btnmap showMap" style="font: 11px/20px arial; color: #fff; background: #1665ab; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Bản đồ đường đi</a>
							</div>
						</li>
						<li>
							<div class="bg">
								<h4>Beptot.vn - Đường Láng - Đống Đa</h4>
								<address>
									<b>330 Đường Láng - Đống Đa - Hà Nội ( Có Chỗ Để Xe Ô Tô ) </b>
								</address>
								<div class="phone">
									<div>
										<label>Điện thoại cơ sở: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">0986 083 083</a></span>
									</div>
									<div>
										<label style="color: black !important">Hotline: </label>
										<span><a style="color: #dd1015 !important; font-size: 16px; font-weight: bold;" href="#">024 33 100 100</a></span>
									</div>
								</div>
								<img src="client/img/cn_lang.png" alt="">
								<a href="#" title="Giới thiệu Showroom" class="btn btnintro" style="font: 11px/20px arial; color: #fff; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Xem chi tiết</a>
								<a href="#" id="map3" class="btn btnmap showMap" style="font: 11px/20px arial; color: #fff; background: #1665ab; padding: 2px 8px; margin-bottom: 10px; cursor: pointer;">Bản đồ đường đi</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-center">
							@if ($footer_j['footer'])
							<p>
								{{ $footer_j['footer'] }}
							</p>
							@endif
						</div>
					</div>
				</div>
			</div>
		</footer>	
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0"></script>
	
	
		<script type="text/javascript" src="{{asset('client/js/jquery-1.9.1.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/jquery-ui.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/jquery-scrolltofixed-min.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/owl.carousel.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/custom.js')}}"></script>
		<script type="text/javascript" src="{{asset('client/js/main.js')}}"></script>
		@yield('js')
	</body>
	</html>