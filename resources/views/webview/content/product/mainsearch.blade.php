@extends('webview.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}-Search Products
    @endsection

    <style>
        #checked {
            color: orange;
        }

        .star {
            font-size: 8px !important;
        }

        #featureimageCt {
            height: 300px;
            width: auto;
            padding: 2px;
            padding-top: 0;
        }

        @media only screen and (max-width: 600px) {
            #featureimageCt {
                height: 220px;
                width: auto;
                padding: 2px;
                padding-top: 0;
            }
        }
    </style>
    <div class="body-content outer-top-xs">
        <div class="pt-2 breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="p-0 breadcrumb-inner">
                            <ul class="mb-0 list-inline list-unstyled">
                                <li><a href="#"
                                        style="text-transform: capitalize !important;color: #888;padding-right: 12px;font-size: 12px;">Home
                                        > Search > <span class="active"></span>Products</span>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.breadcrumb-inner -->
                </div>
            </div>
            <!-- /.container -->
        </div>


        <div class='container'>
            <div class='row'>
                <!-- /.sidebar -->
                <div class='col-md-12' id="cateoryPro">
                    <div class="container">

                        <div class="pt-2 pb-2 row" style="background: white;">

                            @forelse ($searchproducts as $promotional)
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
                                <div class="col-6 col-md-2">
                                    <div class="card product-card">
                                        <div class="sale-discount-badge">
                                            {{ round((($firstpro->sizes[0]->RegularPrice - $firstpro->sizes[0]->SalePrice) / $firstpro->sizes[0]->RegularPrice) * 100) }}%
                                        </div>
                                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                                            <img src="{{ asset($promotional->ProductImage) }}" alt="Product">
                                        </a>

                                        <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                                            <div class="product-info d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="product-name">{{ $promotional->ProductName }}</div>
                                                    <div class="product-price">
                                                        ৳ {{ round($firstpro->sizes[0]->SalePrice) }}</div>
                                                </div>
                                            </div>
                                        </a>

                                        <div class="product-btn-wrap">
                                            <button type="button"
                                                class="btn quick-add-to-cart-btn quick-shop-btn d-flex justify-content-center"
                                                data-product-id="{{ $promotional->id }}">
                                                Add to Cart
                                            </button>

                                            <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"
                                                class="btn quick-buy-now-btn d-flex justify-content-center">
                                                Buy Now
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            @empty
                            @endforelse
                        </div>

                    </div>
                    <!-- /.category-product -->


                    <!-- /.tab-content -->
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">

                            </div>
                            <!-- /.pagination-container -->
                        </div>
                        <!-- /.text-right -->

                    </div>
                    <!-- /.filters-container -->

                </div>
                <!-- /.col -->
            </div>

            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->

    </div>
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
                        $('#cateoryPro #likereactof' + id).text(data.total);
                        $('#cateoryPro #likereactdone' + id).css('color', 'orange');
                    } else if (data.sigment == 'unlike') {
                        $('#cateoryPro #likereactof' + id).text(data.total);
                        $('#cateoryPro #likereactdone' + id).css('color', 'black');
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
                        $('#cateoryPro #lovereactof' + id).text(data.total);
                        $('#cateoryPro #lovereactdone' + id).css('color', 'orange');
                    } else {
                        $('#cateoryPro #lovereactof' + id).text(data.total);
                        $('#cateoryPro #lovereactdone' + id).css('color', 'black');
                    }
                },
                error: function (error) {
                    console.log('error');
                }
            });
        }
    </script>
@endsection
