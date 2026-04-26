<style>
    #buttonplus {
        font-size: 25px;
        padding: 3px 14px;
        border-radius: 0px;
        height: 30px;
        margin: 0;
        line-height: 4px;
        color: #000;
        border: none;
    }

    #buttonminus {
        font-size: 40px;
        padding: 3px 14px;
        border-radius: 0px;
        height: 25px;
        margin: 0;
        line-height: 4px;
        color: #000;
        border: none;
    }
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1); /* Increase size by 10% */
        }
    }
</style>
<div class="row">
    <div class="p-0 col-sm-12">
        <section class="pt-0 pb-0 product-section">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <div class="details_right" style="padding:5px 5px; border: none;">

                            <div class="product">

                                <div class="product-cart">
                                    <div class="d-flex">
                                        <!-- Static product image -->
                                        <img class="w-100" src="{{ asset($productdetails->ProductImage) }}"
                                            alt="Product Image"
                                            style="width: 26% !important;border-radius:4px;margin-bottom: 12px;" />
                                        <div class="ps-2">
                                            <!-- Static product name -->
                                            <p class="name" style="font-size: 18px;">{{ $productdetails->ProductName }}</p>
                                            @if (App\Models\Size::where('product_id', $productdetails->id)->first())
                                                <div class="product-price strong-700" style="color:black;font-weight:bold;padding-top: 6px;" id="productPriceAmount">
                                                    <span id="salePrice">{{ App\Models\Size::where('product_id', $productdetails->id)->first()->SalePrice }}</span>
                                                    TK
                                                    @if (App\Models\Size::where('product_id', $productdetails->id)->first()->Discount > 0)
                                                        &nbsp;<del class="old-product-price strong-400"
                                                            style="color: #fe0909;font-size: 20px;">{{ round(App\Models\Size::where('product_id', $productdetails->id)->first()->RegularPrice) }}</del>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="product-price strong-700" style="color:black;font-weight:bold;padding-top: 6px;" id="productPriceAmount">
                                                    <span id="salePrice"
                                                        style="color:black;font-weight:bold;">{{ App\Models\Weight::where('product_id', $productdetails->id)->first()->SalePrice }}</span>
                                                    TK
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Main Add to Cart Form -->
                                    <div>

                                        <!-- Color Options -->
                                        @if (empty(json_decode($singlemain->RelatedProductIds)))
                                        @else
                                            <div class="mb-2 col-12 col-md-12 colorpart">
                                                <h4 id="productselect" class="m-0"><b style="font-size:14px">প্রডাক্ট এর
                                                        কালার সিলেক্ট করুনঃ </b></h4>
                                                <div class="d-flex">
                                                    <div class="colorinfo">
                                                        @forelse (json_decode($singlemain->RelatedProductIds) as $key => $ids)
                                                            @php
        $prodinfo = App\Models\Product::where('id', $ids->productID)
            ->where('status', 'Active')
            ->first();
                                                            @endphp
                                                            @if (isset($prodinfo))
                                                                <input type="radio" class="m-0" id="relproduct{{ $prodinfo->id }}" hidden name="relproduct"
                                                                    onclick="getrelproduct('{{ $prodinfo->id }}','{{ $singlemain->id }}')">
                                                                <label class="relproduct ms-0" id="relproducttext{{ $prodinfo->id }}" for="relproduct{{ $prodinfo->id }}"
                                                                    style="border: 1px solid #000;padding: 0px;"
                                                                    onclick="getrelproduct('{{ $prodinfo->id }}','{{ $singlemain->id }}')">
                                                                    <img src="{{ asset($prodinfo->ProductImage) }}" alt="" style="width:60px;">
                                                                </label>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Size Options -->
                                        @if (count($sizesolds) < 1)
                                        @else
                                            <div class="col-12 col-md-12 colorpart">
                                                <h4 id="resellerprice" class="m-0"><b style="font-size:14px">নিচে সাইজ
                                                        সিলেক্ট করুনঃ </b></h4>
                                                <div class="sizeinfo">
                                                    @forelse ($sizesolds as $sizesold)
                                                        @if ($sizesold->available_stock > 0)
                                                            <input type="hidden" name="regularpriceofsize" id="regularpriceofsize{{ $sizesold->size }}"
                                                                value="{{ $sizesold->RegularPrice }}">
                                                            <input type="hidden" name="salepriceofsize" id="salepriceofsize{{ $sizesold->size }}"
                                                                value="{{ $sizesold->SalePrice }}">
                                                            <input type="radio" class="m-0" hidden id="size{{ $sizesold->size }}" name="size"
                                                                onclick="getsize('{{ $sizesold->size }}')">
                                                            <label class="sizetext ms-0" id="sizetext{{ $sizesold->size }}" for="size{{ $sizesold->size }}"
                                                                style="border: 1px solid #e4e4e4;font-size:18px;font-weight:bold;padding: 0px 8px;border-radius: 2px;margin-right:4px;margin-bottom:4px;"
                                                                onclick="getsize('{{ $sizesold->size }}')">{{ $sizesold->size }}</label>
                                                        @else
                                                            <input type="hidden" name="regularpriceofsize" id="regularpriceofsize{{ $sizesold->size }}"
                                                                value="{{ $sizesold->RegularPrice }}">
                                                            <input type="hidden" name="salepriceofsize" id="salepriceofsize{{ $sizesold->size }}"
                                                                value="{{ $sizesold->SalePrice }}">
                                                            <input type="radio" class="m-0" hidden id="size{{ $sizesold->size }}" name="size">
                                                            <label class="sizetext ms-0" id="sizetext{{ $sizesold->size }}" for="size{{ $sizesold->size }}"
                                                                style="border: 1px solid #e4e4e4;    color: rgb(151 150 150) !important;font-size:18px;font-weight:bold;padding: 0px 8px;border-radius: 2px;margin-right:4px;margin-bottom:4px;"><del>{{ $sizesold->size }}
                                                                </del> </label>
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        @endif

                                        <!-- weight Options -->
                                        @if (count($weightolds) < 1)
                                        @else
                                            <div class="col-12 col-md-12 colorpart">
                                                <h4 id="resellerprice" class="m-0"><b style="font-size:14px">সিলেক্ট
                                                        করে কনফার্ম করুনঃ</b></h4>
                                                <div class="sizeinfo">
                                                    @forelse ($weightolds as $weight)
                                                        <input type="hidden" name="regularpriceofsize" id="regularpriceofsize{{ $weight->id }}"
                                                            value="{{ $weight->RegularPrice }}">
                                                        <input type="hidden" name="salepriceofsize" id="salepriceofsize{{ $weight->id }}"
                                                            value="{{ $weight->SalePrice }}">
                                                        <input type="hidden" name="weightsigmrnt" id="weightsigmrnt{{ $weight->id }}" value="{{ $weight->weight }}">
                                                        <input type="radio" class="m-0" hidden id="size{{ $weight->id }}" name="size"
                                                            onclick="getweight('{{ $weight->id }}')">
                                                        <label class="weighttext ms-0" id="weighttext{{ $weight->id }}" for="size{{ $weight->id }}"
                                                            style="border: 1px solid #e4e4e4;font-size:16px;font-weight:bold;padding: 0px 6px;border-radius: 2px;margin-right:4px;margin-bottom:4px;"
                                                            onclick="getweight('{{ $weight->id }}')">{{ $weight->weight }}</label>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Quantity -->
                                        <div class="mt-2 row">
                                            <div class="col-12">
                                                <div class="pr-2 d-flex" style="justify-content: left;">
                                                    <button class="btn btn-sm" id="buttonminus" onclick="minus()">-</button>
                                                    <div class="cart-quantity" style="height: 33px;">
                                                        <div class="quant-input">
                                                            <input type="text" class="form-control"
                                                                style="font-size: 20px;height: fit-content;height: 34px;padding:0px;width: 80px;text-align: center;"
                                                                value="1" id="qtyval">
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-sm" id="buttonplus" onclick="plus()">+</button>
                                                </div>
                                            </div>
                                            <div class="mt-2 col-12">
                                                <form name="form" action="{{ url('add-to-cart') }}" id="submitaddtocart" method="POST" enctype="multipart/form-data"
                                                    style="text-align: center;">
                                                    @method('POST')
                                                    @csrf
                                                    <input type="hidden" name="color" id="product_colororder" value="{{ $varients[0]->color }}">
                                                    <input type="hidden" name="size" id="product_sizeorder" value="">
                                                    <input type="hidden" name="sigment" id="product_sigmentorder" value="">
                                                    <input type="hidden" name="price" id="product_priceorder" value="">

                                                    <input type="hidden" name="product_id" value=" {{ $productdetails->id }}" hidden>
                                                    <input type="hidden" name="qty" value="1" id="qtyoror">
                                                    <button type="submit"
                                                        class="mb-0 ml-2 btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now"
                                                        style="background:transparent;border: 1px solid #22A3A4;color:#22A3A4;width: 100%;font-size: 17px;">
                                                        Add To Cart
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="mt-2 col-12">
                                                <form name="form" action="{{ url('add-to-buy') }}" id="submitaddtocart" method="POST" enctype="multipart/form-data"
                                                    style="text-align: center;">
                                                    @method('POST')
                                                    @csrf
                                                    <input type="hidden" name="color" id="product_colororder" value="{{ $varients[0]->color }}">
                                                    <input type="hidden" name="size" id="product_sizeorder" value="">
                                                    <input type="hidden" name="sigment" id="product_sigmentorder" value="">
                                                    <input type="hidden" name="price" id="product_priceorder" value="">

                                                    <input type="hidden" name="product_id" value=" {{ $productdetails->id }}" hidden>
                                                    <input type="hidden" name="qty" value="1" id="qtyoror">
                                                    <button type="submit"
                                                        class="mb-0 ml-2 btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now"
                                                        style="background:#22A3A4;color:white;width: 100%;font-size: 17px;animation: pulse 1.5s ease-in-out infinite">
                                                        Order Now
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>
<script>
    function getrelproduct(product_id, mainpro_id) {
        $('#processing').css({
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center'
        })
        $('#processing').modal('show');
        $.ajax({
            type: 'GET',
            url: '{{ url('load/related-product') }}',
            data: {
                'product_id': product_id,
                'mainproduct_id': mainpro_id
            },
            success: function (response) {
                $('#processing').modal('hide');
                $('#loadproduct').empty().append(response);
            },
            error: function (error) {
                console.log('error');
            }
        });
    }


    function checked(id) {
        if (id == 1) {
            $('#checked' + id).css('color', 'orange');
            $('#checked2').css('color', 'black');
            $('#checked3').css('color', 'black');
            $('#checked4').css('color', 'black');
            $('#checked5').css('color', 'black');
        } else if (id == 2) {
            $('#checked1').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
            $('#checked3').css('color', 'black');
            $('#checked4').css('color', 'black');
            $('#checked5').css('color', 'black');
        } else if (id == 3) {
            $('#checked1').css('color', 'orange');
            $('#checked2').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
            $('#checked4').css('color', 'black');
            $('#checked5').css('color', 'black');
        } else if (id == 4) {
            $('#checked1').css('color', 'orange');
            $('#checked2').css('color', 'orange');
            $('#checked3').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
            $('#checked5').css('color', 'black');
        } else if (id == 5) {
            $('#checked1').css('color', 'orange');
            $('#checked2').css('color', 'orange');
            $('#checked3').css('color', 'orange');
            $('#checked4').css('color', 'orange');
            $('#checked' + id).css('color', 'orange');
        } else {

        }

        $('#rating').val(id);
    }

    function loadreview() {
        $.ajax({
            type: 'GET',
            url: '{{ url('load/review') }}',

            success: function (response) {
                $('#reviewload').empty().append(response);
            },
            error: function (error) {
                console.log('error');
            }
        });
    }

    $(document).ready(function () {

        loadreview();

        $('#AddReview').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ url('review/store') }}',
                processData: false,
                contentType: false,
                data: new FormData(this),

                success: function (data) {
                    swal({
                        title: "Success!",
                        icon: "success",
                    });
                },
                error: function (error) {
                    console.log('error');
                }
            });
        });

        $('#relatedCarousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsiveClass: true,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 2,
                },
                1000: {
                    items: 6,
                }
            }
        });

    });


    function minus() {
        var avqty = $('#qtyval').val();
        if (avqty == 1) {

        } else {
            qty = Number(avqty) - 1;
            $('#qtyval').val(qty);
            $('#qtyor').val(qty);
            $('#qtyoror').val(qty);
            $('#qtyad').val(qty);
        }
    }

    function plus() {
        var avqty = $('#qtyval').val();
        if (avqty == 10) {

        } else {
            qty = Number(avqty) + 1;
            $('#qtyval').val(qty);
            $('#qtyor').val(qty);
            $('#qtyoror').val(qty);
            $('#qtyad').val(qty);
        }
    }



    function getcolor(color, key) {
        $("#sync1").data('owl.carousel').to(key, 300, true);
        $('#product_color').val(color);
        $('#product_colororder').val(color);
        $('.colortext').css('color', '#000');
        $('.colortext').css('border', '1px solid');
        $('#colortext' + color).css('border', '2px solid');
        $('.sizetext').css('color', '#000');
        $('.sizetext').css('background', '#fff');
    }

    function getsize(size) {
        $('#product_sizeorder').val(size);
        var reg = $('#regularpriceofsize' + size).val();
        var sale = $('#salepriceofsize' + size).val();
        $('#product_price').val(sale);
        $('#product_priceorder').val(sale);
        $('#salePrice').html(sale);

        $('.sizetext').css('color', '#000');
        $('.sizetext').css('background', '#fff');
        $('#sizetext' + size).css('color', '#fff');
        $('#sizetext' + size).css('background', '#613EEA');
        $('#product_sigmentorder').val('');
    }

    function getweight(weight) {
        var sig = $('#weightsigmrnt' + weight).val();
        $('#product_sigmentorder').val(sig);
        var reg = $('#regularpriceofsize' + weight).val();
        var sale = $('#salepriceofsize' + weight).val();
        $('#product_price').val(sale);
        $('#product_priceorder').val(sale);
        $('#salePrice').html(sale);

        $('.weighttext').css('color', '#000');
        $('.weighttext').css('background', '#fff');
        $('#weighttext' + weight).css('color', '#fff');
        $('#weighttext' + weight).css('background', '#613EEA');
    }
</script>
