<?php require_once('header.php'); ?>

	<div class="product blog">
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
				    <li>Tin tức</li>
				</ul>
			</div>
		</div>
		<div class="blog-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
						<?php foreach(range(1, 6) as $number ): ?>
						<div class="tb-post-item">
						    <a href="#">
						        <div class="tb-thumb">
						            <figure>
						                <img src="img/bep-tu-bosch-pxv975dc1e-depx500x500x4.jpg" alt="Dưới góc nhìn của chuyên gia – bếp từ Bosch có tốt không?">
						            </figure>
						            <span class="tb-publish font-noraure-3">06/11/2019</span>
						        </div>
						    </a>
						    <div class="tb-content7">
						        <a href="#">
						            <h4 class="tb-titlel">Dưới góc nhìn của chuyên gia – bếp từ Bosch có tốt không?</h4>
						        </a>
						        <div class="tb-excerpt">Bếp từ bosch thiết kế hiện đại, sang trọng, chất lượng sản phẩm với nhiều tính năng ưu việt đem lại cho người dùng nhiều trải nghiệm thú vị. Liên hệ bếp tốt theo số: 0986.083.083 để tìm hiểu thêm sản phẩm.</div>
						        <a class="blog7" href="#">Xem thêm <i class="fa fa-angle-right"></i></a>
						    </div>
						</div>
						<?php endforeach; ?>

						<div class="pagenavi">
						    <a class="page smaller" title="Page 1" href="#">1</a>
						    <span class="current">2</span>
						    <a class="page larger" title="Page 3" href="#">3</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
						<div class="sidebar-post">
							<div class="zo-recent-posts">
							    <h3 class="wg-title">Bài viết nổi bật</h3>
							    <ul>
							    	<?php foreach(range(1, 5) as $number ): ?>
							        <li>
							            <div class="tb-recent-thumbb">
							                <a href="#" class="active">
							                    <img src="https://beptot.vn/Data/ResizeImage/images/bep-tu-bosch-pxv975dc1e-depx500x500x4.jpg" alt="Dưới góc nhìn của chuyên gia – bếp từ Bosch có tốt không?">
							                </a>
							                <div class="recent-thumb-overlay"></div>
							            </div>
							            <div class="tb-recentb">
							                <h3 class="tb-postb">
							                    <a href="#">Dưới góc nhìn của chuyên gia – bếp từ Bosch có tốt không?</a>
							                </h3>
							                <div class="tb-postd">
							                    <span>06/11/2019</span>
							                </div>
							            </div>
							        </li>
							        <?php endforeach; ?>
							    </ul>
							</div>
							<div class="zo-recent-posts2">
							    <h3 class="wg-title">Bài viết mới nhất</h3>
							    <ul>
							        
							        <li>
							            <a href="#">Dưới góc nhìn của chuyên gia – bếp từ Bosch có tốt không?</a>
							        </li>
							        
							        <li>
							            <a href="#">{HỎI ĐÁP} Bếp từ chefs eh-dih888 có tốt không</a>
							        </li>
							        
							        <li>
							            <a href="#">Đánh giá bếp từ chefs có tốt không? </a>
							        </li>
							        
							        <li>
							            <a href="#">Đánh giá máy hút mùi canzy cz 3470 có tốt không?</a>
							        </li>
							        
							        <li>
							            <a href="#">Đánh giá máy hút mùi canzy có tốt không?</a>
							        </li>
							        
							    </ul>
							</div>
							<div class="zo-recent-posts2 os4">
							    <h3 class="wg-title">Danh mục tin tức</h3>
							    <ul>
							        
							        <li>
							            <a href="#">Góc tư vấn</a>
							        </li>
							        
							        <li>
							            <a href="#">Khuyến mãi</a>
							        </li>
							        
							        <li>
							            <a href="#">Tin dịch vụ</a>
							        </li>
							        
							    </ul>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

<?php require_once('footer.php'); ?>