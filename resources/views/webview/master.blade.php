<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @yield('meta')

    @include('webview.partials.links.header')
    <link rel="icon" type="image/x-icon" href="{{asset(App\Models\Basicinfo::first()->favicon)}}">
    <link rel="shortcut icon" type="image/png" href="{{asset(App\Models\Basicinfo::first()->favicon)}}"/>
    @yield('subhead')
    <style>

         #crimg:hover{
            transform:rotate(360deg);
            /* Firefox */
            -moz-transition: all .5s ease-in;
            -webkit-transition: all .5s ease-in;
            -o-transition: all .5s ease-in;
            transition: all .5s ease-in;
        }
         #shimg:hover{
            transform:rotate(360deg);
            /* Firefox */
            -moz-transition: all .5s ease-in;
            -webkit-transition: all .5s ease-in;
            -o-transition: all .5s ease-in;
            transition: all .5s ease-in;
        }
        #message{
            display:none;
        }
        #crossm{
            display:none;
        }
        #crossms{
            display:none;
        }
        #hideser {
            display: none;
            float: left;
            padding: 0;
        }
        .header-top-inner {
            padding: 4px;
        }
        #subcategoryhover li {
            border-bottom: 1px solid #eee;
        }

        #subcategoryhover a:hover {
            color: #c30909 !important
        }


        #discountpart{
            position: absolute;
            top: 0px;
            right: 0px;
            background: red;
            border-radius: 16px 0% 0% 16px;
            height: 20px;
            width: 60px;
            box-shadow: 1px 1px 10px 1px #05050522;

        }
        #discountparttwo{
            background: #ff0a01;
            border-radius: 50%;
            height: 32px;
            width: 32px;
            float: left;

        }
        #pdis{
            font-size: 10px;
            margin: 0;
            padding-top: 2px;
            float: right;
            color: white;
            font-weight: bold;
            padding-right: 4px;
        }


        #sync1 .items img:hover{
            transform: scale(1.4);
        }
        #sync1 .items img{
            transition: .5s;
        }

        #posit {
            position: fixed;
            left: 0;
            z-index: 1111;
            top: 50%;
            background: #000000;
            height: 40px;
            width: 55px;
            text-align: end;
            border-radius: 0px;
        }

    </style>



    {!!$basicinfo->facebook_pixel!!}
    {!!$basicinfo->google_analytics!!}


</head>

<body class="main-body">
    
@if(!isset($_COOKIE['cookie_consent']))

<div id="cookieConsent"
     class="position-fixed start-0 w-100 p-3 d-none"
     style="z-index:9999; bottom:90px;">
     
    <div class="row justify-content-end">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card shadow-lg border-0 rounded-2">
                <div class="card-body" style="padding:10px;">

                    <h5 class="fw-bold m-0 my-1" style="font-size:15px">
                        🍪 At Saferas, we respect your privacy.
                    </h5>

                    <p class="text-muted small m-0">
                        We use cookies improve your experience.
                    </p>

                    <div class="row g-2 p-2">

                        <div class="col-6 col-sm-12">
                            <button class="btn btn-warning text-white fw-semibold w-100"
                                    onclick="setCookieConsent('allow')">
                                Accept All
                            </button>
                        </div>

                        <div class="col-6 col-sm-12">
                            <button class="btn btn-outline-secondary fw-semibold w-100"
                                    onclick="setCookieConsent('decline')">
                                Decline
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endif
<script>
function setCookieConsent(value) {

    let days = 30;
    let date = new Date();

    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));

    document.cookie = "cookie_consent=" + value +
        "; expires=" + date.toUTCString() +
        "; path=/";

    document.getElementById("cookieConsent").style.display = "none";
}
</script>





    <!-- header -->
    @include('webview.partials.header')
    <!-- header end -->


    <!-- Body -->
    <div class="body-content" id="top-banner-and-menu">
        {{-- //main content --}}
        @yield('maincontent')
        {{-- //main content End --}}
    </div>
    <!-- Body end -->

    <!-- === FOOTER === -->
    @include('webview.partials.footer')
    <!-- === FOOTER : END === -->


<style>
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #fff;
    border-top: 1px solid #ddd;
    z-index: 9999;
}

.bottom-nav .nav-item {
    text-align: center;
    flex: 1;
    padding: 8px 0;
}

.bottom-nav .nav-item i {
    font-size: 20px;
}

.bottom-nav .active i,
.bottom-nav .active span {
    color: red !important;
}

/* Cart icon center style */
.cart-icon {
    width: 60px;
    height: 60px;
    background: red;
    color: #fff !important;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: -30px;
    font-size: 26px !important;
    margin-left:10px;
}
</style>

<div class="d-lg-none">
    <nav class="bottom-nav d-flex justify-content-between">
        <a href="{{url('/')}}" class="nav-item active">
            <i class="fa-solid fa-house text-danger"></i>
            <br>
            <span class="text-danger">Home</span>
        </a>

        <a href="javascript:void(0);" onclick="openNav()" class="nav-item">
            <i class="fa-solid fa-border-all text-dark"></i>
            <br>
            <span class="text-dark">Categories</span>
        </a>

        <a href="{{ url('checkout') }}" class="nav-item">
            <div class="cart-icon">
                <i class="text-white fa-solid fa-bag-shopping"></i>
            </div>
            <span class="text-dark">Cart ({{ intval(Cart::count()) }})</span>
        </a>

        <a onclick="showmessage()" class="nav-item">
            <i class="fa-regular fa-message text-dark"></i>
            <br>
            <span class="text-dark">Message</span>
        </a>
        @if (Auth::id())
            <button type="button" onclick="openProfileNav()" class="nav-item" style="    background: transparent;
    margin-bottom: 0px;">
                <i class="fa-regular fa-user text-dark"></i>
                <br>
                <span class="text-dark">Account</span>
            </button>
        @else
        <a href="{{ url('user/profile') }}" class="nav-item" >
            <i class="fa-regular fa-user text-dark"></i>
            <br>
            <span class="text-dark">Account</span>
        </a>
        @endif
    </nav>
</div>




    <!--Footer Js-->
    @include('webview.partials.links.footer')

    @yield('subfooter')

    <div id="message">
        
        <a onclick="hidemessage()" target="_blank" style="position: fixed;bottom: 300px;right: 6px;z-index:1111">
            <img src="{{asset('public/crossimages.png')}}" style="height:60px;border-radius:50%">
        </a>
        <a href="{{$basicinfo->messanger}}" target="_blank" style="position: fixed;bottom: 230px;right: 6px;z-index:1111">
            <img src="{{asset('public/messenger.png')}}" style="height:60px;border-radius:50%">
        </a>
        <a href="tel:+88{{ $basicinfo->wp_1 }}" target="_blank" style="position: fixed;bottom: 160px;right: 6px;z-index:1111">
            <img src="{{asset('public/telephone.png')}}" style="height:60px;border-radius:50%">
        </a>

        <a href="https://wa.me/+88{{ $basicinfo->wp_1 }}?text=I%20am%20interested" style="position: fixed;bottom: 90px;right: 6px;z-index:1111">
            <img src="{{asset('public/whatsappns.png')}}" style="height:60px;border-radius:50%">
        </a>
    </div>

    <a href="javascript:void(0);" class="d-none d-lg-block" onclick="showmessage()" id="showm" style="position: fixed;bottom: 10px;right: 6px;z-index:1111">
        <img src="{{asset('public/livec-removebg-preview.png')}}" style="height:60px;" id="shimg">
    </a>
    <a href="javascript:void(0);" onclick="hidemessage()" id="crossm" style="position: fixed;bottom: 10px;right: 6px;z-index:1111">
        <img src="{{asset('public/livec-removebg-preview.png')}}" style="height:60px;" id="crimg">
    </a>

    {{-- model cart --}}

    {{-- <div class="modal" id="processing">
        <div class="modal-dialog">
            <div class="modal-content" style="text-align: center;background: none;">
                <i class="spinner fa fa-spinner fa-spin"
                    style="color: #ffffff; font-size: 70px;  padding: 22px;"></i>
            </div>
        </div>
    </div> --}}


    <div class="modal" id="cartViewModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body" id="AddToCartModel" style="padding-top: 0">

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span
                            aria-hidden="true">Add
                            More Products</span></button>
                    <a href="{{ url('checkout') }}" class="btn btn-primary">Submit Order</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quickShopModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header with Close Button -->
                <div class="modal-header">
                    <h5 class="modal-title fs-6 fw-bold" style="margin-left:28%">Select your product size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="quickShopModalBody">
                </div>
            </div>
        </div>
    </div>



    {{-- csrf --}}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    {!!$basicinfo->chat_box!!}

    <script>

        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }

        function checkcartview(){
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
        }



        function showmessage(){
            $('#showm').css('display','none');
            $('#showms').css('display','none');
            $('#crossms').css('display','inline');
            $('#crossm').css('display','inline');
            $("#message").fadeIn('slow');
        }
        function hidemessage(){
            $('#showm').css('display','inline');
            $('#showms').css('display','inline');
            $('#crossms').css('display','none');
            $('#crossm').css('display','none');
            $("#message").fadeOut('slow');
        }


        $(document).ready(function() {
            var idval = $('#CountSlider').val();

            $('#slider').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: true,
                navText: [
                    '<i class="mb-2 fa-solid fa-chevron-left fs-6"></i>',
                    '<i class="mb-2 fa-solid fa-chevron-right fs-6"></i>'
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });

            $('#youtube').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: false,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    }
                }
            });

            $('#categorySlide').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: true,
                responsive: {
                    0: {
                        items: 3,
                    },
                    600: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    1000: {
                        items: 8,
                    }
                }
            });

            $('#promotionalofferSlide').owlCarousel({
                loop: true,
                margin: 5,
                autoplay: false,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 6,
                    }
                }
            });

            $('#featuredProductSlide').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 3,
                    },
                    600: {
                        items: 3,
                    },
                    1000: {
                        items: 6,
                    }
                }
            });

            $('#bestsellingproductSlide').owlCarousel({
                loop: true,
                margin: 0,
                autoplay: true,
                lazyLoad: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                responsiveClass: true,
                dots: false,
                nav: true,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    }
                }
            });

            for (let i = 0; i < idval; i++) {

                $('#CategoryProductSlide' + [i]).owlCarousel({
                    loop: true,
                    margin: 10,
                    autoplay: true,
                    autoplayTimeout: 2500,
                    lazyLoad: true,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 3,
                        },
                        600: {
                            items: 3,
                        },
                        1000: {
                            items: 6,
                        }
                    }
                });
            }



        });

        var token = $("input[name='_token']").val();

        function addtocart(product_id) {
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                data: {
                    _token: token,
                    product_id: product_id,
                    qty: '1',
                },

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
        }

        function buynow(product_id) {
            $('#processing').css({
                'display': 'flex',
                'justify-content': 'center',
                'align-items': 'center'
            })
            $('#processing').modal('show');
            $.ajax({
                type: 'POST',
                url: '{{ url('add-to-cart') }}',
                data: {
                    _token: token,
                    product_id: product_id,
                    qty: '1',
                },

                success: function(data) {
                    updatecart();
                    if (data == 'success') {
                        window.location.href = 'https://seenur.com/checkout';
                        $('#processing').modal('hide');
                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }


        function removeFromCartItem(rowId) {

            $.ajax({
                type: 'POST',
                url: '{{ url('remove-cart') }}',
                data: {
                    _token: token,
                    rowId: rowId,
                },

                success: function(response) {

                    updatecart();
                    swal({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Product remove from your Cart',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    if (response == 'empty') {
                        $('#loadingreload').css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'align-items': 'center'
                        })
                        $('#loadingreload').modal('show');
                        $('#cartViewModal').modal('hide');
                        location.reload();
                    } else {
                        $('#cartViewModal .modal-body').empty().append(
                            response);
                        $('#cartViewModal').modal('show');
                    }


                },
                error: function(error) {
                    console.log('error');
                }
            });
        }



        function upQuantity() {
            var qty = $('#proQuantity').val();
            if (qty >= 10) {

            } else {
                var b = parseInt(qty);
                var cq = b + 1;
                $('#proQuantity').val(cq);
                $('#qty').val(cq);
                $('#qtyor').val(cq);
            }
        }

        function downQuantity() {
            var qty = $('#proQuantity').val();
            if (qty <= 1) {

            } else {
                var b = parseInt(qty);
                var cq = b - 1;
                $('#proQuantity').val(cq);
                $('#qty').val(cq);
                $('#qtyor').val(cq);
            }


        }

        function checkcart() {
            $.ajax({
                type: 'GET',
                url: '{{ url('get-checkcart-content') }}',

                success: function(response) {
                    $('#checkcartview').html('');
                    $('#checkcartview').append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function removeFromCartItemHead(rowId) {

            $.ajax({
                type: 'POST',
                url: '{{ url('remove-cart') }}',
                data: {
                    _token: token,
                    rowId: rowId,
                },

                success: function(response) {
                    if (response == 'empty') {
                        $('#loadingreload').css({
                            'display': 'flex',
                            'justify-content': 'center',
                            'align-items': 'center'
                        })
                        $('#loadingreload').modal('show');
                        toastr.success('Product remove from Cart');
                        checkcart();
                        viewcart();
                        updatecart();
                        location.reload();
                    } else {
                        console.log('hi');
                        toastr.success('Product remove from Cart');
                        checkcart();
                        viewcart();
                        updatecart();
                    }


                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function viewcart() {
            $.ajax({
                type: 'get',
                url: '{{ url('load-cart') }}',

                success: function(response) {
                    $('#cart-summary').empty().append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function updatecart() {
            $.ajax({
                type: 'get',
                url: '{{ url('update-cart') }}',

                success: function(response) {
                    $('.basket-item-count').html(response.item);
                    $('.cartamountvalue').html(response.amount);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        function searchproduct() {
            var search = $('#modalsearchinput').val();
            $.ajax({
                type: 'GET',
                url: '{{ url('get-search-content') }}',
                data: {
                    _token: token,
                    search: search,
                },

                success: function(response) {
                    $('#searchproductlist').html('');
                    $('#searchproductlist').append(
                        response);
                },
                error: function(error) {
                    console.log('error');
                }
            });
        }

        $(document).ready(function() {
            $('img').lazyload();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#searchToggleIcon').on('click',function ()
            {
                $('#nav-item').toggle();
                $('#pro-search-form').toggleClass('d-none');

            });

        });

    </script>
    <script>
        $(document).ready(function () {
            $('.quick-shop-btn').on('click', function () {
                var productId = $(this).data('product-id');

                $('#quickShopModalBody').html('<p>Loading...</p>');

                $('#quickShopModal').modal('show');

                $.ajax({
                    url: '{{url("quick-shop")}}/' + productId, // your route
                    type: 'GET',
                    success: function (response) {
                        $('#quickShopModalBody').html(response);
                    },
                    error: function () {
                        $('#quickShopModalBody').html('<p>Something went wrong!</p>');
                    }
                });
            });
        });

    </script>

</body>

</html>
