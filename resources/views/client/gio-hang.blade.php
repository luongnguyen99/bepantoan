@extends('client.master.master')
@section('title')
Giỏ hàng
@endsection
@section('content')
	<div class="giohang product">
		<div class="wrap-category hidden-xs hidden-sm" id="ProductCategory">
		    <div class="container">
		        <div class="arrows-category">
		            <div class="menu-cate">
						@if (count($categories) > 0)
							@foreach ($categories as $category)
							<div class="ctg-pro-item">
								<a href="{{route('category_detail',['slug' => $category->slug])}}">
									<div class="category-card__image">
										<img src="{{$category->image}}" alt="{{$category->name}}">
									</div>
									<div class="category-card__name "><strong>{{$category->name}}</strong></div>
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
				    <li>Giỏ hàng</li>
				</ul>
			</div>
		</div>
		@if (count($carts) > 0 && !empty($carts) )
				<div class="cart-info">
					<div class="container">
						<div class="hd-card-body">
							{{-- {{dd($carts)}} --}}
							<div class="wp-title-giohang text-center">
								<h1 class="h1-title"><span>Đơn hàng của bạn</span></h1>
								<p class="p-giohang1">{{date("Y/m/d H:i:s")}}</p>
							</div>
							<div class="box-thongtin-sp">
								<div class="table-responsive">
									<table class="table" id="tbl_list_cart">
										<tbody>
											<tr style="background-color: #f5f5f5; font-weight: bold; text-transform: uppercase;">
												<td>STT</td>
												<td>Tên sản phẩm</td>
												<td>Giá sản phẩm</td>
												<td>Số lượng</td>
												<td>Tổng</td>
												<td>Xóa</td>
											</tr>
											@php
												$i = 1;
											@endphp
											@foreach ($carts as  $item)
												<tr class="product_current" id-product={{$item->id}} amount={{$item->price*$item->qty}}>				
												<td>{{$i}}</td>
													<td class="product_cart">
														@php
															if (!empty(get_detail_products_by_id($item->id)->galleries[0]->image)) {
																$image = get_detail_products_by_id($item->id)->galleries[0]->image;
															}else{
																$image = '';
															}
														@endphp
														<img src="{{$image}}"
															style="vertical-align: middle; margin-right: 10px; float: left; width: 100px;">
														<div style="margin-left: 120px;">
															<a href="{{route('product_detail',['slug' => get_detail_products_by_id($item->id)->slug])}}"
															style="text-decoration: none; padding-top: 10px;"><b>{{$item->name}}</b></a>
															<div class="clearfix"></div>
														</div>
													</td>
													<td class="product_cart"><span id="sell_price_pro_25875">{{pveser_numberformat($item->price)}}</span> </td>
													<td>
														<form action="{{route('cart.updateCart',['rowId' => $item->rowId ])}}" method="POST">
															@csrf
															<input type="number" name="qty" class="updateQty form-control" value="{{$item->qty}}" min="1">
														</form>
													</td>
													<td class="product_cart"><b><span id="price_pro_25875">{{pveser_numberformat($item->price*$item->qty)}}</span></b>
													</td>
													
													<td>
													<form action="{{route('cart.removeCart',['rowId' => $item->rowId])}}" method="POST">
														@csrf
															<a href="#" class="clickDelete"><i class="fa fa-trash"></i></a>
													</form>
													</td>
												</tr>		
												@php
													$i++
												@endphp				
											@endforeach
											<tr>
												<td colspan="4"
													style="text-align: center; line-height: 30px; color: #555; text-transform: uppercase;">
													<strong>Tổng cộng : </strong>
													<br>
				
													<br>
													<div class="clear space5px"></div>
				
												</td>
												<td colspan="2">
													@php
														$total = Cart::subtotal(0, '','');
														// dd($total);
													@endphp
													<span id="total_shopping_price" class="red"
												style="font-size: 18px;"><strong>{{pveser_numberformat($total)}}</strong></span><strong></strong>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="box-form-info">
								<div class="row">
									<form name="cart_form" id="create_order" class="form-thongtin">
										<div class="col-md-6">
											<p><b class="red">Nội dung nhập Bắt buộc(*)</b></p>
				
											<div class="form-group row">
												<label class="control-label col-md-3" for="hoten">Họ tên*:</label>
												<div class="col-md-9">
													<input type="text" required="" class="form-control" name="Name" id="hoten" value=""
														placeholder="Nhập họ và tên">
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3" for="telphone">Số điện thoại*:</label>
												<div class="col-md-9">
													<input type="text" required="" class="form-control" name="Phone" id="telphone"
														value="" placeholder="Nhập số điện thoại liên lạc">
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3" for="telphone">Email liên hệ*:</label>
												<div class="col-md-9">
													<input type="text" required="" class="form-control" name="Email" id="Email" value=""
														placeholder="Nhập số điện thoại liên lạc">
												</div>
											</div>
				
											<div class="form-group row">
												<label class="control-label col-md-3" for="hoten">Địa chỉ nhận hàng*:</label>
												<div class="col-md-9">
													<input type="text" class="form-control" id="diachi" name="Address" value=""
														placeholder="Địa chỉ cụ thể giao hàng">
												</div>
											</div>
											<div class="form-group row">
												<label class="control-label col-md-3" for="hoten">Ghi chú:</label>
												<div class="col-md-9">
													<textarea class="form-control" rows="4" placeholder="Ghi chú ..."
														name="Content"></textarea>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="box-phuongthucthanhtoan">
												<h5 class="title red mb10"><strong>Phương thức thanh toán*</strong></h5>
				
												<div class="all-payment">
													<div class="all-paymet-border">
														<div class="payment-method">
															<div class="pay-top sin-payment">
																<input id="payment_method_1" name="Payment" class="input-radio"
																	type="radio" value="1" checked="checked">
																<label for="payment_method_1">Thanh toán khi nhận hàng - COD </label>
																<div class="payment_box payment_method_bacs" style="display: block;">
																	<p>Bạn nhận hàng và kiểm tra hàng sau đó mới phải trả tiền </p>
																</div>
															</div>
															<div class="pay-top sin-payment">
																<input id="payment_method_2" name="Payment" class="input-radio"
																	type="radio" value="2">
																<label for="payment_method_2">Chuyển khoản</label>
																<div class="payment_box payment_method_bacs">
																	@if (!empty(get_option_by_key('method_payment')))
																		{!! get_option_by_key('method_payment') !!}
																	@endif
																	
																</div>
															</div>
														</div>
													</div>
												</div>
				
											</div>
											<div class="text-center mt10">
												<div class="wc-proceed-to-checkout">
													<p class="return-to-shop" style="float: left;">
														<a href="javascript:void(0)" id="btnOrder" class="wc-forward" rel="nofollow">Gửi
															đơn</a>
				
													</p>
													<p class="return-to-shop" style="float: right;">
														<a class="button wc-backward" href="/">Tiếp tục mua hàng</a>
													</p>
				
												</div>
												<!-- <div class="pagination">
															<div class="loading"><i class="icon">Loading</i></div>
														</div> -->
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			
		@else
			<div class="alert alert-danger" role="alert">
				Không có sản phẩm nào trong giỏ hàng
			</div>
		@endif
		
	</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
	$('#btnOrder').on('click',function(e) {
		e.preventDefault();
		var product_id = [];
		var amount = [];
		$('#tbl_list_cart').find('.product_current').each(function() {
			product_id.push($(this).attr('id-product'));
			amount.push($(this).attr('amount'));
		})
		html ='';
		var formData = new FormData($('#create_order')[0]);
		formData.set('_token',`{{csrf_token()}}`);
		formData.set('product_id',product_id);
		formData.set('amount',amount);
		$.ajax({
		url : `{{route('cart.saveOrder')}}`,
		processData: false,
		contentType: false,
		method: 'POST',
		data: formData,
		beforeSend: function() {	
			$('#btnOrder').attr('href','#');
		},
			success:function(data){ 
				if (data.errors) {			
					if (typeof data.messages.Name != 'undefined') {
						html += `<li>${data.messages.Name[0]}</li>`;
					};
					if (typeof data.messages.Phone != 'undefined') {
						html += `<li>${data.messages.Phone[0]}</li>`;
					};
					
					if (typeof data.messages.Address != 'undefined') {
						html += `<li>${data.messages.Address[0]}</li>`;
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
					window.location.href = `{{route('thankyou')}}`;
				}
			},
		});
	});
	$('#payment_method_2').click(function(){
		$('.payment_box').css('display','block');
	})
</script>
@endsection