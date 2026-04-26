@extends('webview.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}-Best online shop in Bangladesh
    @endsection

    @section('meta')
        <meta name="description"
            content="{{env('APP_NAME')}} is a fashion brand that strives to create clothing that is not only stylish but also fashion-forward, versatile and affordable..">
        <meta name="keywords"
            content="{{env('APP_NAME')}}, online store bd, online shop bd, Organic fruits, Thai, UK, Korea, China, cosmetics, Jewellery, bags, dress, mobile, accessories, automation Products,">


        <meta itemprop="name" content="Best Online Shopping in Bangladesh | {{env('APP_NAME')}}">
        <meta itemprop="description"
            content="{{env('APP_NAME')}} is a fashion brand that strives to create clothing that is not only stylish but also fashion-forward, versatile and affordable.">
        <meta itemprop="image" content="{{env('APP_URL')}}{{ $basicinfo->logo }}">

        <meta property="og:url" content="{{env('APP_URL')}}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Best Online Shopping in Bangladesh | {{env('APP_NAME')}}">
        <meta property="og:description"
            content="{{env('APP_NAME')}} is a fashion brand that strives to create clothing that is not only stylish but also fashion-forward, versatile and affordable.">
        <meta property="og:image" content="{{env('APP_URL')}}{{ $basicinfo->logo }}">
        <meta property="image" content="{{env('APP_URL')}}{{ $basicinfo->logo }}" />
        <meta property="url" content="{{env('APP_URL')}}">
        <meta itemprop="image" content="{{env('APP_URL')}}{{ $basicinfo->logo }}">
        <meta property="twitter:card" content="{{env('APP_URL')}}{{ $basicinfo->logo }}" />
        <meta property="twitter:title" content="Best Online Shopping in Bangladesh | {{env('APP_NAME')}}" />
        <meta property="twitter:url" content="{{env('APP_URL')}}">
        <meta name="twitter:image" content="{{env('APP_URL')}}{{ $basicinfo->logo }}">
    @endsection
    <style>
        .product {
            margin-top: 4px !important;
        }

        #featureimagess {
            width: 100%;
            padding: 0px;
            padding-top: 0;
            /*max-height:200px;*/
        }

        #checked {
            color: orange;
        }

        .star {
            font-size: 10px !important;
        }

        .timer-box {
            background-color: red;
            color: #fff;
            font-weight: bold;
            font-size: 18px;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            margin: 5px;
            transition: transform 0.3s ease;
        }

        .timer-box:last-child {
            opacity: 0.7;
        }

        .timer-box.animate {
            transform: scale(1.2);
        }

        .view-all-link{
            left: 50%
        }
        @media only screen and (max-width: 600px) {
            .view-all-link{
                left: 30%
            }
        }
    </style>

    <div class="p-0 container-fluid">
        <div class="p-0 row">
            <div class="col-12 col-lg-12">
                <div class="owl-carousel owl-theme" id="slider">
                    @forelse ($sliders as $slider)
                        <div class="item" style="margin:0 !important;">
                            <a href="{{ $slider->slider_btn_link }}">
                                <img src="{{ asset($slider->slider_image) }}">
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- category --}}
    <section>
        <div class="p-0 mt-4 mb-2 container-fluid mt-lg-4 pt-lg-4">
            <div class="owl-carousel category-product-carousel">
                <div class="text-center item">
                    <a href="{{ route('all-product') }}" class="text-decoration-none">
                        <div id="cath">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('public/all-product.png') }}" id="catimg" alt="All Products">
                            </div>
                            <p id="catp" style="font-weight:bold;color:black;">
                                All Products
                            </p>
                        </div>
                    </a>
                </div>
                @forelse ($categories as $category)
                    <div class="text-center item">
                        <a href="{{ url('products/category/' . $category->slug) }}" class="text-decoration-none">
                            <div id="cath">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset($category->category_icon) }}" id="catimg" alt="{{ $category->category_name }}">
                                </div>
                                <p id="catp" style="font-weight:bold;color:black;">
                                    {{ $category->category_name }}
                                </p>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>

    {{-- featured section --}}
    <section>
        <div class="container-fluid">
            <div class="feature-section d-sm-none">
                <div class="features-wrapper">

                    <div class="feature-box">
                        <div class="icon-circle"><i class="fa-solid fa-dollar-sign" style="font-size: 20px"></i></div>
                        <div class="feature-title">Value for money</div>
                        <div class="feature-text">We offer competitive price.</div>
                    </div>

                    <div class="feature-box">
                        <div class="icon-circle"><i class="fa-solid fa-truck-fast" style="font-size: 20px"></i></div>
                        <div class="feature-title">Fast Delivery</div>
                        <div class="feature-text">Faster delivery on selected items.</div>
                    </div>

                    <div class="feature-box">
                        <div class="icon-circle"><i class="fa-solid fa-shield-halved" style="font-size: 20px"></i></div>
                        <div class="feature-title">Safe payments</div>
                        <div class="feature-text">Safe payments method.</div>
                    </div>

                    <div class="feature-box">
                        <div class="icon-circle"><i class="fa-solid fa-star" style="font-size: 20px"></i></div>
                        <div class="feature-title">100% Authentic products</div>
                        <div class="feature-text">We provide authentic products.</div>
                    </div>

                    <div class="feature-box">
                        <div class="icon-circle"><i class="fa-solid fa-location-dot" style="font-size: 20px"></i></div>
                        <div class="feature-title">National Delivery</div>
                        <div class="feature-text">National Cash on delivery.</div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    {{-- best sellig product  --}}
    <div class="py-3 container-fluid">
        <h2 class="m-0 category-product-secname">Best Selling Product</h2>
        <div class="mt-2 owl-carousel bestselling-carousel">
            @forelse ($topproducts as $promotional)
                @php
                    $relatedProducts = json_decode($promotional->RelatedProductIds, true);
                    $firstRelatedId = $relatedProducts[0]['productID'] ?? null;

                    $firstpro = null;
                    if ($firstRelatedId) {
                        $firstpro = App\Models\Product::with([
                            'sizes' => function ($query) {
                                $query->select('id', 'product_id', 'Discount', 'RegularPrice', 'SalePrice')->take(1);
                            },
                        ])
                            ->where('id', $firstRelatedId)
                            ->select('id', 'ProductName')
                            ->first();
                    }
                @endphp

                <div class="item">
                    <div class="card product-card">
                        <div class="sale-discount-badge">
                            {{ round((($firstpro->sizes[0]->RegularPrice - $firstpro->sizes[0]->SalePrice) / $firstpro->sizes[0]->RegularPrice) * 100) }}% ছাড়
                        </div>

                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                            <img src="{{ asset($promotional->ProductImage) }}" alt="Product">
                        </a>

                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                            <div class="product-info d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="product-name">
                                        {{ Str::limit($promotional->ProductName, 20) }}
                                    </div>
                                    <div class="product-price">
                                        ৳{{ round($firstpro->sizes[0]->SalePrice) }}
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="product-btn-wrap d-flex gap-2">
                            <button type="button"
                                class="btn quick-add-to-cart-btn quick-shop-btn w-50 m-0"
                                data-product-id="{{ $promotional->id }}">
                                Add to Cart
                            </button>
                        
                            <form action="{{ url('add-to-buy') }}" method="POST" class="w-50">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $promotional->id }}">
                                <input type="hidden" name="qty" value="1">
                                <button type="submit" class="btn quick-buy-now-btn w-100 m-0">
                                    Buy Now
                                </button>
                            </form>
                        
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        <a href="{{ route('best-selling-product') }}" class="my-1 view-all-link" style="background: red;color: #fff;padding: 10px 45px;font-size: 16px;border-radius: 8px;position: absolute;">
            View All
        </a>
    </div>

    {{-- promotional banner 1 --}}
    @if ($ad_one)
        <section>
            <div class="my-3 mt-5 row">
                <div class="col-12">
                    <a href="{{ $ad_one->add_link }}">
                        <img src="{{ asset($ad_one->add_image) }}" style="width:100%" alt="">
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- all product  --}}
    <div class="py-3 container-fluid">
        <h2 class="m-0 category-product-secname">All Products</h2>
        <div class="mt-2 row g-2">
            @forelse ($allproducts as $promotional)
                @php
                    $relatedProducts = json_decode($promotional->RelatedProductIds, true);
                    $firstRelatedId = $relatedProducts[0]['productID'] ?? null;

                    $firstpro = null;
                    if ($firstRelatedId) {
                        $firstpro = App\Models\Product::with([
                            'sizes' => function ($query) {
                                $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                            },
                        ])
                        ->where('id', $firstRelatedId)
                        ->select('id','ProductName')
                        ->first();
                    }
                @endphp

                <div class="col-6 col-md-2">
                    <div class="card product-card">
                        <div class="sale-discount-badge">
                            {{ round((($firstpro->sizes[0]->RegularPrice - $firstpro->sizes[0]->SalePrice) / $firstpro->sizes[0]->RegularPrice) * 100) }}% ছাড়
                        </div>

                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                            <img src="{{ asset($promotional->ProductImage) }}" alt="Product">
                        </a>

                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                            <div class="product-info d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="product-name">{{ $promotional->ProductName }}</div>
                                    <div class="product-price">
                                        ৳ {{ round($firstpro->sizes[0]->SalePrice) }}
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="product-btn-wrap d-flex gap-2">
                            <button type="button"
                                class="btn quick-add-to-cart-btn quick-shop-btn w-50 m-0"
                                data-product-id="{{ $promotional->id }}">
                                Add to Cart
                            </button>
                        
                            <form action="{{ url('add-to-buy') }}" method="POST" class="w-50">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $promotional->id }}">
                                <input type="hidden" name="qty" value="1">
                                <button type="submit" class="btn quick-buy-now-btn w-100 m-0">
                                    Buy Now
                                </button>
                            </form>
                        
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

        <div class="text-center">
            <a href="{{ route('all-product') }}"
                class="my-1 view-all-link d-inline-block"
                style="background:red;color:#fff;padding:10px 45px;font-size:16px;border-radius:8px;">
                View All
            </a>
        </div>
    </div>


    {{-- category wise product --}}

    {{-- <section class="mt-5">
        @forelse ($categoryproducts as $key => $categoryproduct)
            <div class="py-2 container-fluid">
                <h2 class="m-0 category-product-secname">{{ $categoryproduct->category_name }}</h2>

                <div class="mt-2 owl-carousel category-carousel">
                    @forelse ($categoryproduct->mainproducts as $promotional)
                        @php
                            $relatedProducts = json_decode($promotional->RelatedProductIds, true);
                            $firstRelatedId = $relatedProducts[0]['productID'] ?? null;

                            $firstpro = null;
                            if ($firstRelatedId) {
                                $firstpro = App\Models\Product::with([
                                    'sizes' => function ($query) {
                                        $query->select('id', 'product_id', 'Discount', 'RegularPrice', 'SalePrice')->take(1);
                                    },
                                ])
                                    ->where('id', $firstRelatedId)
                                    ->select('id', 'ProductName')
                                    ->first();
                            }
                        @endphp

                        <div class="item">
                            <div class="card product-card">
                                <div class="sale-discount-badge">
                                    {{ round((($firstpro->sizes[0]->RegularPrice - $firstpro->sizes[0]->SalePrice) / $firstpro->sizes[0]->RegularPrice) * 100) }}% ছাড়
                                </div>

                                <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                                    <img src="{{ asset($promotional->ProductImage) }}" alt="Product">
                                </a>

                                <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                                    <div class="product-info d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="product-name">
                                                {{ Str::limit($promotional->ProductName, 20) }}
                                            </div>
                                            <div class="product-price">
                                                ৳{{ round($firstpro->sizes[0]->SalePrice) }}
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="product-btn-wrap">
                                    <button type="button" class="btn quick-add-to-cart-btn quick-shop-btn w-100"
                                        data-product-id="{{ $promotional->id }}">
                                        Add to Cart
                                    </button>

                                    <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"
                                        class="mt-1 btn quick-buy-now-btn w-100">
                                        Buy Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        @empty
        @endforelse
    </section> --}}

    {{-- newslatter --}}
    <section class="py-2 newsletter-section">
        <div class="container text-center">

            <h2 class="m-0 mb-2 fw-bold">Newsletter</h2>
            <p class="mb-4 text-muted">
                Get a free 20% discount on all products on your first order!
            </p>

            <div class="d-flex justify-content-center">
                <form action="{{ route('newslatter.post') }}" class="newsletter-form d-flex" style="max-width: 600px; width:100%;" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" name="email" class="border form-control border-danger" placeholder="Your Email Address" style="height: 46px">
                        <!-- Subscribe Button -->
                        <button type="submit" class="gap-2 px-4 btn btn-danger d-flex align-items-center" style="height: 46px;">
                            <i class="bi bi-send"></i> Subscribe
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>


    <script>
        $(document).ready(function () {
            $('.category-carousel').owlCarousel({
                loop: false,
                margin: 12,
                nav: true,
                dots: false,
                autoplay: false,
                navText: [
                    '<span class="owl-prev-btn">&#10094;</span>',
                    '<span class="owl-next-btn">&#10095;</span>'
                ],
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 6
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.bestselling-carousel').owlCarousel({
                loop: false,
                margin: 12,
                nav: true,
                dots: false,
                autoplay: false,
                navText: [
                    '<span class="owl-prev-btn">&#10094;</span>',
                    '<span class="owl-next-btn">&#10095;</span>'
                ],
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 6
                    }
                }
            });
        });
    </script>



    {{-- promotional banner 2 --}}
    @if ($ad_two)
        <section>
            <div class="my-3 row">
                <div class="col-12">
                    <a href="{{ $ad_two->add_link }}">
                        <img src="{{ asset($ad_two->add_image) }}" alt="" style="width:100%;">
                    </a>
                </div>
            </div>
        </section>
    @endif


    @if (Auth::id())
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
    @else
        <input type="hidden" name="user_id" id="user_id">
    @endif

    @if (Auth::id())
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
    @else
        <input type="hidden" name="user_id" id="user_id">
    @endif

    <script>
        function givereactlike(id) {
            $.ajax({
                type: 'GET',
                url: '{{ url('give/react/') }}' + '/like',
                data: {
                    'user_id': $('#user_id').val(),
                    'product_id': id,
                },

                success: function (data) {
                    if (data.sigment == 'like') {
                        $('#promotionalofferSlide #likereactof' + id).text(data.total);
                        $('#promotionalofferSlide #likereactdone' + id).css('color', 'green');
                        $('#propro #likereactof' + id).text(data.total);
                        $('#propro #likereactdone' + id).css('color', 'green');
                    } else if (data.sigment == 'unlike') {
                        $('#promotionalofferSlide #likereactof' + id).text(data.total);
                        $('#promotionalofferSlide #likereactdone' + id).css('color', 'black');
                        $('#propro #likereactof' + id).text(data.total);
                        $('#propro #likereactdone' + id).css('color', 'black');
                    } else {

                    }
                },
                error: function (error) {
                    console.log('error');
                }
            });
        }

        function givereactlove(id) {
            $.ajax({
                type: 'GET',
                url: '{{ url('give/react/') }}' + '/love',
                data: {
                    'user_id': $('#user_id').val(),
                    'product_id': id,
                },

                success: function (data) {
                    if (data.sigment == 'love') {
                        $('#promotionalofferSlide #lovereactof' + id).text(data.total);
                        $('#promotionalofferSlide #lovereactdone' + id).css('color', 'red');
                        $('#propro #lovereactof' + id).text(data.total);
                        $('#propro #lovereactdone' + id).css('color', 'red');
                    } else {
                        $('#promotionalofferSlide #lovereactof' + id).text(data.total);
                        $('#promotionalofferSlide #lovereactdone' + id).css('color', 'black');
                        $('#propro #lovereactof' + id).text(data.total);
                        $('#propro #lovereactdone' + id).css('color', 'black');
                    }
                },
                error: function (error) {
                    console.log('error');
                }
            });
        }
    </script>

    <script>
        // কাউন্টডাউন সেটআপ (সেকেন্ডে)
        let totalSeconds = (13 * 3600) + (44 * 60) + 9;

        function updateTimer() {
            let hours = Math.floor(totalSeconds / 3600);
            let minutes = Math.floor((totalSeconds % 3600) / 60);
            let seconds = totalSeconds % 60;

            document.getElementById('hours').textContent = hours;
            document.getElementById('minutes').textContent = minutes;
            document.getElementById('seconds').textContent = seconds;

            // অ্যানিমেশন
            document.querySelectorAll('.timer-box').forEach(box => {
                box.classList.remove('animate');
                setTimeout(() => box.classList.add('animate'), 50);
            });

            if (totalSeconds > 0) {
                totalSeconds--;
            }
        }

        setInterval(updateTimer, 1000);
        updateTimer();
    </script>
    <script>
        $(document).ready(function () {
            $(".blog_slider").owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 3
                    }
                }
            });
        });
    </script>

    <script>
    $(document).ready(function () {
        $('.category-product-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 3
                },
                576: {
                    items: 4
                },
                768: {
                    items: 6
                },
                992: {
                    items: 10
                }
            }
        });
    });
</script>

@endsection
