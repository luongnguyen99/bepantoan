<?php require_once('header.php'); ?>
	<div class="giohang product">
		<div class="wrap-category hidden-xs hidden-sm" id="ProductCategory">
		    <div class="container">
		        <div class="arrows-category">
		            <div class="menu-cate">
		            	<?php foreach(range(1, 12) as $number ): ?>
		                <div class="ctg-pro-item">
		                    <a href="#">
		                        <div class="category-card__image">
		                            <img src="img/bep_tux300x300x4.png" alt="Bếp từ">
		                        </div>
		                        <div class="category-card__name "><strong>Bếp từ</strong></div>
		                    </a>
		                </div>
		                <?php endforeach; ?>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="page-bread">
			<div class="container">
				<ul>
				    <li><a href="#">beptot.vn</a></li>
				    <li>Giỏ hàng</li>
				</ul>
			</div>
		</div>
		<div class="cart-info">
			<div class="container">
				<div class="hd-card-body">
					<div class="wp-title-giohang text-center">
	                    <h1 class="h1-title"><span>Đơn hàng của bạn</span></h1>
	                    <p class="p-giohang1">11/11/2019 2:07:00 CH</p>
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
	                                
	                                <tr>
	                                    <td>1</td>
	                                    <td class="product_cart">
	                                        <img src="https://beptot.vn/Data/ResizeImage/files/bep-tu-bosch-puj611bb1e-gFCo81x500x500x4.jpg" style="vertical-align: middle; margin-right: 10px; float: left; width: 100px;">
	                                        <div style="margin-left: 120px;">
	                                            <a href="https://beptot.vn/bep-tu-bosch-puj611bb1e/" style="text-decoration: none; padding-top: 10px;"><b>Bếp từ Bosch PUJ611BB1E</b></a>
	                                            <div class="clearfix"></div>
	                                        </div>
	                                    </td>
	                                    <td class="product_cart"><span id="sell_price_pro_25875">12.370.000 </span>VND </td>
	                                    <td>
	                                        <input type="number" name=""  class="form-control" value="" min="1">
	                                    </td>
	                                    <td class="product_cart"><b><span id="price_pro_25875">12.370.000 </span>VND</b>
	                                    </td>
	                                    <td><a href="#" class="clickDele"><i class="fa fa-trash"></i></a>
	                                    </td>
	                                </tr>
	                                
	                                
	                                <tr>
	                                    
	                                    <td colspan="4" style="text-align: center; line-height: 30px; color: #555; text-transform: uppercase;"><strong>Tổng cộng : </strong>
	                                        <br>
	                                        
	                                        <br>
	                                        <div class="clear space5px"></div>
	                                        
	                                    </td>
	                                    <td colspan="2">
	                                        <span id="total_shopping_price" class="red" style="font-size: 18px;"><strong>12.370.000</strong></span><strong> VND</strong>
	                                    </td>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	                <div class="box-form-info">
	                    <div class="row">
	                        <form name="cart_form" id="cart_form" class="form-thongtin">
	                            <div class="col-md-6">
	                                <p><b class="red">Nội dung nhập Bắt buộc(*)</b></p>

	                                <div class="form-group row">
	                                    <label class="control-label col-md-3" for="hoten">Họ tên*:</label>
	                                    <div class="col-md-9">
	                                        <input type="text" required="" class="form-control" name="Name" id="hoten" value="" placeholder="nhập họ và tên">
	                                    </div>
	                                </div>
	                                <div class="form-group row">
	                                    <label class="control-label col-md-3" for="telphone">Số điện thoại*:</label>
	                                    <div class="col-md-9">
	                                        <input type="text" required="" class="form-control" name="Phone" id="telphone" value="" placeholder="Nhập số điện thoại liên lạc">
	                                    </div>
	                                </div>
	                                <div class="form-group row">
	                                    <label class="control-label col-md-3" for="telphone">Email liên hệ*:</label>
	                                    <div class="col-md-9">
	                                        <input type="text" required="" class="form-control" name="Email" id="Email" value="" placeholder="Nhập số điện thoại liên lạc">
	                                    </div>
	                                </div>
	                                
	                                <div class="form-group row">
	                                    <label class="control-label col-md-3" for="hoten">Địa chỉ nhận hàng*:</label>
	                                    <div class="col-md-9">
	                                        <input type="text" class="form-control" id="diachi" name="Address" value="" placeholder="Địa chỉ cụ thể giao hàng">
	                                    </div>
	                                </div>
	                                <div class="form-group row">
	                                    <label class="control-label col-md-3" for="hoten">Ghi chú*:</label>
	                                    <div class="col-md-9">
	                                        <textarea class="form-control" rows="4" placeholder="Ghi chú ..." name="Content"></textarea>
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
	                                                    <input id="payment_method_1" name="Payment" class="input-radio" type="radio" value="0" checked="checked">
	                                                    <label for="payment_method_1">Thanh toán khi nhận hàng - COD </label>
	                                                    <div class="payment_box payment_method_bacs" style="display: block;">
	                                                        <p>Bạn nhận hàng và kiểm tra hàng sau đó mới phải trả tiền </p>
	                                                    </div>
	                                                </div>
	                                                <div class="pay-top sin-payment">
	                                                    <input id="payment_method_2" name="Payment" class="input-radio" type="radio" value="1">
	                                                    <label for="payment_method_2">Chuyển khoản</label>
	                                                    <div class="payment_box payment_method_bacs">
	                                                        <p>Qúy khách vui lòng chuyển khoản vào một trong các tài khoản sau:</p>
		                                                    <p>( Nội dung chuyển tiền: HỌ TÊN + SỐ ĐIỆN THOẠI + MÃ SẢN PHẨM )</p>
		                                                    <p><b>Ngân hàng TMCP Việt Nam Thịnh Vượng - VPbank</b></p>                                                    
															<p><b>Thông tin các tài khoản tại Beptot.vn!  </b></p>
															<p>

															NGÂN HÀNG TECHCOM BANK<br>
															- Tên chủ TK: Nguyễn Đức Trường<br>
															- Số TK: 19027501510013<br>
															- Chi nhánh: Hà Nội<br>
															</p>
															<p>
															NGÂN HÀNG VIETTIN BANK<br>
															- Tên chủ TK: Nguyễn Đức Trường<br>
															- Số TK: 104000744394<br>
															-Chi nhánh: Hà Nội<br>
															</p><p>
															NGÂN HÀNG VIETCOM BANK<br>
															-Tên chủ TK: Nguyễn Đức Trường<br>
															-Số TK: 0011004264765<br>
															-Chi nhánh: Hà Nội<br>
															</p>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                </div>
	                                <div class="text-center mt10">
	                                    <div class="wc-proceed-to-checkout">
	                                        <p class="return-to-shop" style="float: left;">
	                                            <a href="javascript:void(0)" id="btnOrder" class="wc-forward" rel="nofollow">Gửi đơn</a>

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
		
	</div>

<?php require_once('footer.php'); ?>