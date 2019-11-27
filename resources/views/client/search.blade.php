@extends('client.master.master')
@section('title','Sản phẩm')
@section('content')
<div class="home">
    <div class="wrap-category">
        <div class="container">
            <div class="owl-carousel owl-theme slide-pro-ctg">
                <div class="item">
                    <div class="ctg-pro-item">
                        <a href="#">
                            <div class="category-card__image">
                                <img src="" alt="">
                            </div>
                            <div class="category-card__name "><strong></strong></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-products">
        <div class="container">
            <div class="hd-card-body">
                <div class="row">
                    @if (!empty($db))
                    @foreach ($db as $item)
                    <div class="col-md-5h col-xs-6 col-sm-6">
                        <div class="product-item">
                            <div class="product-img">
                                <div class="pro-badge">
                                    <span>-1%</span>
                                </div>
                                <div class="img-responsive">
                                    <a href="">
                                        <img src="{{ $item->galleries->first()->image }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="product-dsc">
                                <h3><a href="">{{ $item->name }}</a></h3>
                                <div class="cate_pro_title">
                                    <a href="#" class="prdBrand">
                                        <img alt="" src=""></a>
                                </div>
                                <div class="gift-sale">
                                    <strong>Tặng: Bộ nồi từ Fivestar 5 chiếc</strong>
                                </div>
                                <div class="cate_pro_bot">
                                    <label>100</label>
                                    <span>50%</span>
                                    <label>50</label>
                                </div>
                            </div>
                            <div class="actions-btn">
                                <a href="#"><i class="fa fa-eye"></i></a>
                                <a href="#" class="buy_now"><i class="fa fa-shopping-basket"></i></a>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
