@if(request()->is('lnpage/*'))
@else
    <style>
        footer {
            color: #fff;
            background: #101828;
            font-size: 15px;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .footer-logo {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        footer .courier_img {
            background: #fff;
            /*width: 140px;*/
            border-radius: 5px;
            margin-top: 10px !important;
        }

        footer .courier_img a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 50px;
            margin: 0 5px;
            transition: 0.3s;
        }

        footer .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            margin: 0 5px;
            border-radius: 50%;
            border: 1px solid #fff;
            color: #fff;
            font-size: 16px;
            transition: 0.3s;
        }

        footer .social-icons a:hover {
            background: #fff;
            color: #111;
        }

        .footer-bottomm {
            color: #000;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            text-align: left;
        }

        @media only screen and (max-width: 991px) {
            footer {
                padding-bottom: 75px;
            }
        }
    </style>
    <footer class="pt-5 pb-4 text-light">
        <div class="container">
            <div class="row gy-4" style="text-align:center;">

                <!-- Logo + Description -->
                <div class="col-lg-4 col-12">
                    <img src="{{ asset($basicinfo->page_image) }}" alt="Logo" style="max-width:200px;">
                    <p class="mt-3 text-white" style="line-height: 1.4;">
                        {{ env('APP_NAME') }} is a growing digital commerce brand delivering quality products and a trusted shopping experience across Bangladesh
                    </p>
                </div>

                <!-- Shop by Category -->
                <div class="col-lg-3 col-6">
                    <h5 class="m-0 mb-3 text-white fw-bold">Shop by Category</h5>
                    <ul class="list-unstyled footer-links">
                        @foreach ($categories as $category)
                            <li><a href="{{ url('products/category/' . $category->slug) }}"
                                    class="text-light">{{ $category->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- About Us -->
                <div class="col-lg-2 col-6">
                    <h5 class="m-0 mb-3 text-white fw-bold">About Us</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="{{ url('venture/about_us') }}" class="text-light">About Us</a></li>
                        <li><a href="{{ url('venture/contact_us') }}" class="text-light">Contact Us</a></li>
                        <li><a href="{{ url('venture/privacy_policy') }}" class="text-light">Privacy Policy</a></li>
                        <li><a href="{{ url('venture/terms_codition') }}" class="text-light">Terms & Condition</a></li>
                        <li><a href="{{ url('venture/help_center') }}" class="text-light">Help Center</a></li>
                        <li><a href="{{ url('venture/faq') }}" class="text-light">FAQ</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-12" style="padding-bottom:45px">
                    <h5 class="m-0 mb-3 text-white fw-bold">Get in Touch</h5>

                    <p class="m-0 mb-2 text-white"><i class="bi bi-telephone"></i> {{ $basicinfo->phone_one }}</p>
                    <p class="m-0 mb-2 text-white"><i class="bi bi-envelope"></i> {{ $basicinfo->email }}</p>
                    <p class="m-0 mb-2 text-white">
                        <i class="bi bi-geo-alt"></i>
                        {{ $basicinfo->address }}
                    </p>

                    <!-- Social Icons -->
                    <div class="my-3 social-icons">
                        <a href="{{ $basicinfo->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $basicinfo->linkedin }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{ $basicinfo->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="{{ $basicinfo->pinterest }}" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>

@endif
