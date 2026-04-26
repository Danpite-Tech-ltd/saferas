@if(request()->is('lnpage/*'))
@else
    <header class="header-style-1">
        <!-- ============================================== TOP MENU ============================================== -->

        <div class="main-header" id="myHeader" style="background: #fff;box-shadow: 0 5px 30px 0 rgba(82, 63, 105, 0.2);">
            <div class="container">
                <div class="row" style="margin: 0">
                    <div class="col-9 col-sm-9 col-md-9 col-lg-2 logo-holder ps-0">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo" style="display: flex;justify-content:space-center">
                            <button type="button" class="d-lg-none " onclick="openNav()" id="menubutton">
                                <img src="{{ asset('public/menu.png') }}" alt="" id="menuiconcss">
                            </button>

                            <a href="{{ url('/') }}" id="logoimage">
                                <img src="{{ asset($basicinfo->logo) }}" alt="" id="logosm"
                                    style="width: 100%; height: 50px;">
                            </a>
                        </div>
                        <!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->
                    </div>
                    <!-- /.logo-holder -->
                    <div class="col-md-2 col-lg-8 top-menu d-sm-none">

                        <div id="pro-search-form" style="margin-top: 10px;">
                            <div class="search-area">
                                <div class="navbar justify-content-center">
                                    <form action="{{ url('search') }}" method="GET">
                                        <div class="control-group" style="    display: flex;">
                                            <input class="m-0 search-field" name="search" placeholder="Search here..."
                                                style="width:490px">
                                            <button class="search-button" type="submit"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-0 col-3 col-sm-3 col-md-3 col-lg-2 animate-dropdown top-cart-row" id="headcart">
                        <div class="d-none d-lg-block">
                            <a href="{{ url('/') }}" class="nav-link ">
                                Track Order
                            </a>
                        </div>

                        <div class="dropdown-cart d-sm-none">
                            <a href="#" class="dropdown" onclick="checkcart(this)" data-bs-toggle="dropdown"
                                id="smcarticon">
                                <div class="items-cart-inner">
                                    <div class="basket cart-badge-wrapper" style="display:flex;">
                                        <i class="fa-solid fa-cart-shopping"
                                            style="margin-top:8px;font-size: 20px;color: #000000;"></i>
                                        <span class="badge-count">{{ intval(Cart::count()) }}</span>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li id="checkcartview">
                                </li>
                            </ul>
                            <!-- /.dropdown-menu-->
                        </div>


                        <div class="d-none d-xl-inline-block" id="d-sm-none" style="margin-top: -4px;">
                            @if (Auth::id())
                                @if(Auth::user()->profile)
                                    <a href="#" type="button" onclick="openProfileNav()" style="color: #000000;font-size:20px"><img src="{{ asset(Auth::user()->profile) }}" style="width: 25px;"></a>
                                @else
                                    <a href="#" type="button" onclick="openProfileNav()" style="color: #000000;font-size:20px"><i class="fa-solid fa-user"></i></a>
                                @endif
                            @else
                                <a href="{{ url('login') }}" id="iconhead" style="padding-right: 16px;"><i
                                        class="fa-solid fa-user"></i></a>
                            @endif
                        </div>

                        <!-- /.dropdown-cart -->

                        <a type="button" class="search-button d-lg-none" onclick="showser()"
                            style="float: right;font-size: 30px; color: #b9b9b9; margin-right: 10px;" href="#"
                            id="smsericon"><img src="{{asset('public/search.png')}}" style="width:30px"></a>
                        <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                        <input type="text" id="valcheck" value="0" hidden>


                        <div class="dropdown-cart d-lg-none">
                            <a href="{{ url('track-order') }}" class="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket cart-badge-wrapper" style="display:flex;">
                                        <i class="fa-solid fa-truck"
                                            style="margin-top:8px;font-size: 20px;color: #000000;"></i>
                                    </div>
                                </div>
                            </a>
                            <!-- /.dropdown-menu-->
                        </div>
                    </div>
                    <!-- /.top-cart-row -->

                    <div class="mt-1 mb-1 text-left col-lg-6 col-12" id="hideser">
                        <form action="{{url('search')}}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control"
                                    placeholder="Search for products" style="border-radius: 4px 0px 0px 4px;margin:0;">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-primary text-light"
                                        style="background: red !important;padding: 10.7px;margin-bottom: 2px;margin-left: -10px;margin-top: -1px;border-radius: 0px 4px 4px 0px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
                <hr style="border:solid #858181;border-width: 1px 0 0;margin:0">
                <div class="d-sm-none">
                    <div id="nav-item" style="padding: 8px;display:flex !important;">
                        <div class="menus">
                            <ul>
                                @foreach ($categories as $category)
                                    <li style="float: left;list-style: none;margin: 0 10px;">
                                        <a class="category-btn dropdown-toggle" id="shopDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"
                                            style="cursor: pointer;color:#222;font-size:18px;display: block;position: relative;">{{ $category->category_name }}
                                        </a>
                                        <div class="p-3 dropdown-menu submenu-container" aria-labelledby="shopDropdown">
                                            <div class="row">
                                                @foreach ($category->subcategories as $subcategory)
                                                    <div class="col submenu-column">
                                                        <h6 style="margin:6px auto;"><a class="text-dark"
                                                                href="{{ url('products/sub/category/' . $subcategory->slug) }}">{{ $subcategory->sub_category_name }}</a>
                                                        </h6>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                @endforeach








                                {{-- <li style="float: left;list-style: none;margin: 0 10px;"><a href="{{ url('/') }}"
                                        style="display: block;color:#000000">Home</a></li>
                                <li style="float: left;list-style: none;margin: 0 10px;">
                                    <a class="category-btn dropdown-toggle" id="shopDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"
                                        style="cursor: pointer;color:#222;font-size:18px;display: block;position: relative;">Shop
                                    </a>
                                    <div class="p-3 dropdown-menu submenu-container" aria-labelledby="shopDropdown">
                                        <div class="row">
                                            @foreach ($categories as $category)
                                            <div class="col submenu-column">
                                                <h6 style="margin:6px auto;"><a
                                                        href="{{ url('products/category/' . $category->slug) }}">{{
                                                        strtoupper($category->category_name) }}</a>
                                                </h6>
                                                <ul>
                                                    @if ($category->subcategories->count() > 0)
                                                    @foreach ($category->subcategories as $subcategory)
                                                    <li style="padding: 2px 0;cursor: pointer;">
                                                        <a style="color:#222;"
                                                            href="{{ url('products/sub/category/' . $subcategory->slug) }}">{{
                                                            $subcategory->sub_category_name }}</a>
                                                    </li>
                                                    @endforeach
                                                    @else
                                                    <li style="padding: 2px 0;cursor: pointer;">
                                                        <a style="color:#222;"
                                                            href="{{ url('products/category/' . $category->slug) }}">{{
                                                            $category->category_name }}</a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li style="float: left;list-style: none;margin: 0 10px;"><a
                                        href="{{ url('venture/contact_us') }}"
                                        style="display: block;color:#000000">Contact</a>
                                </li>
                                <li style="float: left;list-style: none;margin: 0 10px;"><a
                                        href="{{ url('venture/about_us') }}"
                                        style="display: block;color:#000000">About-Us</a></li>
                                <li style="float: left;list-style: none;margin: 0 10px;"><a href="{{ url('track-order') }}"
                                        style="display: block;color:#000000">Track Order</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>


        <!-- side bar panel start -->
        <div id="mySidepanel" class="sidepanel">
            <div class="side-menu-header ">
                <div class="side-menu-close" onclick="closeNav()">
                    <i class="fas fa-close"></i>
                </div>
                <div class="px-3 pb-3 side-login" style="padding-top: 12px;padding-bottom: 15px; padding-left: 10px;">
                    <a href=""></a>
                    <a style="font-size: 16px" href="#">Categories</a>
                </div>
            </div>
            <ul class="level1-styles collapse show" id="id0">

                @forelse ($categories as $category)
                    <li>
                        <a href="{{ url('products/category/' . $category->slug) }}">{{ $category->category_name }} </a>
                    </li>
                @empty
                @endforelse

            </ul>
        </div>

        <!-- side bar panel start -->
        <div id="myProfileSidepanel" class="sidepanel">
            <div class="side-menu-header ">
                <div class="side-menu-close" onclick="clossProfileNav()">
                    <i class="fas fa-close"></i>
                </div>
                <div class="px-3 pb-3 side-login" style="padding-top: 12px;padding-bottom: 15px; padding-left: 10px;">
                    @if(Auth::guard('web')->check())
                        @if(Auth::guard('web')->user()->profile))
                            <img src="{{ asset(Auth::guard('web')->user()->profile) }}" alt="" id="profileImage">
                        @else
                            <img src="{{ asset('public/backend/img/user.jpg') }}" alt="" id="profileImage">
                        @endif
                        <h4 class="m-0 text-left" style="color: white;font-size: 16px;text-transform: uppercase;">
                            {{ Auth::guard('web')->user()->name }}
                        </h4>
                        <h4 class="m-0 text-left" style="color: white;font-size: 16px;">{{ Auth::guard('web')->user()->email }}
                        </h4>
                    @else
                    @endif


                </div>
            </div>
            <div class="py-0 widget-profile-menu">
                <ul class="categories categories--style-3">
                    <li class="p-0">
                        <a href="{{ url('user/dashboard') }}" class="active">
                            <i class="fas fa-dashboard category-icon"></i>
                            <span class="category-name">
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <li class="p-0">
                        <a href="{{ url('user/wallets') }}" class="">
                            <i class="fas fa-wallet category-icon"></i>
                            <span class="category-name">
                                Wallet </span>
                        </a>
                    </li>

                    <li class="p-0">
                        <a href="{{ url('user/purchase_history') }}" class="">
                            <i class="fas fa-file-text category-icon"></i>
                            <span class="category-name">
                                Orders </span>
                        </a>
                    </li>

                    <li class="p-0">
                        <a href="{{ url('track-order') }}" class="">
                            <i class="fas fa-file-text category-icon"></i>
                            <span class="category-name">
                                Track Order
                            </span>
                        </a>
                    </li>
                    <li class="p-0">
                        <a href="{{ url('user/profile') }}" class="">
                            <i class="fas fa-user category-icon"></i>
                            <span class="category-name">
                                Manage Profile
                            </span>
                        </a>
                    </li>
                    <li class="p-0">
                        <a href="{{ url('logout') }}" class="">
                            <i class="fas fa-comment category-icon"></i>
                            <span class="category-name">
                                Logout
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- side bar panel end -->
    </header>

    <!-- Search Popup Modal -->
    <div class="modal fade" id="searchPopup" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 0px !important">
                <div class="modal-body" style="padding: 0px;">
                    <div class="modalsearch-area">
                        <div class="control-group d-flex justify-content-between">
                            <input class="mb-0 search-field" id="modalsearchinput" onkeyup="searchproduct()"
                                placeholder="Search here...">
                            <a class="search-button" data-bs-dismiss="modal" href="#"></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div id="searchproductlist" style="background: white;margin: 10px;height: auto;overflow: scroll;">

        </div>
    </div>

    <style>
        #profileImage {
            border-radius: 50%;
            padding: 0px;
            padding-bottom: 8px;
            padding-top: 10px;
        }

        .sidebar-widget-title {
            position: relative;
        }

        .sidebar-widget-title:before {
            content: "";
            width: 100%;
            height: 1px;
            background: #eee;
            position: absolute;
            left: 0;
            right: 0;
            top: 50%;
        }

        .py-3 {
            padding-bottom: 1rem !important;
        }

        .sidebar-widget-title span {
            background: #fff;
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.2em;
            position: relative;
            padding: 8px;
            color: #dadada;
        }

        ul.categories {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        ul.categories--style-3>li {
            border: 0;
        }

        ul.categories>li {
            border-bottom: 1px solid #f1f1f1;
        }

        .widget-profile-menu a i {
            opacity: 0.6;
            font-size: 13px !important;
            top: 0 !important;
            width: 18px;
            height: 18px;
            text-align: center;
            line-height: 18px;
            display: inline-block;
            margin-right: 0.5rem !important;
        }

        .category-name {
            color: black;
            font-size: 18px;
        }

        .category-icon {
            font-size: 18px;
            color: black;
        }

        .modalsearch-area .search-field {
            border: medium none;
            padding: 10px;
            border-right: none;
            float: left;
        }

        .modalsearch-area .search-button {
            display: inline-block;
            float: left;
            margin-top: -1px;
            padding: 6px 15px 7px;
            text-align: center;
            background-color: #000000;
            border: 1px solid #000000;
        }

        .modalsearch-area .search-button:after {
            color: #fff;
            content: "\f00d";
            font-family: fontawesome;
            font-size: 24px;
            line-height: 9px;
            vertical-align: middle;
        }

        #hideser {
            display: none;
        }
    </style>
    <script>
        function showser() {
            var s = $('#valcheck').val();
            if (s == '0') {
                $('#valcheck').val('1');
                $('#hideser').css('display', 'none');
            } else {
                $('#valcheck').val('0');
                $('#hideser').css('display', 'inline');

            }
        }
        function showserBig() {
            var s = $('#valcheck').val();
            if (s == '0') {

                $('#valcheck').val('1');
                $('#hideser').css('display', 'inline');

            } else {

                $('#valcheck').val('0');
                $('#hideser').css('display', 'none');

            }
        }
    </script>

@endif
