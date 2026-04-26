@if(request()->is('lnpage/*'))
@else
    <style>
        .line {
            height: 5px;
            width: 30px;
            background-color: black;
            margin-bottom: 15px;

        }

        .info_text {
            color: #222;
        }
    </style>

    <footer id="footer" class="p-0 footer color-bg">


        <div class="pt-4 footer-bottom">
            <div class="container">
                <div class="mb-4 row">
                    <div class="mb-3 col-12 col-lg-6" id="flogo">
                        <img src="{{ asset($basicinfo->logo) }}" style="width: 200px;">
                    </div>
                    <div class="col-12 col-md-6 no-padding social" style="text-align: center;padding-top: 8px;">
                        <ul class="link" id="fsocial">
                            <li class="fb pull-left">
                                <a target="_blank" rel="nofollow" href="https://www.facebook.com/smartdealbd24"
                                    title="Facebook"></a>
                            </li>
                            <li class="tw pull-left">
                                <a target="_blank" rel="nofollow" href="" title="Twitter"></a>
                            </li>
                            <li class="googleplus pull-left">
                                <a target="_blank" rel="nofollow" href="" title="GooglePlus"></a>
                            </li>
                            <li class="rss pull-left">
                                <a target="_blank" rel="nofollow" href="" title="RSS"></a>
                            </li>
                            <li class="pintrest pull-left">
                                <a target="_blank" rel="nofollow" href="" title="PInterest"></a>
                            </li>
                            <li class="linkedin pull-left">
                                <a target="_blank" rel="nofollow" href="" title="Linkedin"></a>
                            </li>
                            <li class="youtube pull-left">
                                <a target="_blank" rel="nofollow" href="" title="Youtube"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-7 col-md-3" id="left">
                        <div class="module-heading">
                            <h4 class="module-title">Contact Us</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class="toggle-footer" style="font-size: 13px;">
                                <li class="media">
                                    <div class="media-body" style="color: black;">
                                        {{$basicinfo->address}}
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-body" style="color: rgb(0 0 0 / 80%);">
                                        <a href="tel:+88{{ $basicinfo->phone_one }}" style="color: black;">+(88)
                                            {{ $basicinfo->phone_one }}</a><br>
                                        <a href="tel:+88{{ $basicinfo->phone_two }}" style="color: black;">+(88)
                                            {{ $basicinfo->phone_two }}</a><br>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="media-body">
                                        <a href="mailto:{{ $basicinfo->email }}" style="color: black;">Email:
                                            {{ $basicinfo->email }}</a><br>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>
                    <!-- /.col -->

                    <div class="col-5 col-md-3" id="left">
                        <div class="module-heading">
                            <h4 class="module-title">Informations</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class="list-unstyled" style="font-size: 13px;">
                                <li class="first"><a class="info_text" title="Your Account"
                                        href="{{ url('venture/about_us') }}">About us</a></li>
                                <div class="lineb"></div>
                                <li><a class="info_text" href="{{ url('venture/contact_us') }}" title="Suppliers">Contact
                                        Us</a></li>
                                <div class="lineb"></div>
                                <li><a class="info_text" href="{{ url('venture/terms_codition') }}"
                                        title="Terms & Conditions">Terms & Conditions</a></li>
                                <div class="lineb"></div>
                                <li><a class="info_text" href="{{ url('venture/faq') }}" title="faq">FAQ</a></li>
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>
                    <!-- /.col -->

                    <div class="col-7 col-md-3" id="left">
                        <div class="module-heading">
                            <h4 class="module-title">Account</h4>
                        </div>

                        <div class="module-body">
                            <ul class="list-unstyled" style="font-size: 13px;">
                                <li class="first"><a href="{{ url('login') }}" class="info_text" title="Login">Login</a>
                                </li>
                                <li class="first"><a href="{{ url('login') }}" class="info_text"
                                        title="Register">Register</a></li>
                                <li><a href="{{ url('track-order') }}" class="info_text" style="display: block;">Track
                                        Order</a></li>
                                <li><a href="{{ url('checkout') }}" class="info_text">View Cart </a></li>
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>

                    <div class="col-5 col-md-3" id="left">
                        <div class="module-heading">
                            <h4 class="module-title">Why Choose Us</h4>
                        </div>
                        <!-- /.module-heading -->

                        <div class="module-body">
                            <ul class="list-unstyled" style="font-size: 13px;">
                                <li class="first">
                                    <a href="#" class="info_text" title="Help Center">HelpCenter</a>
                                </li>
                                <li>
                                    <a title="Customer Service" class="info_text" href="#">Customer Service</a>
                                </li>
                                <li>
                                    <a href="#" class="info_text" title="Shopping Guide">Shopping Guide</a>
                                </li>

                                <li class="last">
                                    <a title="Orders History" class="info_text" href="#">Advanced Search</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.module-body -->
                    </div>
                </div>

            </div>

            <div class="container">
                <div class="pb-3 mb-2 row">
                    <!--<div class="text-center col-4">-->
                    <!--    <div class="py-2 module-heading"><h3 class="module-title" id="member">Member's Of</h3></div>-->
                    <!--      <img src="https://smartdealbd.com/public/3.png" id="memberimg" style=" border-radius:6px;">-->
                    <!--</div>-->
                    <div class="m-auto text-center col-12 col-lg-4">
                        <div class="py-2 module-heading">
                            <h3 class="module-title" id="member">Delivery</h3>
                        </div>
                        <div class="d-flex" style="justify-content: space-around;">
                            <img src="{{asset('public/pathao.svg')}}" id="memberimg" style="  border-radius:6px;">
                            <img src="{{asset('public/dvpart.svg')}}" id="memberimg" style="  border-radius:6px;">
                        </div>
                    </div>
                    <!--<div class="text-center col-4">-->
                    <!--     <div class="py-2 module-heading"><h3 class="module-title" id="member">Member's Of</h3></div>-->
                    <!--      <img src="https://smartdealbd.com/public/1.png" id="memberimg" style="  border-radius:6px;">-->
                    <!--</div>-->
                </div>
                <!--<div class="row"> -->
                <!--    <div class="col-12 col-md-12 col-lg-12 no-padding" style="text-align: center;">-->
                <!--        <div class="clearfix payment-methods">-->
                <!--            <img src="https://smartdealbd.com/public/SSL03.webp" style="width: 90%; border-radius:6px;" id="sslimg">-->
                <!--        </div>-->
                <!-- /.payment-methods -->
                <!--    </div>-->
                <!--</div>-->

                <div class="pt-3 pb-2 row">
                    <div class="col-12">
                        <div class="module-heading">
                            <p class="text-center module-title" style="font-size: 12px;">Copyright © 2024 -
                                {{ env('APP_NAME') }}.com , Developed by <a href="https://danpitetech.com/">Danpite Tech</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>
@endif