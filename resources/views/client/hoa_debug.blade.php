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
    		<input class="ty-input-text-full cm-number form-control" id="PhoneRegister" type="tel" placeholder="Nhập số điện thoại " value="">
    		<div class="call-form-hide">
    			<input type="text" name="" class="form-control" placeholder="Tên sản phẩm cần tư vấn">
    			<input type="text" name="" class="form-control" placeholder="Thời gian nhận tư vấn">
    		</div>
    		<button type="button" class="btn">Đăng ký ngay</button>
    	</form>
        <span class="call-note">Chúng tôi sẽ gọi lại cho quý khách</span>
    </div>
</div>


@endsection