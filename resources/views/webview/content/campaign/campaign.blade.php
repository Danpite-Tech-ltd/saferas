<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Kids Landing Page</title>
    <link rel="stylesheet" href="{{ asset('public/webview/assets/css/landing.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

</head>

<body>

    {{-- ========================== hero section start ====================== --}}
    <section class="hero-section">
        <div class="container">
            <h2 class="landing-main-title">
                {{ $campaign->title }}
            </h2>

            <p class="landing-sub-title">২ বছর থেকে ৯ বছরের বাচ্চাদের জন্য (ছেলে এবং মেয়ে উভয়ই)</p>

            <a href="#" class="landing-order-btn">🛒 অর্ডার করতে চাই</a>

            <div class="mt-4 row">
                <div class="mb-3 col-md-12">
                    <img src="{{ asset($campaign->image) }}" class="rounded img-fluid campaign-banner-img">
                </div>
            </div>

            <div class="price-section">
                <p class="campaign-old-price">পূর্বের মূল্য – {{ $campaign->oldprice_title }}</p>
                <p class="campaign-new-price">আজকের অফার মূল্য —
                    <span class="text-dark">{{ $campaign->price_title }}</span>
                </p>
            </div>
        </div>
    </section>
    {{-- ========================== hero section end ====================== --}}
    {{-- ===================== product section start ====================== --}}
    <section class="py-4 landing-product-section">
        <div class="container">
            <div class="row g-3">
                @foreach ($products as $value)
                    <div class="col-6 col-lg-4">
                        <div class="landing-product-card position-relative">
                            <span class="landing-product-badge">Code - {{ $value->ProductSku }}</span>
                            <img src="{{ asset($value->ProductImage) }}" class="rounded img-fluid" alt="">

                            <div class="landing-productorder-btn">
                                <a class="btn w-100">
                                    🛒 অর্ডার করতে চাই
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4 text-center">
                <a href="#" class="landing-order-btn2">🛒 অর্ডার করতে চাই</a>
            </div>
        </div>
    </section>
    {{-- ======================= product section end ====================== --}}

</body>

</html>
