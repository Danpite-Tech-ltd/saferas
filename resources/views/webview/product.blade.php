<div class="container">
    <div class="row g-3">
        @forelse ($categoryproducts as $promotional)
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
