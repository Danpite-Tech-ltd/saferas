@extends('webview.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}-Shop page
    @endsection
    <style>
        #checked {
            color: orange;
        }
        .star{
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
                                        > category > <span class="active">Shop Page</span>
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
                 @forelse ($categoryproducts as $categoryproduct)
                @php
                    $firstcatepro=App\Models\Product::with([
                        'sizes' => function ($query) {
                            $query->select('id','product_id','Discount','RegularPrice','SalePrice')->take(1);
                        }
                        ])->where('id',json_decode($categoryproduct->RelatedProductIds)[0]->productID)->select('id','ProductName')->first();
         
                    $review = App\Models\Review::where('product_id', $firstcatepro->id)->avg( 'rating');
                @endphp
                @if(isset($firstcatepro))
                    <div class="mb-2 px-1 col-6 col-md-4 col-lg-2">
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
                                 <a href="{{ url('view-product/' . $categoryproduct->ProductSlug) }}" id="f_pro_name">{{ $categoryproduct->ProductName }}</a>
                                 
                                <div class="d-flex my-2" style="justify-content:center">
                                    <div class="star" style="padding-top: 5px;" display="none!important;">
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
                              <form name="form" action="{{url('add-to-cart')}}" method="POST" enctype="multipart/form-data" style="width: 100%;float: left;text-align: center;">
                                    @method('POST')
                                    @csrf
                                    <input type="text" name="color" id="product_colorold" hidden>
                                    <input type="text" name="size" id="product_sizeold" hidden>
                                    <input type="text" name="product_id" value="{{ $firstcatepro->id }}" hidden>
                                    <input type="text" name="qty" value="1" id="qtyor" hidden>
                                    Salman
                                    <button class="btn  btn-sm mb-0 btn-block"  id="purcheseBtn">অর্ডার করুন</button>
                                </form>
                            </div>
                      </div>
                  </div>
               </div>
                @endif
            @empty
            @endforelse

    
            </div>
            </div>
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->

    </div>




    <style>
        @media only screen and (max-width: 768px) {
            #cateoryProSidebar {
                padding-right: 0;
            }

            #cateoryPro {
                padding-left: 0;
            }
        }

        #cateoryProSidebar {
            padding-left: 0;
        }

        #cateoryPro {
            padding-right: 0px;
        }

        .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle.collapsed:after {
            color: #636363;
            content: "\f067";
            font-family: fontawesome;
            font-weight: normal;
        }

        .sidebar .sidebar-module-container .sidebar-widget .sidebar-widget-body .accordion .accordion-group .accordion-heading .accordion-toggle:after {
            content: "\f068";
            float: right;
            font-family: fontawesome;
        }

        .widget-title {
            font-size: 16px;
            text-align: center;
            border-bottom: 1px solid #e9e9e9;
            padding-bottom: 10px;
            margin: 0;
        }

        .list {
            list-style: none;
        }

        #liaside {
            color: #858585;
            font-weight: bold;
        }

        .breadcrumb {
            padding: 5px 0;
            border-bottom: 1px solid #e9e9e9;
            background-color: #fafafa;
        }
    </style>

@endsection
