@php
        $category = App\Models\Category::find($productdetails->category_id);
    @endphp
<div class='row single-product'>
    <div class='p-0 col-md-12'>
        <div class="detail-block">
            <div class="row wow fadeInUp">

                <div class="col-xs-12 col-sm-12 col-md-6 gallery-holder">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">

                        @if(json_decode($productdetails->PostImage))
                            <div id="sync1" class="owl-carousel owl-theme">
                                <div class="items">
                                    <img class="w-100 h-100" src="{{ asset($productdetails->ProductImage) }}" alt=""
                                        style="border-radius: 4px;">
                                </div>
                                @forelse (json_decode($productdetails->PostImage) as $image)
                                    <div class="items">
                                        <img class="w-100 h-100"
                                            src="{{asset('public/images/product/slider')}}/{{$image}}" alt=""
                                            style="border-radius: 4px;">
                                    </div>
                                @empty
                                @endforelse
                            </div>
                            <div id="sync2" class="owl-carousel owl-theme" style="padding-top: 10px;">
                                <div class="items">
                                    <img class="w-100 h-100"
                                        style="padding:6px;border:1px solid;border-radius: 4px;"
                                        src="{{ asset($productdetails->ProductImage) }}" alt="">
                                </div>
                                @forelse (json_decode($productdetails->PostImage) as $image)
                                    <div class="items">
                                        <img class="w-100 h-100"
                                            style="padding:6px;border:1px solid;border-radius: 4px;"
                                            src="{{asset('public/images/product/slider')}}/{{$image}}" alt="">
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        @else
                            <div class="items">
                                <img class="w-100 h-100" src="{{ asset($productdetails->ProductImage) }}" alt=""
                                    style="border-radius: 4px;">
                            </div>
                        @endif

                    </div>
                    <!-- /.single-product-gallery -->
                </div>
                <!-- /.gallery-holder -->
                <div class="col-sm-12 col-md-6 product-info-block" id="paddingnone">
                    <div class="mx-auto">

                        <!-- Breadcrumb -->
                        <h5 class="m-0 mb-2">
                            <a href="{{ url('/') }}" class="text-dark">Home - </a>
                            <a href="{{ url('products/category/' . $category->slug) }}"
                                class="text-dark">{{ $category->category_name }}
                            </a>
                            <a class="text-dark"> - {{ $productdetails->ProductName }}</a>
                        </h5>

                        <!-- Product Title -->
                        <h4 class="m-0 mt-2 fw-bold">{{ $productdetails->ProductName }}</h4>
                        {{-- <p class="mb-2 text-muted">Mango</p> --}}

                        <!-- Price Range -->
                        <div class="d-flex justify-content-between align-items-center">
                            @php
                                $prices = App\Models\Size::where('product_id', $productdetails->id)->pluck('SalePrice');
                                $minPrice = $prices->min();
                                $maxPrice = $prices->max();
                            @endphp

                            @if($prices->count() > 0)
                                <h5 class="m-0 mb-1 fw-semibold">
                                    ৳{{ intval($minPrice) }}
                                    {{-- @if($minPrice != $maxPrice) --}}
                                    – ৳{{ intval($maxPrice) }}
                                    {{-- @endif --}}
                                </h5>
                            @endif
                            <div class="mb-3 text-warning">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>

                        <!-- Color Selection -->
                        <div class="mb-3">
                            <p class="mb-1 fw-semibold">Color</p>
                            <div class="d-flex">
                                <div class="colorinfo">
                                    @if (empty(json_decode($singlemain->RelatedProductIds)))
                                    @else
                                        @forelse (json_decode($singlemain->RelatedProductIds) as $key => $ids)
                                            @php
                                                $prodinfo = App\Models\Product::where('id', $ids->productID)->where('status', 'Active')->first();
                                            @endphp
                                            @if(isset($prodinfo))
                                                <input type="radio" class="m-0" id="relproduct{{ $prodinfo->id }}" hidden
                                                    name="relproduct"
                                                    onclick="getrelproduct('{{ $prodinfo->id }}','{{ $singlemain->id }}')">
                                                <label class="relproduct ms-0" id="relproducttext{{ $prodinfo->id }}"
                                                    for="relproduct{{ $prodinfo->id }}"
                                                    style="border: 1px solid #000;padding: 0px;"
                                                    onclick="getrelproduct('{{ $prodinfo->id }}','{{ $singlemain->id }}')">
                                                    <img src="{{ asset($prodinfo->ProductImage) }}" alt=""
                                                        style="width:60px; height:60px;">
                                                </label>
                                            @endif
                                        @empty
                                        @endforelse
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Size Selection -->
                        <div class="mb-3">
                            <p class="mb-1 fw-semibold">Size</p>
                            <div class="sizeinfo">
                                @forelse ($sizes as $sizesold)
                                    @if($sizesold->available_stock > 2)
                                        <input type="hidden" name="regularpriceofsize"
                                            id="regularpriceofsize{{ $sizesold->size }}"
                                            value="{{ $sizesold->RegularPrice }}">
                                        <input type="hidden" name="salepriceofsize"
                                            id="salepriceofsize{{ $sizesold->size }}"
                                            value="{{ $sizesold->SalePrice }}">
                                        <input type="radio" class="m-0" hidden id="size{{ $sizesold->size }}"
                                            name="size" onclick="getsize('{{ $sizesold->size }}')">
                                        <label class="sizetext ms-0" id="sizetext{{ $sizesold->size }}"
                                            for="size{{ $sizesold->size }}"
                                            style="border: 1px solid #e4e4e4;font-size:18px;font-weight:bold;padding: 0px 8px;border-radius: 2px;margin-right:4px;margin-bottom:4px;"
                                            onclick="getsize('{{ $sizesold->size }}')">{{ $sizesold->size }}</label>
                                    @else
                                        <input type="hidden" name="regularpriceofsize"
                                            id="regularpriceofsize{{ $sizesold->size }}"
                                            value="{{ $sizesold->RegularPrice }}">
                                        <input type="hidden" name="salepriceofsize"
                                            id="salepriceofsize{{ $sizesold->size }}"
                                            value="{{ $sizesold->SalePrice }}">
                                        <input type="radio" class="m-0" hidden id="size{{ $sizesold->size }}"
                                            name="size">
                                        <label class="sizetext ms-0" id="sizetext{{ $sizesold->size }}"
                                            for="size{{ $sizesold->size }}"
                                            style="border: 1px solid #e4e4e4;    color: rgb(151 150 150) !important;font-size:18px;font-weight:bold;padding: 0px 8px;border-radius: 2px;margin-right:4px;margin-bottom:4px;"><del>{{ $sizesold->size }}
                                            </del> </label>
                                    @endif

                                @empty
                                @endforelse
                            </div>
                        </div>

                        <!-- Popup -->
                        <div class="my-2" id="sizeChart">
                          <a href="#" data-bs-toggle="modal" data-bs-target="#sizeChartModal" style="text-decoration: underline; color:#000">
                            <i class="fas fa-ruler-combined me-2"></i> Size Chart
                          </a>
                        </div>

                        <div class="modal fade" id="sizeChartModal" tabindex="-1" aria-labelledby="sizeChartModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="sizechart-modal">

                              <div class="sizechart-header position-relative">
                                <h5 id="sizeChartModalLabel" class="m-0 text-center">Size Chart</h5>
                                <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>

                              <div class="text-center sizechart-body">
                                <img src="{{ asset($productdetails->size_chart_popup) }}" alt="Size Chart" class="mx-auto img-fluid d-block">
                              </div>

                            </div>
                          </div>
                        </div>

                        <!-- Price -->
                        {{-- <h4 class="mb-3 fw-bold">$285.00</h4> --}}

                        @if (App\Models\Size::where('product_id', $productdetails->id)->first())
                            <div class="mb-3 product-price strong-700"
                                style="color:black;font-weight:bold;padding-top: 6px;" id="productPriceAmount">
                                <span
                                    id="salePrice">৳{{ App\Models\Size::where('product_id', $productdetails->id)->first()->SalePrice }}</span>

                                @if(App\Models\Size::where('product_id', $productdetails->id)->first()->Discount > 0)
                                    &nbsp;<del class="old-product-price strong-400" id="regularPrice"
                                style="color: #797474;font-size: 22px;">৳{{ round(App\Models\Size::where('product_id', $productdetails->id)->first()->RegularPrice) }}</del>@endif
                            </div>
                        @else
                            <div class="mb-3 product-price strong-700"
                                style="color:black;font-weight:bold;padding-top: 6px;" id="productPriceAmount">
                                <span id="salePrice"
                                    style="color:black;font-weight:bold;">৳{{ App\Models\Weight::where('product_id', $productdetails->id)->first()->SalePrice }}</span>

                            </div>
                        @endif

                        <!-- Quantity + Buy Now + Wishlist -->
                        <p class="mb-1 fw-semibold">Quantity</p>
                        <div class="stock-container info-container m-t-10" style="margin-top:5px;">
                            <div class="row" style="margin-bottom:5px;">
                                <div class="col-12 qty-cart">
                                    <div class="pr-2 d-flex" style="justify-content: left;">
                                        <button class="btn btn-sm" id="buttonminus" onclick="minus()">-</button>
                                        <div class="cart-quantity" style="height: 33px;">
                                            <div class="quant-input">
                                                <input type="text" class="form-control" style="font-size: 20px;height: fit-content;height: 34px;padding:0px;width: 80px;text-align: center;" value="1" id="qtyval">
                                            </div>
                                        </div>
                                        <button class="btn btn-sm" id="buttonplus" onclick="plus()">+</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        @php
                            $coupon = App\Models\Coupon::where('status', 'Active')->where('validity', '>=', date('Y-m-d'))->first();
                            $size = App\Models\Size::where('product_id', $productdetails->id)->first();
                            $product_percent_discount = round((($size->RegularPrice - $size->SalePrice) / $size->RegularPrice) * 100);
                            $product_solid_discount = round(($size->RegularPrice - $size->SalePrice));
                        @endphp
                        @if ($coupon)
                            <div class="container">
                                <div class="py-2 my-3 row justify-content-between align-items-center coupon-box"
                                    style="border: 1px dotted red !important;">
                                    <div class="col-auto d-flex align-items-center">
                                        <i class="fa-solid fa-fire me-2 text-danger"></i>
                                        <span>@if($coupon->type == 'Percent') {{ $coupon->amount }}% @else
                                        ৳{{ $coupon->amount }} @endif Special Coupon <strong
                                                class="text-danger">{{ $coupon->code }}</strong></span>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ url('checkout') }}"
                                            class="text-decoration-underline text-dark fw-semibold">Click to
                                            Apply</a>
                                    </div>
                                </div>
                            </div>
                            <div class="offer-box">
                                <div class="left-part">
                                    <input type="checkbox" checked>
                                    <span>@if($coupon->type == 'Percent')
                                    {{ $coupon->amount + $product_percent_discount }}% @else ৳
                                        {{ $coupon->amount + $product_solid_discount }} @endif OFFER ENDS IN</span>
                                </div>
                                <div class="countdown" id="countdown">0D : 0H : 0M : 0S</div>
                            </div>
                        @endif
                        <div class="gap-2 d-none align-items-center buy-section">
                            <form name="form" action="{{ url('add-to-cart') }}" id="submitaddtocart"
                                method="POST" enctype="multipart/form-data" style="width:100%">
                                @method('POST')
                                @csrf
                                <input type="hidden" name="color" id="product_colororder"
                                    value="{{$varients[0]->color}}">
                                <input type="hidden" name="size" id="product_sizeorder" value="">
                                <input type="hidden" name="sigment" id="product_sigmentorder" value="">
                                <input type="hidden" name="price" id="product_priceorder" value="">

                                <input type="hidden" name="product_id" value=" {{ $productdetails->id }}"
                                    hidden>
                                <input type="hidden" name="qty" value="1" id="qtyoror">
                                <button type="submit" class="cart-now-btn w-100">
                                    Add To Cart
                                </button>
                            </form>
                        </div>
                        <!-- Quantity + Buy Now + Wishlist -->
                        <div class="gap-2 mb-4 d-flex align-items-center buy-section">
                            <form name="form" action="{{ url('add-to-buy') }}" id="submitaddtocart"
                                method="POST" enctype="multipart/form-data" style="width:100%">
                                @method('POST')
                                @csrf
                                <input type="hidden" name="color" id="product_colororder"
                                    value="{{$varients[0]->color}}">
                                <input type="hidden" name="size" id="product_sizeorder" value="">
                                <input type="hidden" name="sigment" id="product_sigmentorder" value="">
                                <input type="hidden" name="price" id="product_priceorder" value="">

                                <input type="hidden" name="product_id" value=" {{ $productdetails->id }}"
                                    hidden>
                                <input type="hidden" name="qty" value="1" id="qtyoror">
                                <button type="submit" class="buy-now-btn w-100">
                                    Buy Now
                                </button>
                            </form>
                        </div>

                        <!-- Guaranteed Safe Checkout -->
                        {{-- <div class="mb-4 safe-checkout">
                            <p class="mb-2 fw-semibold" style="font-size:14px;">Guaranteed safe checkout
                            </p>
                            <div class="gap-2 d-flex align-items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png"
                                    width="55" alt="Visa">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg"
                                    width="55" alt="PayPal">
                            </div>
                        </div> --}}

                        <!-- Free delivery & returns -->
                        <!--<div class="mb-4 text-center row">-->
                        <!--    <div class="col-6">-->
                        <!--        <i class="mb-2 fa-solid fa-truck-fast fa-lg"></i>-->
                        <!--        <div class="fw-semibold">Free Delivery</div>-->
                        <!--    </div>-->
                        <!--    <div class="col-6">-->
                        <!--        <i class="mb-2 fa-solid fa-rotate-left fa-lg"></i>-->
                        <!--        <div class="fw-semibold">Free Returns</div>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!-- Need Help box -->
                        <div class="gap-3 p-3 mb-4 help-box d-flex align-items-center">
                            <i class="fa-solid fa-headset fa-2x text-secondary"></i>
                            <div>
                                <p class="mb-1 fw-semibold">Need Help? Call Us
                                    <a href="tel:+88{{ $basicinfo->phone_one }}"
                                        class="text-dark text-decoration-none">{{ $basicinfo->phone_one }}</a>
                                </p>
                                <small class="text-muted">Monday - Friday 9:00 - 17:00</small>
                            </div>
                        </div>

                        <!-- Description Accordion -->
                        {{-- <div class="accordion" id="productAccordion">
                            <div class="accordion-item">
                                <h2 class="m-0 accordion-header" id="headingDelivery">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseDelivery"
                                        aria-expanded="false" aria-controls="collapseDelivery">
                                        Description
                                    </button>
                                </h2>
                                <div id="collapseDelivery" class="accordion-collapse collapse"
                                    aria-labelledby="headingDelivery" data-bs-parent="#productAccordion">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Standard and Express delivery services are available for all
                                                items.</li>
                                            <li>Shipping costs are calculated at the checkout page.</li>
                                            <li>Tracking is available for all delivery options.</li>
                                            <li>Items are delivered during standard business hours.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>

                    <style>
                        .offer-box {
                            border: 1px solid #f7b4b4;
                            background-color: #fff6f6;
                            color: #ff6a6a;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            font-weight: 600;
                            font-size: 14px;
                            padding: 0 15px;
                            border-radius: 4px;
                            margin: 20px auto;
                        }

                        .offer-box .left-part {
                            display: flex;
                            align-items: center;
                            gap: 8px;
                        }

                        .offer-box input[type="checkbox"] {
                            accent-color: #28a745;
                            width: 18px;
                            height: 18px;
                            margin-top: 18px;
                        }

                        .countdown {
                            color: #ff6a6a;
                            font-weight: 700;
                        }
                        /* Color dots */
                        .color-dot {
                            width: 22px;
                            height: 22px;
                            border-radius: 50%;
                            border: 1px solid #ccc;
                            cursor: pointer;
                        }

                        /* Quantity input */
                        .qty-input {
                            width: 70px !important;
                            height: 45px;
                            text-align: center;
                            font-size: 16px;
                            border: 1px solid #ccc;
                            border-radius: 3px;
                            -moz-appearance: textfield;
                        }

                        .qty-input::-webkit-outer-spin-button,
                        .qty-input::-webkit-inner-spin-button {
                            opacity: 1;
                        }

                        /* Buy now button */
                        .buy-now-btn {
                            background-color: red;
                            color: #fff;
                            font-weight: 600;
                            border: none;
                            height: 45px;
                            padding: 0 30px;
                            font-size: 16px;
                            border-radius: 3px;
                            transition: 0.3s;
                        }

                        .buy-now-btn:hover {
                            background-color: red;
                        }
                        .cart-now-btn {
                            border:1px solid red !important;
                            background-color: transparent;
                            color: red;
                            font-weight: 600;
                            border: none;
                            height: 45px;
                            padding: 0 30px;
                            font-size: 16px;
                            border-radius: 3px;
                            transition: 0.3s;
                        }

                        .cart-now-btn:hover {
                            background-color: red;
                        }

                        /* Wishlist heart */
                        .wishlist-btn {
                            width: 45px;
                            height: 45px;
                            border: 1px solid #ccc;
                            background: #fff;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            transition: 0.3s;
                        }

                        .wishlist-btn:hover {
                            background-color: #f7f7f7;
                            border-color: #999;
                        }

                        .wishlist-btn i {
                            font-size: 18px;
                            color: #333;
                        }

                        /* Safe checkout logos */
                        .safe-checkout img {
                            border: 1px solid #eee;
                            border-radius: 4px;
                            padding: 4px;
                            background: #fff;
                        }

                        /* Help box */
                        .help-box {
                            background-color: #f7f7f7;
                            border: 1px solid #eee;
                            border-radius: 5px;
                        }

                        /* Accordion */
                        .accordion-button {
                            font-weight: 600;
                        }

                        .accordion-body ul {
                            margin-left: 20px;
                            list-style: disc;
                        }

                        .accordion-body li {
                            margin-bottom: 6px;
                        }

                        /* Responsive */
                        @media (max-width: 576px) {
                            .buy-section {
                                /* flex-direction: column; */
                                align-items: stretch;
                            }

                            .qty-input,
                            .buy-now-btn,
                            .wishlist-btn {
                                width: 100%;
                            }

                            .wishlist-btn {
                                border-radius: 6px;
                                height: 40px;
                            }
                        }
                    </style>
                </div>
                <!-- /.product-info -->
            </div>
            <!-- /.col-sm-7 -->
        </div>
        <!-- /.row -->
    </div>
</div>


{{-- modal for process and cart --}}
@if (App\Models\Size::where('product_id', $productdetails->id)->first())
    <input type="hidden" id="gtmprice" value="{{ App\Models\Size::where('product_id', $productdetails->id)->first()->SalePrice }}">
    <input type="hidden" id="gtmdiscount" value="{{App\Models\Size::where('product_id', $productdetails->id)->first()->RegularPrice-App\Models\Size::where('product_id', $productdetails->id)->first()->SalePrice}}">
@else
    <input type="hidden" id="gtmprice" value="{{ App\Models\Weight::where('product_id', $productdetails->id)->first()->SalePrice }}">
    <input type="hidden" id="gtmdiscount" value="{{App\Models\Weight::where('product_id', $productdetails->id)->first()->RegularPrice-App\Models\Weight::where('product_id', $productdetails->id)->first()->SalePrice}}">
@endif

<input type="hidden" id="gtmproductname" value="{{$productdetails->ProductName}}">
<input type="hidden" id="gtmcategory" value="{{App\Models\Category::where('id',$productdetails->category_id)->first()->category_name}}">
<input type="hidden" id="gtmproductid" value="{{$productdetails->id}}">
<input type="hidden" id="gtmproductsku" value="{{$productdetails->ProductSku}}">


<script>
$(document).ready( function(){

    var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    var slidesPerPage = 4; //globaly define number of elements per page
    var syncedSecondary = true;

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        autoplay: false,
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: [
            '<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>',
            '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'
        ],
    }).on('changed.owl.carousel', syncPosition);

    sync2
        .on('initialized.owl.carousel', function() {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            margin: 6,
            items: slidesPerPage,
            dots: false,
            nav: true,
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        //end block

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });


    $('#AddToCartForm').submit(function(e) {
        e.preventDefault();
        $('#processing').css({
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center'
        })
        $('#processing').modal('show');
        $.ajax({
            type: 'POST',
            url: '{{ url('add-to-cart') }}',
            processData: false,
            contentType: false,
            data: new FormData(this),

            success: function(data) {
                updatecart();
                $.ajax({
                    type: 'GET',
                    url: '{{ url('get-cart-content') }}',

                    success: function(response) {
                        $('#cartViewModal .modal-body').empty().append(
                            response);
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
                $('#processing').modal('hide');
                $('#cartViewModal').modal('show');
            },
            error: function(error) {
                console.log('error');
            }
        });
    });

    // document.getElementById("istteb").click();
    $('#owl-single-product').owlCarousel({
        items: 1,
        itemsTablet: [768, 1],
        itemsDesktop: [1199, 1],
        autoplay: true,
        loop: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsiveClass: true,
        dots: true,

    });
});

var gtmprice=$('#gtmprice').val();
var gtmqty=$('#proQuantity').val();
var gtmid=$('#gtmproductid').val();
var gtmsku=$('#gtmproductsku').val();
var gtmproductname=$('#gtmproductname').val();
var gtmcategory=$('#gtmcategory').val();
var gtmdiscount=$('#gtmdiscount').val();

window.dataLayer = window.dataLayer || [];
dataLayer.push({
    ecommerce: null
});
dataLayer.push({
    event: "view_item",
    ecommerce: {
        currency: "BDT",
        value: gtmprice,
        items: [{
            item_id: gtmsku,
            item_name: gtmproductname,
            index: 0,
            price: gtmprice,
            discount: gtmdiscount,
            item_brand: 'Rashibd.com',
            item_category: gtmcategory,
            currency: "BDT",
            quantity: 1,
        }]

    }
});

</script>
<script type="text/javascript">
    $(document).ready(function() {
        document.getElementById('submitaddtocart').addEventListener('submit', function(event) {
            window.dataLayer = window.dataLayer || [];
            dataLayer.push({
                ecommerce: null
            });
            dataLayer.push({
                event: "add_to_cart",
                ecommerce: {
                    currency: "BDT",
                    value: gtmprice,
                    items: [{
                        item_id: gtmsku,
                        item_name: gtmproductname,
                        index: 0,
                        price: gtmprice,
                        discount: gtmdiscount,
                        item_brand: 'Rashibd.com',
                        item_category: gtmcategory,
                        currency: "BDT",
                        quantity: $('#qtyoror').val()
                    }]
                }
            });
        });
    });
</script>
