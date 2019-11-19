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
            
            

            <li class="treeview {{activeNav('brands')}}">
                <a href="#">
                    <i class="fa fa-align-justify"></i>
                    <span>Hãng sản xuất</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('brands','add')}}"><a href="{{route('admin.brands.index')}}"><i
                                class="fa fa-circle-o"></i> Danh sách</a></li>
            
                </ul>
            </li>
            
            <li class="treeview {{activeNav('properties')}} {{activeNav('categories')}}">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.properties.index')}}"><i
                                class="fa fa-circle-o"></i> Thuộc tính</a></li>
                    <li class="{{activeNav('categories')}}"><a href="{{route('admin.categories.index')}}"><i
                                class="fa fa-circle-o"></i> Danh mục sản phẩm</a></li>
                </ul>
            </li>
            {{-- Post Category --}}
            <li class="treeview {{activeNav('properties')}} {{activeNav('post_categories')}}">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Danh mục tin tức</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.post_categories.add')}}"><i
                                class="fa fa-circle-o"></i> Danh sách</a></li>
                </ul>
            </li>
            {{-- Post --}}
            <li class="treeview {{activeNav('properties')}} {{activeNav('post_categories')}}">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Bài viết</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.posts.index')}}"><i
                                class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.posts.add')}}"><i
                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            {{-- Show rooms --}}
            <li class="treeview {{activeNav('properties')}} {{activeNav('post_categories')}}">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Phòng trưng bày</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.showroom.index')}}"><i
                                class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.showroom.add')}}"><i
                        class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>
            {{-- Show rooms --}}
            <li class="treeview {{activeNav('properties')}} {{activeNav('post_categories')}}">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Thiết lập</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.options.logo')}}"><i
                                class="fa fa-circle-o"></i> Logo</a></li>
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.options.hotline')}}"><i
                        class="fa fa-circle-o"></i>Liên hệ</a></li>
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.options.footer')}}"><i
                        class="fa fa-circle-o"></i>Footer</a></li>
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.options.payment')}}"><i
                        class="fa fa-circle-o"></i>Thanh toán</a></li>
                    <li class="{{activeNav('properties')}}"><a href="{{route('admin.options.social_network')}}"><i
                        class="fa fa-circle-o"></i>Mạng xã hội</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>