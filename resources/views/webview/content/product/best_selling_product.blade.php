@extends('webview.master')

@section('maincontent')
@section('title')
    {{ env('APP_NAME') }}- Best Selling Product
@endsection
<style>
    #checked {
        color: orange;
    }

    .star {
        font-size: 8px !important;
    }
</style>

<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class="pt-2 breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="p-0 breadcrumb-inner">
                        <ul class="mb-0 list-inline list-unstyled">
                            <li><a href="#"
                                    style="text-transform: capitalize !important;color: #888;padding-right: 12px;font-size: 12px;">Home
                                    > <span class="active"></span>Best Selling Product</span>
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
                <div class="container p-0">
                    <div class="pt-2 pb-2 row" style="background: white;" id="data-wrapper">
                        <div class="container">
                            <div class="row g-3">
                                @forelse ($bestselling_products as $promotional)
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
                                                            ৳ {{ round($firstpro->sizes[0]->SalePrice) }}</div>
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

                                            {{-- <div class="product-btn-wrap">
                                                <button type="button"
                                                    class="btn quick-add-to-cart-btn quick-shop-btn d-flex justify-content-center"
                                                    data-product-id="{{ $promotional->id }}">
                                                    Add to Cart
                                                </button>

                                                <a href="{{ url('view-product/' . $promotional->ProductSlug) }}"
                                                    class="btn quick-buy-now-btn d-flex justify-content-center">
                                                    Buy Now
                                                </a>
                                            </div> --}}
                                        </div>

                                    </div>
                                @empty
                                @endforelse

                            </div>
                        </div>
                    </div>
                    <div class="text-center auto-load" style="display: none;">
                        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100"
                            enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#000"
                                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                    from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                            </path>
                        </svg>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>

        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->

</div>
@endsection
