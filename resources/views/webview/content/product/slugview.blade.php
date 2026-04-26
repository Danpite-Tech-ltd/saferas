<div class="row pt-2 pb-2" id="cateoryPro" style="background: white;">

    @forelse ($slugproducts as $categoryproduct)
        @php
            $firstcatepro=App\Models\Product::where('id',json_decode($categoryproduct->RelatedProductIds)[0]->productID)->first();
        @endphp
        @if(isset($firstcatepro))
            <div class="col-6 col-md-4 col-lg-2 mb-2">
               <div class="product-micro-row">
                     <div class="product_item_inner">
                        <div class="product-image">
                            <a href="{{ url('view-product/' . $categoryproduct->ProductSlug) }}">
                                <img src="{{ asset($categoryproduct->ProductImage) }}">
                            </a>
                        </div>
                        <!-- /.product-image -->
                        <div class="product-text" style="padding-bottom: 4px !important;background: white;">
                            <div class="pro_name">
                             <a href="{{ url('view-product/' . $categoryproduct->ProductSlug) }}" id="f_pro_name">{{ \Illuminate\Support\Str::limit($categoryproduct->ProductName, 35) }}</a>
                             
                            <div class="d-flex my-2" style="justify-content:center">
                                <div class="star" style="padding-top: 5px;">
                                    <span style="font-weight: bold;color:black;font-size:10px">({{ App\Models\Review::where('product_id', $categoryproduct->id)->get()->count() }})</span>
                                        <span class="fas fa-star" id="checked"></span>
                                        <span class="fas fa-star" id="checked"></span>
                                        <span class="fas fa-star" id="checked"></span>
                                        <span class="fas fa-star" id="checked"></span>
                                        <span class="fas fa-star" id="checked"></span>
                                     
                                </div>
                            </div>
                            <div class="price-box">
                                <del class="old-product-price strong-400" style="color:red">৳
                                    {{ round($firstcatepro->sizes[0]->RegularPrice) }}</del>
                                <span
                                    class="product-price strong-600" style="color:black">৳ {{ round($firstcatepro->sizes[0]->SalePrice) }}</span>
                            </div>
                            
                          </div>
                        </div>
                        <div class="pro_btn">
                           <a href="{{ url('view-product/' . $categoryproduct->ProductSlug) }}">
                             <button >অর্ডার করুন</button>
                            </a>
                        </div>
                 </div>
                </div>
            </div>
        @endif
    @empty
        <h2 class="p-4 text-center"><b>No Products found...</b></h2>
    @endforelse
</div>
