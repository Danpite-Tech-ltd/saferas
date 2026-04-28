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
    {{-- ====================product details section start ================ --}}
    <section class="product-details">
        <div class="container">
            <h2 class="landing-productdetails-title">আমাদের পণ্যের ডিটেইলস</h2>
            <span class="details-line"></span>
            <div class="mt-4">
                <div class="landing-product-description">
                    {!! $campaign->description !!}
                </div>
            </div>
        </div>
    </section>
    <div class="mt-4 text-center">
        <a href="#" class="landing-order-btn2">🛒 অর্ডার করতে চাই</a>
    </div>

    <div class="container mt-5">
        <div class="landing-emergency-contact">
            <h2>জরুরি প্রয়োজনে কল অথবা হোয়াটসঅ্যাপ করুন</h2>
            <div class="landing-emergency-info">
                <div class="mt-2 contact-row row g-3">

                    <!-- Phone -->
                    <div class="col-12 col-md-6">
                        <a href="tel:{{ $basicinfo->phone_one }}" class="contact-box phone-box">
                            <span class="icon">
                                <svg viewBox="0 0 24 24" width="20" height="20">
                                    <path
                                        d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2c.3-.3.8-.4 1.2-.3 1.3.4 2.7.6 4.1.6.7 0 1.2.5 1.2 1.2V21c0 .7-.5 1.2-1.2 1.2C11.3 22.2 1.8 12.7 1.8 1.2 1.8.5 2.3 0 3 0h3.5c.7 0 1.2.5 1.2 1.2 0 1.4.2 2.8.6 4.1.1.4 0 .9-.3 1.2l-2.2 2.3z"
                                        fill="#fff" />
                                </svg>
                            </span>
                            <span class="text">{{ $basicinfo->phone_one }}</span>
                        </a>
                    </div>

                    <!-- WhatsApp -->
                    <div class="col-12 col-md-6">
                        <a href="https://wa.me/{{ $basicinfo->wp_1 }}" target="_blank" class="contact-box whatsapp-box">
                            <span class="icon">
                                <svg viewBox="0 0 32 32" width="20" height="20">
                                    <path fill="#fff"
                                        d="M16 .4C7.4.4.4 7.4.4 16c0 2.8.7 5.5 2.1 7.9L.2 31.8l8.1-2.1c2.3 1.3 4.9 2 7.7 2 8.6 0 15.6-7 15.6-15.6S24.6.4 16 .4zm0 28.5c-2.4 0-4.7-.6-6.7-1.8l-.5-.3-4.8 1.3 1.3-4.7-.3-.5C3.8 20.7 3.2 18.4 3.2 16 3.2 9.4 8.6 4 15.2 4S27.2 9.4 27.2 16 22.6 28.9 16 28.9zm6.3-9.3c-.3-.2-1.8-.9-2.1-1-.3-.1-.5-.2-.7.2-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-1.7-.8-2.8-1.5-3.9-3.3-.3-.5.3-.5.8-1.6.1-.2.1-.4 0-.6-.1-.2-.7-1.6-1-2.2-.3-.6-.6-.5-.8-.5h-.7c-.2 0-.6.1-.9.4-.3.3-1.2 1.2-1.2 2.9s1.2 3.4 1.4 3.6c.2.2 2.4 3.7 5.9 5.2.8.3 1.4.5 1.9.6.8.3 1.6.2 2.2.1.7-.1 1.8-.7 2.1-1.3.3-.6.3-1.2.2-1.3-.1-.2-.3-.3-.6-.5z" />
                                </svg>
                            </span>
                            <span class="text">Whatsapp</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- ====================product details section end ================== --}}

</body>

</html>
