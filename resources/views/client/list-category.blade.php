@extends('client.master.master')
@section('title','Sản phẩm')
@section('content')
<div class="home">
    
    
    <div class="wrap-category">
        <div class="container">
            @if (count($categories) > 0 && !empty($categories))
                <div class="owl-carousel owl-theme slide-pro-ctg">
                    @foreach ($categories as $item)
                        <div class="item">
                            <div class="ctg-pro-item">
                                <a href="#">
                                    <div class="category-card__image">
                                    <img src="{{!empty($item->image) ? $item->image : ''}}" alt="{{!empty($item->name) ? $item->name : ''}}">
                                    </div>
                                    <div class="category-card__name "><strong>{{!empty($item->name) ? $item->name : ''}}</strong></div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                </div>
            @endif
            

        </div>
    </div>
    <div class="wrap-brand">
        <div class="container">
            @if (count($brands) > 0 && !empty($brands))
                <div class="section-title">
                    <h3>Hãng sản xuất</h3>
                    <div class="uploader-more hidden-xs">
                        <a href="#">Xem thêm<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="owl-carousel owl-theme slide-pro-ctg slide-brand">
                    @foreach ($brands as $item)
                        <div class="item">
                            <div class="brand-item">
                                <a href="#" title="{{$item->name}}">
                                    <div class="category-card__image">
                                        <img src="{{!empty($item->image) ? $item->image : '' }}" alt="{{$item->name}}">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
           
        </div>
    </div>
    <div class="single-products">
        <div class="container">
            <div class="nav_cate_title">
                <h2 class="title">
                    <a href="#" title="Bếp từ">Bếp từ</a>
                </h2>
                <div class="list-text-category hidden-xs hidden-sm">

                    <a href="#" class="itemprop" title="Bếp từ Bosch">Bếp từ Bosch</a>

                    <a href="#" class="itemprop" title="Bếp từ Eurosun">Bếp từ Eurosun</a>

                    <a href="#" class="itemprop" title="Bếp từ D'mestik">Bếp từ D'mestik</a>

                    <a href="#" class="itemprop" title="Bếp từ Cata">Bếp từ Cata</a>

                    <a href="#" class="itemprop" title="Bếp từ Canzy">Bếp từ Canzy</a>

                </div>
                <a href="#" class="viewall">Xem thêm<i class="fa fa-angle-right"></i></a>
            </div>
            <div class="hd-card-body">
                <div class="row">
                    <?php foreach(range(1, 5) as $number ): ?>
                    <div class="col-md-5h col-xs-6 col-sm-6">
                        <div class="product-item">
                            <div class="product-img">

                                <div class="pro-badge">
                                    <span>-24%</span>
                                </div>

                                <div class="img-responsive">
                                    <a href="#">
                                        <img src="client/img/bep-tu-bosch-pij651bb2ex500x500x4.jpg" alt="Product Title">
                                    </a>
                                </div>
                            </div>
                            <div class="product-dsc">
                                <h3><a href="#">Bếp từ Bosch PIJ651BB2E</a></h3>
                                <div class="cate_pro_title">
                                    <a href="#" class="prdBrand">
                                        <img alt="Bosch" src="client/img/logobosch.jpg"></a>
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
            </div>
        </div>
    </div>
    <div class="single-products">
        <div class="container">
            <div class="nav_cate_title">
                <h2 class="title">
                    <a href="#" title="Bếp từ">MÁY HÚT MÙI</a>
                </h2>
                <div class="list-text-category hidden-xs hidden-sm">

                    <a href="#" class="itemprop" title="Máy hút mùi Eurosun">Máy hút mùi Eurosun</a>

                    <a href="#" class="itemprop" title="Máy hút mùi Chefs">Máy hút mùi Chefs</a>

                    <a href="#" class="itemprop" title="Máy hút mùi Bosch">Máy hút mùi Bosch</a>

                    <a href="#" class="itemprop" title="Máy hút mùi Canzy">Máy hút mùi Canzy</a>

                    <a href="#" class="itemprop" title="Máy hút mùi Malloca">Máy hút mùi Malloca</a>

                </div>
                <a href="#" class="viewall">Xem thêm<i class="fa fa-angle-right"></i></a>
            </div>
            <div class="hd-card-body">
                <div class="row">
                    <?php foreach(range(1, 5) as $number ): ?>
                    <div class="col-md-5h col-xs-6 col-sm-6">
                        <div class="product-item">
                            <div class="product-img">

                                <div class="pro-badge">
                                    <span>-30%</span>
                                </div>

                                <div class="img-responsive">
                                    <a href="#">
                                        <img src="client/img/large_may-hut-mui-eurosun-eh-90il91x500x500x4.png"
                                            alt="Product Title">
                                    </a>
                                </div>
                            </div>
                            <div class="product-dsc">
                                <h3><a href="#">Máy Hút Mùi Eurosun EH-90IL91</a></h3>
                                <div class="cate_pro_title">
                                    <a href="#" class="prdBrand">
                                        <img alt="Bosch" src="client/img/eurosun(1).jpg"></a>
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
            </div>
        </div>
    </div>
    
   
</div>
@endsection