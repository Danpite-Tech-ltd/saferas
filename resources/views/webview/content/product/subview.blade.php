<style>
    #featureimageCt {
        height: 180px;
        width: auto;
        padding: 2px;
        padding-top: 0;
    }

    @media only screen and (max-width: 600px) {
        #featureimageCt {
            height: 180px;
            width: auto;
            padding: 2px;
            padding-top: 0;
        }
    }
</style>
<div class="pt-2 pb-2 row" id="cateoryPro" style="background: white;">
    <div class="container">
        <div class="row g-4">
            @forelse ($subcategoryproducts as $promotional)
                @php
                   $firstpro = App\Models\Product::where('id', $promotional->id)->with(['sizes' => function ($query) {
                        $query->select('id','product_id','Discount','RegularPrice','SalePrice')
                              ->orderBy('id','asc')
                              ->limit(1);
                    }])
                    ->select('id','ProductName')
                    ->first();

                    
                @endphp
                
                <div class="col-6 col-md-3">
                    <div class="card product-card">
                    <div class="sale-discount-badge">
                        @if($firstpro && isset($firstpro->sizes[0]))
                            {{ round((($firstpro->sizes[0]->RegularPrice - $firstpro->sizes[0]->SalePrice) / $firstpro->sizes[0]->RegularPrice) * 100) }}% ছাড়
                        @else
                            00
                        @endif
                    </div>
                    <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                        <img src="{{ asset($promotional->ProductImage) }}" alt="Product">
                    </a>

                    <a href="{{ url('view-product/' . $promotional->ProductSlug) }}">
                        <div class="product-info d-flex justify-content-between align-items-center">
                            <div>
                                <div class="product-name">{{ $promotional->ProductName }}</div>
                                <div class="product-price">
                                    @if($firstpro && isset($firstpro->sizes[0]))
                                        ৳ {{ round($firstpro->sizes[0]->SalePrice) }}
                                    @else
                                        Price Not Found
                                    @endif
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
    </div>

</div>
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
