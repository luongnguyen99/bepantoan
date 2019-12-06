
@extends('client.master.master')
@section('title')
Hoa debug
@endsection
@section('content')

<div class="box_support">
	<p class="hotline">CHƯƠNG TRÌNH KHUYẾN MÃI</p>
	<p class="value">Giảm tới 10%</p>
	<div class="product-call-requests">
		<form>
			<input class="ty-input-text-full cm-number form-control" id="PhoneRegister" type="tel"
				placeholder="Nhập số điện thoại " value="">
			<div class="call-form-hide">
				<input type="text" name="" class="form-control" placeholder="Tên sản phẩm cần tư vấn">
				<input type="text" name="" class="form-control" placeholder="Thời gian nhận tư vấn">
			</div>
			<button type="button" class="btn">Đăng ký ngay</button>
		</form>
		<span class="call-note">Chúng tôi sẽ gọi lại cho quý khách</span>
	</div>
</div>

<section class="new-filter-qh">
    <div class="container">
        <div class="hd-card-body">
            <div class="hd-module-title filterBoxFixed">
                <div class="row">
                    <div class="col-xs-12">
                        
                        <div class="boxFilterLeft btn-group">
                            <button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Phân loại <span class="caret"></span>
                            </button>
                            <ul class="listform_filter category right-property dropdown-menu" role="menu">
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox">
                                        <label>Bếp từ</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox">
                                        <label>Bếp điện</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" checked="checked">
                                        <label>Bếp điện từ</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="boxFilterLeft btn-group">
                            <button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Hãng Sản xuất <span class="caret"></span>
                            </button>
                            <ul class="listform_filter category right-property dropdown-menu" role="menu">
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox">
                                        <label>
                                            <img src="http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/eurosun(1).jpg" class="icImgBrand" alt="Eurosun"></label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox">
                                        <label>
                                            <img src="http://luongnd2286.xyz/userfiles/images/H%C3%A3ng%20s%E1%BA%A3n%20xu%E1%BA%A5t/Dmestik.png" class="icImgBrand" alt="D'mestik"></label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox">
                                        <label>
                                            <img src="http://luongnd2286.xyz/userfiles/images/logo%20bosch.jpg" class="icImgBrand" alt="Bosch"></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="boxFilterLeft btn-group">
                            <button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Xuất xứ <span class="caret"></span>
                            </button>
                            <ul class="listform_filter right-property dropdown-menu" role="menu">
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="xuat-xu" id="xuat-xu75" data-url="https://beptot.vn/bep-dien-tu/" value="75">
                                        <label for="xuat-xu75">Germany</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="xuat-xu" id="xuat-xu76" data-url="https://beptot.vn/bep-dien-tu/" value="76">
                                        <label for="xuat-xu76">Spain</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="xuat-xu" id="xuat-xu77" data-url="https://beptot.vn/bep-dien-tu/" value="77">
                                        <label for="xuat-xu77">Italy</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="xuat-xu" id="xuat-xu78" data-url="https://beptot.vn/bep-dien-tu/" value="78">
                                        <label for="xuat-xu78">China (PRC)</label>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        
                        <div class="boxFilterLeft btn-group">
                            <button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Mức giá <span class="caret"></span>
                            </button>
                            <ul class="listform_filter right-property dropdown-menu" role="menu">
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="muc-gia" id="muc-gia490" data-url="https://beptot.vn/bep-dien-tu/" value="490">
                                        <label for="muc-gia490">Dưới 3 triệu</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="muc-gia" id="muc-gia102" data-url="https://beptot.vn/bep-dien-tu/" value="102">
                                        <label for="muc-gia102"> 3 triệu - 5 triệu</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="muc-gia" id="muc-gia103" data-url="https://beptot.vn/bep-dien-tu/" value="103">
                                        <label for="muc-gia103"> 5 triệu - 10 triệu</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="muc-gia" id="muc-gia104" data-url="https://beptot.vn/bep-dien-tu/" value="104">
                                        <label for="muc-gia104"> 10 triệu - 15 triệu</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="muc-gia" id="muc-gia105" data-url="https://beptot.vn/bep-dien-tu/" value="105">
                                        <label for="muc-gia105">Trên 15 triệu</label>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        
                        <div class="boxFilterLeft btn-group">
                            <button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Số bếp <span class="caret"></span>
                            </button>
                            <ul class="listform_filter right-property dropdown-menu" role="menu">
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="so-bep" id="so-bep113" data-url="https://beptot.vn/bep-dien-tu/" value="113">
                                        <label for="so-bep113">1 bếp</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="so-bep" id="so-bep99" data-url="https://beptot.vn/bep-dien-tu/" value="99">
                                        <label for="so-bep99">2 bếp</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="so-bep" id="so-bep100" data-url="https://beptot.vn/bep-dien-tu/" value="100">
                                        <label for="so-bep100">3 bếp</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="so-bep" id="so-bep101" data-url="https://beptot.vn/bep-dien-tu/" value="101">
                                        <label for="so-bep101">4 bếp</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="so-bep" id="so-bep112" data-url="https://beptot.vn/bep-dien-tu/" value="112">
                                        <label for="so-bep112">5 bếp</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="so-bep" id="so-bep709" data-url="https://beptot.vn/bep-dien-tu/" value="709">
                                        <label for="so-bep709">6 Bếp</label>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="checkbox">
                                        <input type="checkbox" name="so-bep" id="so-bep515" data-url="https://beptot.vn/bep-dien-tu/" value="515">
                                        <label for="so-bep515">Bếp đa điểm</label>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        
                        <div class="boxFilterLeft btn-group">
                            <button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Sắp xếp theo <span class="caret"></span>
                            </button>
                            <ul class="listform_filter right-property dropdown-menu filterTopCtgr" role="menu">
                                <li>
                                    <div class="checkbox">
                                        <input data-url="https://beptot.vn/bep-dien-tu/" id="new_asc" name="sort" type="checkbox" value="new_asc">
                                        <label for="new_asc">Sản phẩm mới</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input data-url="https://beptot.vn/bep-dien-tu/" id="view_desc" name="sort" type="checkbox" value="view_desc">
                                        <label for="view_desc">Xem nhiều nhất</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input data-url="https://beptot.vn/bep-dien-tu/" id="price_asc" name="sort" type="checkbox" value="price_asc">
                                        <label for="price_asc">Giá thấp đến cao</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input data-url="https://beptot.vn/bep-dien-tu/" id="price_desc" name="sort" type="checkbox" value="price_desc">
                                        <label for="price_desc">Giá cao xuống thấp</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection