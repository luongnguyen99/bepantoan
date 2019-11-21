<?php require_once('header.php'); ?>
	<div class="product">
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
							<div class="sidebar-left">
								<div class="box-filter">
									<h3>Phân loại</h3>
									<ul class="listform_filter fil-block">
								        <li>
								            <div class="checkbox">
								                <input type="checkbox">
								                <label>Bếp từ</label>
								            </div>
								        </li>
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" checked="checked">
								                <label>Bếp điện từ</label>
								            </div>
								        </li>
								        <li>
								            <div class="checkbox">
								                <input type="checkbox">
								                <label>Bếp điện</label>
								            </div>
								        </li>
								        
								    </ul>
								</div>
								<div class="box-filter">
								    <h3>HÃNG SẢN XUẤT</h3>
								    <ul class="listform_filter filterBrand">
								    	<?php foreach(range(1, 10) as $number ): ?>
								        <li>
								            <div class="checkbox">
								                <input type="checkbox">
								                <label>
								                    <img src="img/eurosun(1).jpg" class="icImgBrand" alt="">
								                </label>
								            </div>
								        </li> 
								        <?php endforeach; ?>
								    </ul>
								</div>
								<div class="box-filter">
								    <h3>Mức giá</h3>
								    <ul class="listform_filter right-property">
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="muc-gia" id="muc-gia102">
								                <label for="muc-gia102"> 3 triệu - 5 triệu</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="muc-gia" id="muc-gia103">
								                <label for="muc-gia103"> 5 triệu - 10 triệu</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="muc-gia" id="muc-gia104" >
								                <label for="muc-gia104"> 10 triệu - 15 triệu</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="muc-gia" id="muc-gia105" >
								                <label for="muc-gia105">Trên 15 triệu</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="muc-gia" id="muc-gia490">
								                <label for="muc-gia490">Dưới 3 triệu</label>
								            </div>
								        </li>
								        
								    </ul>
								</div>
								<div class="box-filter">
								    <h3>Xuất xứ</h3>
								    <ul class="listform_filter right-property">
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu75" >
								                <label for="xuat-xu75">Germany</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu76">
								                <label for="xuat-xu76">Spain</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu77">
								                <label for="xuat-xu77">Italy</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu78">
								                <label for="xuat-xu78">China (PRC)</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu79">
								                <label for="xuat-xu79">Poland</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu80">
								                <label for="xuat-xu80">France</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu459" >
								                <label for="xuat-xu459">Turkey</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu465">
								                <label for="xuat-xu465">Malaysia</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu466">
								                <label for="xuat-xu466">Thailand</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu467">
								                <label for="xuat-xu467">Việt Nam</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="xuat-xu" id="xuat-xu606">
								                <label for="xuat-xu606">EU</label>
								            </div>
								        </li>
								        
								    </ul>
								</div>
								<div class="box-filter">
								    <h3>Số bếp nấu</h3>
								    <ul class="listform_filter right-property">
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="so-bep-nau" id="so-bep-nau113">
								                <label for="so-bep-nau113">1 bếp</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="so-bep-nau" id="so-bep-nau99">
								                <label for="so-bep-nau99">2 bếp</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="so-bep-nau" id="so-bep-nau100">
								                <label for="so-bep-nau100">3 bếp</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="so-bep-nau" id="so-bep-nau101">
								                <label for="so-bep-nau101">4 bếp</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="so-bep-nau" id="so-bep-nau112">
								                <label for="so-bep-nau112">5 bếp</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="so-bep-nau" id="so-bep-nau709">
								                <label for="so-bep-nau709">6 Bếp</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="so-bep-nau" id="so-bep-nau515">
								                <label for="so-bep-nau515">Bếp đa điểm</label>
								            </div>
								        </li>
								        
								    </ul>
								</div>
								<div class="box-filter">
								    <h3>Mặt kính</h3>
								    <ul class="listform_filter right-property">
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="mat-kinh" id="mat-kinh443" >
								                <label for="mat-kinh443">Schott Ceran</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="mat-kinh" id="mat-kinh444">
								                <label for="mat-kinh444">Eurokera</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="mat-kinh" id="mat-kinh445">
								                <label for="mat-kinh445">Kanger</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="mat-kinh" id="mat-kinh446">
								                <label for="mat-kinh446">Nippon -NEG</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="mat-kinh" id="mat-kinh447">
								                <label for="mat-kinh447">Ceramic</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="mat-kinh" id="mat-kinh706">
								                <label for="mat-kinh706">Crystal</label>
								            </div>
								        </li>
								        
								        <li>
								            <div class="checkbox">
								                <input type="checkbox" name="mat-kinh" id="mat-kinh637">
								                <label for="mat-kinh637">Thép không gỉ</label>
								            </div>
								        </li>
								        
								    </ul>
								</div>
							</div>
							
						</div>
						<div class="col-md-9 col-xs-12 col-sm-12">
							<div class="single-products">
								<div class="hd-card-body">
									<h1><a href="#" class="fs-hotit" title="Bếp gas Teka">Bếp gas Teka</a></h1>
					            	<div class="row product-fs">
					            		<?php foreach(range(1, 8) as $number ): ?>
					            		<div class="col-md-3 col-xs-6 col-sm-6">
					            			<div class="product-item">
					                            <div class="product-img">
					                                
					                                <div class="pro-badge">
					                                    <span>-24%</span>
					                                </div>
					                                
					                                <div class="img-responsive">
					                                    <a href="#">
					                                        <img src="img/bep-tu-bosch-pij651bb2ex500x500x4.jpg" alt="Product Title">
					                                    </a>
					                                </div>
					                            </div>
					                            <div class="product-dsc">
					                                <h3><a href="#">Bếp từ Bosch PIJ651BB2E</a></h3>
					                                <div class="cate_pro_title">
					                                    <a href="#" class="prdBrand">
					                                        <img alt="Bosch" src="img/logobosch.jpg"></a>
					                                </div>
					                                <div class="gift-sale">
					                                    
					                                    <strong>Quà tặng: Bộ nồi từ Fivestar 5 chiếc </strong>
					                                    
					                                </div>
					                                <div class="cate_pro_bot">
					                                    
					                                    <label>14.950.000₫</label>
					                                    
					                                    <span>19.900.000₫</span>
					                                    
					                                </div>
					                            </div>
					                            <div class="actions-btn">
					                                <a href="#"><i class="fa fa-eye"></i></a>
					                                <a href="#" class="buy_now"><i class="fa fa-shopping-basket"></i></a>
					                            </div>
					                        </div>
					            		</div>
					            		<?php endforeach; ?>
					            	</div>
					            	<div class="lms-pagination pagination">
					                    <a href="#" class="next">Xem thêm <i class="fa fa-angle-right"></i></a>
					                </div>
					            </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php require_once('footer.php'); ?>