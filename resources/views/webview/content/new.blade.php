@extends('webview.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}-Best online shop in Bangladesh
    @endsection

    @section('meta')
        <meta name="description" content="HOOGZ is a fashion brand that strives to create clothing that is not only stylish but also fashion-forward, versatile and affordable.">
        <meta name="keywords" content="{{env('APP_NAME')}}, online store bd, online shop bd, Organic fruits, Thai, UK, Korea, China, cosmetics, Jewellery, bags, dress, mobile, accessories, automation Products,">


        <meta itemprop="name" content="Best Online Shopping in Bangladesh | {{env('APP_NAME')}}">
        <meta itemprop="description" content="HOOGZ is a fashion brand that strives to create clothing that is not only stylish but also fashion-forward, versatile and affordable.">
        <meta itemprop="image" content="{{env('APP_URL')}}{{ $basicinfo->logo }}">

        <meta property="og:url" content="{{env('APP_URL')}}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Best Online Shopping in Bangladesh | {{env('APP_NAME')}}">
        <meta property="og:description" content="HOOGZ is a fashion brand that strives to create clothing that is not only stylish but also fashion-forward, versatile and affordable.">
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
        .product{
            margin-top: 4px !important;
        }

        #featureimagess{
            width: 100%;
            padding: 0px;
            padding-top: 0;
            /*max-height:200px;*/
        }
        #checked {
            color: orange;
        }
        .star{
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
    </style>

    <div class="p-0 container-fluid pt-lg-2">
        <div class="p-0 row">
            <div class="col-12 col-lg-12">
                <div class="owl-carousel owl-theme" id="slider">
                    @forelse ($sliders as $slider)
                        <div class="item" style="margin:0 !important;">
                            <a href="{{ $slider->slider_btn_link }}">
                            <img  src="{{ asset($slider->slider_image) }}">
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>

            <style>
                .product-card {
                    position: relative;
                    overflow: hidden;
                    border: none;
                    transition: all 0.3s ease-in-out;
                }

                .product-card img {
                    width: 100%;
                    height: auto;
                    display: block;
                    border-radius: 6px;
                }

                .product-actions {
                    position: absolute;
                    bottom: -100%;
                    left: 0;
                    width: 100%;
                    background: rgba(255, 255, 255, 0.9);
                    display: flex;
                    justify-content: center;
                    gap: 20px;
                    padding: 12px 0;
                    transition: bottom 0.4s ease-in-out;
                }

                .product-card:hover .product-actions {
                    bottom: 0;
                }

                .product-actions a {
                    font-size: 14px;
                    font-weight: 500;
                    color: #000;
                    text-decoration: none;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    transition: color 0.3s ease;
                }

                .product-actions a:hover {
                    color: #c00;
                }

                .product-info {
                    margin-top: 12px;
                }

                .product-name {
                    font-size: 16px;
                    font-weight: 600;
                    margin-bottom: 4px;
                    text-align: left;
                }

                .product-price {
                    font-size: 14px;
                    color: #333;
                    text-align: left;
                }

                .old-price {
                    text-decoration: line-through;
                    color: #999;
                    margin-right: 5px;
                }

                .rating {
                    color: #ffc107;
                    font-size: 14px;
                    text-align: right;
                }
            </style>

            @forelse ($categoryproducts as $key => $categoryproduct)
            <div class="container py-5">
                <h2 class="mb-4 text-center">Women's collection</h2>
                <div class="row g-4">

                    <!-- Product Card -->
                    <div class="col-12 col-md-4">
                        <div class="card product-card">
                            <img src="http://localhost/hoogz/public/images/product/17577731537799IMG_20250910_213815.jpg"
                                alt="Product">

                            <!-- Hover Actions -->
                            <div class="product-actions">
                                <a href="#"><i class="fa-regular fa-eye"></i> Quick View</a>
                                <a href="#"><i class="fa-solid fa-cart-plus"></i> Add to Cart</a>
                            </div>

                            <!-- Product Info -->
                            <div class="product-info d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="product-name">Printed Tote Bag</div>
                                    <div class="product-price"><span class="old-price">$110.00</span> $95.00</div>
                                </div>
                                <div class="rating">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @empty
            @endforelse




    <div class="container pb-2 my-2 " style="overflow: hidden">
        @if(count($topproducts) > 0)
        <div class="pb-2 bg-white row">
            <div class="col-12">
                <div class="px-2 pt-0 my-2 p-md-3 d-flex justify-content-between align-items-center" style="padding-bottom:4px !important;padding-top: 8px !important;">
                    <div>
                    <h4 class="m-0"><b>HOT DEAL</b></h4>
                    </div>
                        <div class="">
                        <div class="d-flex justify-content-end" id="timer">
                            <div class="timer-box" id="hours">13</div>
                            <div class="timer-box" id="minutes">44</div>
                            <div class="timer-box" id="seconds">9</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-1 col-12">
                <div class="owl-carousel " id="promotionalofferSlide">
                    @forelse ($topproducts as $promotional)
                        @php
        $relatedProducts = json_decode($promotional->RelatedProductIds, true);
        $firstRelatedId = $relatedProducts[0]['productID'] ?? null;

        $firstpro = null;
        if ($firstRelatedId) {
            $firstpro = App\Models\Product::with([
                'sizes' => function ($query) {
                    $query->select('id', 'product_id', 'Discount', 'RegularPrice', 'SalePrice')
                        ->take(1);
                },
            ])
                ->where('id', $firstRelatedId)
                ->select('id', 'ProductName')
                ->first();
        }
        ;
                        @endphp
                        @if (isset($firstpro))
                            <div class="mb-3 col-12">
                                <div class="categorywise-product-item"
                                    style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);;padding-top: 10px;">
                                    <!-- Image Container -->
                                    <div class="overflow-hidden image-container position-relative" style="border-radius:4px;">
                                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                                            <img class="product_Main_iMage" src="{{ asset($promotional->ProductImage) }}"
                                                style="max-width:95%" alt="">
                                        </a>

                                        <!-- Overlay on image only -->
                                        <div class=" d-flex flex-column justify-content-between">
                                            <!-- Right side buttons -->
                                            <div class="mt-2 d-flex flex-column position-absolute end-0 me-2">
                                                <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"
                                                    class="mb-2 btn btn-sm btn-light"><svg class="svg-inline--fa fa-eye" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="eye" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z">
                                                        </path>
                                                    </svg><!-- <i class="fas fa-eye"></i> Font Awesome fontawesome.com --></a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Product Info below image -->
                                    <h5 id="ph5" class="p-2 m-0">
                                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}" class="text-dark "
                                            id="pname">{{ $promotional->ProductName }} </a>
                                    </h5>
                                    <p class="m-0 mx-2 price d-flex justify-content-between align-items-center" style="color:#6ec1e4">
                                        <b class="text-dark fw-bold">৳ {{ round($firstpro->sizes[0]->SalePrice) }}</b>
                                    </p>

                                    <!-- Add To Cart Button -->
                                    <div class="gap-2 d-flex justify-content-center custom_add_tocart_padding"
                                        style="width: 100%; padding: 0 8px;">
                                        <button class="py-0 text-white btn bg-dark radius-0 fw-bold custom_add_tocart_buynow quick-shop-btn"
                                            type="button" data-product-id="{{ $promotional->id }}"
                                            style="white-space: normal;  flex: 1 1 45%;margin-bottom: 8px">
                                            Add To Cart <svg class="svg-inline--fa fa-cart-shopping" aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="cart-shopping" role="img" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 576 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z">
                                                </path>
                                            </svg><!-- <i class="fas fa-shopping-cart"></i> Font Awesome fontawesome.com -->
                                        </button>

                                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"
                                            class="py-0 text-white btn bg-dark radius-0 fw-bold custom_add_tocart_buynow" type="button"
                                            style="white-space: normal; flex: 1 1 45%;margin-bottom: 8px">
                                            <svg class="svg-inline--fa fa-bolt" aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M240.5 224H352C365.3 224 377.3 232.3 381.1 244.7C386.6 257.2 383.1 271.3 373.1 280.1L117.1 504.1C105.8 513.9 89.27 514.7 77.19 505.9C65.1 497.1 60.7 481.1 66.59 467.4L143.5 288H31.1C18.67 288 6.733 279.7 2.044 267.3C-2.645 254.8 .8944 240.7 10.93 231.9L266.9 7.918C278.2-1.92 294.7-2.669 306.8 6.114C318.9 14.9 323.3 30.87 317.4 44.61L240.5 224z">
                                                </path>
                                            </svg>Buy Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>

        </div>
    @else
    @endif
    </div>




    <!-- Promotional Products -->
    <div class="container p-0 pb-2 "  style="overflow: hidden">
    <div class="row gutters-10">
        @if (count($adds) == '2')
            @forelse ($adds as $add)
                <div class="col-lg-6 col-6 ps-lg-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="{{ $add->add_link }}" target="_blank" class="banner-container">
                            <img src="{{ asset($add->add_image) }}" alt="{{ env('APP_NAME') }}"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        @else
            @forelse ($adds as $add)
                <div class="col-lg-12 col-12 ps-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="{{ $add->add_link }}" target="_blank" class="banner-container">
                            <img src="{{ asset($add->add_image) }}" alt="{{ env('APP_NAME') }}"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        @endif
    </div>

    @forelse ($categoryproducts as $key => $categoryproduct)
        @if (count($categoryproduct->mainproducts) > 0)
            <div class="pb-0 my-2 bg-white row" data-aos="fade-right" data-aos-duration="10">
                <div class="col-12" >
                    <div class="p-md-3 d-flex justify-content-between align-items-center" style="padding-bottom:4px !important;padding-top: 8px !important;">
                        <h4 class="m-0"><b>{{ $categoryproduct->category_name }}</b></h4>
                            <a href="{{url('products/category/' . $categoryproduct->slug)}}" class="mb-0 btn btn-sm" style="padding: 3px 8px;height: 26px;color: white;font-weight: bold;margin-top:9px;font-size:15px;background: #E4002B;border: 1px solid #E4002B;">VIEW ALL</a>
                    </div>
                </div>

                @forelse ($categoryproduct->mainproducts as $promotional)
                                @php
            $relatedProducts = json_decode($promotional->RelatedProductIds, true);
            $firstRelatedId = $relatedProducts[0]['productID'] ?? null;

            $firstpro = null;
            if ($firstRelatedId) {
                $firstpro = App\Models\Product::with([
                    'sizes' => function ($query) {
                        $query->select('id', 'product_id', 'Discount', 'RegularPrice', 'SalePrice')
                            ->take(1);
                    },
                ])
                    ->where('id', $firstRelatedId)
                    ->select('id', 'ProductName')
                    ->first();
            }
            ;
                                @endphp
                                @if (isset($firstpro))
                                    <div class="mb-3 col-lg-3 col-6">
                                        <div class="categorywise-product-item"
                                            style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);;padding-top: 10px;">
                                            <!-- Image Container -->
                                            <div class="overflow-hidden image-container position-relative" style="border-radius:4px;">
                                                <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                                                    <img class="product_Main_iMage" src="{{ asset($promotional->ProductImage) }}"
                                                        style="max-width:95%" alt="">
                                                </a>

                                                <!-- Overlay on image only -->
                                                <div class=" d-flex flex-column justify-content-between">
                                                    <!-- Right side buttons -->
                                                    <div class="mt-2 d-flex flex-column position-absolute end-0 me-2">
                                                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"
                                                            class="mb-2 btn btn-sm btn-light"><svg class="svg-inline--fa fa-eye" aria-hidden="true"
                                                                focusable="false" data-prefix="fas" data-icon="eye" role="img"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z">
                                                                </path>
                                                            </svg><!-- <i class="fas fa-eye"></i> Font Awesome fontawesome.com --></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Product Info below image -->
                                            <h5 id="ph5" class="p-2 m-0">
                                                <a href="{{ url('view-product/' . $promotional->ProductSlug) }}" class="text-dark "
                                                    id="pname">{{ $promotional->ProductName }} </a>
                                            </h5>
                                            <p class="m-0 mx-2 price d-flex justify-content-between align-items-center" style="color:#6ec1e4">
                                                <b class="text-dark fw-bold">৳ {{ round($firstpro->sizes[0]->SalePrice) }}</b>
                                            </p>

                                            <!-- Add To Cart Button -->
                                            <div class="gap-2 d-flex justify-content-center custom_add_tocart_padding"
                                                style="width: 100%; padding: 0 8px;">
                                                <button class="py-0 text-white btn bg-dark radius-0 fw-bold custom_add_tocart_buynow quick-shop-btn"
                                                    type="button" data-product-id="{{ $promotional->id }}"
                                                    style="white-space: normal;  flex: 1 1 45%;margin-bottom: 8px">
                                                    Add To Cart <svg class="svg-inline--fa fa-cart-shopping" aria-hidden="true" focusable="false"
                                                        data-prefix="fas" data-icon="cart-shopping" role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512" data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z">
                                                        </path>
                                                    </svg><!-- <i class="fas fa-shopping-cart"></i> Font Awesome fontawesome.com -->
                                                </button>

                                                <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"
                                                    class="py-0 text-white btn bg-dark radius-0 fw-bold custom_add_tocart_buynow" type="button"
                                                    style="white-space: normal; flex: 1 1 45%;margin-bottom: 8px">
                                                    <svg class="svg-inline--fa fa-bolt" aria-hidden="true" focusable="false" data-prefix="fas"
                                                        data-icon="bolt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M240.5 224H352C365.3 224 377.3 232.3 381.1 244.7C386.6 257.2 383.1 271.3 373.1 280.1L117.1 504.1C105.8 513.9 89.27 514.7 77.19 505.9C65.1 497.1 60.7 481.1 66.59 467.4L143.5 288H31.1C18.67 288 6.733 279.7 2.044 267.3C-2.645 254.8 .8944 240.7 10.93 231.9L266.9 7.918C278.2-1.92 294.7-2.669 306.8 6.114C318.9 14.9 323.3 30.87 317.4 44.61L240.5 224z">
                                                        </path>
                                                    </svg>Buy Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                @empty
                @endforelse
            </div>

        @else
        @endif

    @empty
    @endforelse

    <div class="row gutters-10">
        @if (count($addbottoms) == '2')
            @forelse ($addbottoms as $add)
                <div class="col-lg-6 col-6 ps-lg-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="{{ $add->add_link }}" target="_blank" class="banner-container">
                            <img src="{{ asset($add->add_image) }}" alt="{{ env('APP_NAME') }}"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        @else
            @forelse ($addbottoms as $add)
                <div class="col-lg-12 col-12 pr-lg-0">
                    <div class="mb-1 media-banner mb-lg-0">
                        <a href="{{ $add->add_link }}" target="_blank" class="banner-container">
                            <img src="{{ asset($add->add_image) }}" alt="{{ env('APP_NAME') }}"
                                class="img-fluid ls-is-cached lazyloaded">
                        </a>
                    </div>
                </div>
            @empty
            @endforelse
        @endif

    </div>
    </div>


    <div class="container p-0 my-4 mb-2 mt-lg-4 pt-lg</div>-4"  style="overflow: hidden">
        <div class="row">
            <div>
                <h3 class="my-2">Shop by Categories</h3>
            </div>
            @forelse ($categories as $category)
                <div class="mb-2 col-lg-2 col-4" data-aos="fade-left" data-aos-duration="10">
                    <div class="cat_item">
                        <a href="{{ url('products/category/' . $category->slug) }}" >
                        <div class="d-flex justify-content-center" >
                            <img  src="{{ asset($category->category_icon) }}" id="catimg">
                        </div>
                        <p id="catp" style="font-weight:bold;color: black;">{{ \Illuminate\Support\Str::limit($category->category_name, 10) }}</p>
                    </a>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>

    @if (Auth::id())
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
    @else
        <input type="hidden" name="user_id" id="user_id" >
    @endif

    @if (Auth::id())
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
    @else
        <input type="hidden" name="user_id" id="user_id" >
    @endif

    <script>
        function givereactlike(id) {
            $.ajax({
                type: 'GET',
                url: '{{ url('give/react/') }}'+'/like',
                data: {
                    'user_id': $('#user_id').val(),
                    'product_id': id,
                },

                success: function(data) {
                    if (data.sigment == 'like') {
                        $('#promotionalofferSlide #likereactof' + id).text(data.total);
                        $('#promotionalofferSlide #likereactdone' + id).css('color', 'green');
                        $('#propro #likereactof' + id).text(data.total);
                        $('#propro #likereactdone' + id).css('color', 'green');
                    }else if (data.sigment == 'unlike') {
                        $('#promotionalofferSlide #likereactof' + id).text(data.total);
                        $('#promotionalofferSlide #likereactdone' + id).css('color', 'black');
                        $('#propro #likereactof' + id).text(data.total);
                        $('#propro #likereactdone' + id).css('color', 'black');
                    }else {

                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function givereactlove(id) {
            $.ajax({
                type: 'GET',
                url: '{{ url('give/react/') }}'+'/love',
                data: {
                    'user_id': $('#user_id').val(),
                    'product_id': id,
                },

                success: function(data) {
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
                error: function(error) {
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
@endsection
