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
                    <li class="{{activeNav('categories','index')}}"><a href="{{route('admin.categories.index')}}"><span class="glyphicon glyphicon-record"></span> Danh mục sản phẩm</a></li>
                    <li class="{{activeNav('categories','sort_brand')}}"><a href="{{route('admin.categories.sort_brand')}}"><span
                                class="glyphicon glyphicon-record"></span>Sắp xếp hãng</a></li>
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
                    <i class="fa fa-clipboard"></i>
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
                    {{-- <li class="{{ activeNav('showroom','add') }}"><a href="{{route('admin.showroom.add')}}"><span class="glyphicon glyphicon-record"></span> Thêm mới</a></li> --}}
                </ul>
            </li>
            {{-- Page --}}
            <li class="treeview {{activeNav('page')}}">
                <a href="#">
                    <i class="far fa-copy"></i>
                    <span>Trang</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('page','index')}}"><a href="{{route('admin.page.index')}}"><i
                                class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="{{activeNav('page','add')}}"><a href="{{route('admin.page.add')}}"><i
                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
             {{-- User --}}
             <li class="treeview {{activeNav('users')}} }}">
                <a href="#">
                    <i class="fas fa-user-secret"></i>
                    <span>Quản trị</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('users','index')}}"><a href="{{route('admin.users.index')}}"><i
                                class="fa fa-circle-o"></i> Danh sách </a></li>
                    <li class="{{activeNav('users','add')}}"><a href="{{route('admin.users.add')}}"><i
                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            <li class="treeview {{activeNav('phone_order')}}">
                <a href="#">
                    <i class="fa fa-clipboard"></i>
                    <span>Đăng ký CTKM</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('phone_order','phone_order')}}"><a href="{{route('admin.phone_order.phone_order')}}"><span
                                class="glyphicon glyphicon-record"></span> Chưa xử lý</a></li>
                    <li class="{{activeNav('phone_order','detailorder')}}"><a href="{{route('admin.phone_order.detailorder')}}"><span
                                class="glyphicon glyphicon-record"></span> Đã xử lý</a></li>
                </ul>
            </li>
            <li class="treeview {{activeNav('register_advisory')}}">
                <a href="#">
                    <i class="fa fa-clipboard"></i>
                    <span>Đăng ký tư vấn</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('register_advisory','processing')}}"><a
                            href="{{route('admin.register_advisory.processing')}}"><span class="glyphicon glyphicon-record"></span> Chưa
                            xử lý</a></li>
                    <li class="{{activeNav('register_advisory','done')}}"><a
                            href="{{route('admin.register_advisory.index')}}"><span class="glyphicon glyphicon-record"></span> Đã xử
                            lý</a></li>
                </ul>
            </li>
            {{-- Option --}}
            <li class="treeview {{activeNav('options')}} {{activeNav('options')}}">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>Thiết lập</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview {{activeNav('options','slide')}} {{activeNav('options','footer')}} {{activeNav('options','choose_category_show_home')}}">
                        <a href="#">
                            <span class="glyphicon glyphicon-record"></span>
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
                    <li class="{{activeNav('options','seo_setting')}}"><a href="{{route('admin.options.seo_setting')}}"><span
                                class="glyphicon glyphicon-record"></span> Thiết lập SEO</a></li>
                    <li class="{{activeNav('options','logo')}}"><a href="{{route('admin.options.logo')}}"><span class="glyphicon glyphicon-record"></span> Logo</a></li>
                    <li class="{{activeNav('options','hotline')}}"><a href="{{route('admin.options.hotline')}}"><span class="glyphicon glyphicon-record"></span>Liên hệ</a></li>
                    <li class="{{activeNav('options','email_admin')}}"><a href="{{route('admin.options.email_admin')}}"><span class="glyphicon glyphicon-record"></span>Email quản trị viên</a></li>
                    <li class="{{activeNav('options','footer-copy')}}"><a href="{{route('admin.options.footer-copy')}}"><span class="glyphicon glyphicon-record"></span>Copyright</a></li>
                    <li class="{{activeNav('options','payment')}}"><a href="{{route('admin.options.payment')}}"><span class="glyphicon glyphicon-record"></span>Thanh toán</a></li>
                    <li class="{{activeNav('options','social_network')}}"><a href="{{route('admin.options.social_network')}}"><span class="glyphicon glyphicon-record"></span>Mạng xã hội</a></li>
                    <li class="{{activeNav('options','menu')}}"><a href="{{route('admin.options.menu')}}"><span class="glyphicon glyphicon-record"></span>Menu</a></li>
                    <li class="{{activeNav('options','choose_category_show_menu_mobile')}}"><a href="{{route('admin.options.choose_category_show_menu_mobile')}}"><span class="glyphicon glyphicon-record"></span>Danh mục mobile</a></li>
                    <li class="{{activeNav('options','prd-detail')}}"><a href="{{route('admin.options.prd-detail')}}"><span class="glyphicon glyphicon-record"></span>Chi tiết sản phẩm</a></li>
                    <li class="{{activeNav('options','introduce')}}"><a href="{{route('admin.options.introduce')}}"><span class="glyphicon glyphicon-record"></span>Giới thiệu</a></li>
                    <li class="{{activeNav('options','general')}}"><a href="{{route('admin.options.general')}}"><span class="glyphicon glyphicon-record"></span>Thiết lập chung</a></li>    
                </ul>
                
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>