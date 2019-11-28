<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('admin0/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            
            
            {{-- brands  --}}
            <li class="treeview {{activeNav('brands')}}">
                <a href="#">
                    <i class="fa fa-university"></i>
                    <span>Hãng sản xuất</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('brands','add')}}"><a href="{{route('admin.brands.index')}}"><span class="glyphicon glyphicon-record"></span> Danh sách</a></li>
            
                </ul>
            </li>
            {{-- products  --}}
            <li class="treeview {{activeNav('properties')}} {{activeNav('categories')}} {{activeNav('products')}}">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('products','index')}}"><a href="{{route('admin.products.index')}}"><span class="glyphicon glyphicon-record"></span>
                                    Danh sách sản phẩm</a></li>
                    <li class="{{activeNav('products','add')}}"><a href="{{route('admin.products.add')}}"><span class="glyphicon glyphicon-record"></span>
                                            Thêm mới sản phẩm</a></li>
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.properties.index')}}"><span class="glyphicon glyphicon-record"></span> Thuộc tính</a></li>
                    <li class="{{activeNav('categories')}}"><a href="{{route('admin.categories.index')}}"><span class="glyphicon glyphicon-record"></span> Danh mục sản phẩm</a></li>
                </ul>
            </li>
            {{-- orders --}}
            <li class="treeview {{activeNav('orders')}} {{activeNav('status_order')}}">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Đơn hàng  <span class="label label-primary"> {{count_order_awaiting_approval()}}</span></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('orders')}}"><a href="{{route('admin.orders.index')}}"><span class="glyphicon glyphicon-record"></span>
                            Đơn hàng</a></li>
                    <li class="{{activeNav('status_order')}}"><a href="{{route('admin.status_order.index')}}"><span class="glyphicon glyphicon-record"></span> Trạng thái đơn hàng</a></li>
                </ul>
            </li>

            {{-- Post Category --}}
            <li class="treeview {{activeNav('post_categories')}}">
                <a href="#">
                    <span class="glyphicon glyphicon-copy"></span>
                    <span>Danh mục tin tức</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('post_categories')}}"><a href="{{route('admin.post_categories.add')}}"><span class="glyphicon glyphicon-record"></span> Danh sách</a></li>
                </ul>
            </li>
            {{-- Post --}}
            <li class="treeview {{activeNav('posts')}}">
                <a href="#">
                    <i class="fa fa-clone"></i>
                    <span>Bài viết</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('posts','index')}}"><a href="{{route('admin.posts.index')}}"><span class="glyphicon glyphicon-record"></span> Danh sách</a></li>
                    <li class="{{activeNav('posts','add')}}"><a href="{{route('admin.posts.add')}}"><span class="glyphicon glyphicon-record"></span> Thêm mới</a></li>
                </ul>
            </li>
            {{-- Show rooms --}}
            <li class="treeview {{activeNav('showroom')}} ">
                <a href="#">
                    <i class="fas fa-store"></i>
                    <span>Cửa hàng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ activeNav('showroom','index') }}"><a href="{{route('admin.showroom.index')}}"><span class="glyphicon glyphicon-record"></span> Danh sách</a></li>
                    <li class="{{ activeNav('showroom','add') }}"><a href="{{route('admin.showroom.add')}}"><span class="glyphicon glyphicon-record"></span> Thêm mới</a></li>
                </ul>
            </li>
            {{-- Show rooms --}}
            <li class="treeview {{activeNav('options')}}">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Thiết lập</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview {{activeNav('options','slide')}} {{activeNav('options','footer')}}">
                        <a href="#">
                            <i class="fa fa-circle-o"></i>
                            <span>Trang chủ</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{activeNav('options','slide')}}"><a href="{{route('admin.options.slide')}}"><span class="glyphicon glyphicon-record"></span> Danh sách Slide</a></li>
                            <li class="{{activeNav('options','footer')}}"><a href="{{route('admin.options.footer')}}"><span class="glyphicon glyphicon-record"></span>
                                Footer</a></li>
                            <li class="{{activeNav('options','choose_category_show_home')}}"><a href="{{route('admin.options.choose_category_show_home')}}"><span class="glyphicon glyphicon-record"></span> Chọn danh mục nổi bật</a></li>
                            
                        </ul>
                    </li>
                    <li class="{{activeNav('options','logo')}}"><a href="{{route('admin.options.logo')}}"><span class="glyphicon glyphicon-record"></span> Logo</a></li>
                    <li class="{{activeNav('options','hotline')}}"><a href="{{route('admin.options.hotline')}}"><span class="glyphicon glyphicon-record"></span>Liên hệ</a></li>
                    <li class="{{activeNav('options','footer-copy')}}"><a href="{{route('admin.options.footer-copy')}}"><span class="glyphicon glyphicon-record"></span>Copyright</a></li>
                    <li class="{{activeNav('options','payment')}}"><a href="{{route('admin.options.payment')}}"><span class="glyphicon glyphicon-record"></span>Thanh toán</a></li>
                    <li class="{{activeNav('options','social_network')}}"><a href="{{route('admin.options.social_network')}}"><span class="glyphicon glyphicon-record"></span>Mạng xã hội</a></li>
                    <li class="{{activeNav('options','menu')}}"><a href="{{route('admin.options.menu')}}"><span class="glyphicon glyphicon-record"></span>Menu</a></li>
                    <li class="{{activeNav('options','menu-phone')}}"><a href="{{route('admin.options.menu-phone')}}"><span class="glyphicon glyphicon-record"></span>Menu di động</a></li>
                    <li class="{{activeNav('options','prd-detail')}}"><a href="{{route('admin.options.prd-detail')}}"><span class="glyphicon glyphicon-record"></span>Chi tiết sản phẩm</a></li>
                    <li class="{{activeNav('options','introduce')}}"><a href="{{route('admin.options.introduce')}}"><span class="glyphicon glyphicon-record"></span>Giới thiệu</a></li>
                           
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>