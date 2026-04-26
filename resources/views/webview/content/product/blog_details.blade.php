@extends('webview.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}-Blogs
    @endsection
    <style>
        .product-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            position: relative;
            margin: 5px;
        }

        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
    </style>
    <div class="container">
        <div class="my-5 row">
            <div class="col-lg-9 col-12">
                <div class="card">
                    <img class="m-4" src="{{ asset($blog->banner) }}" alt="">
                    <div class="mx-3 my-2">{!! $blog->title !!}</div>
                    <div class="mx-3 my-2">{!! $blog->short_description !!}</div>
                    <div class="mx-3 my-2">{!! $blog->description !!}</div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="p-3 shadow-sm card">
                    <h3 class="m-0 mb-2">Resent Blog</h3>

                    @foreach ($blogs as $value)
                        <a href="{{ route('blog.details', $value->id) }}">
                            <div class="mb-4">
                                <img src="{{ asset($value->image) }}" class="mb-2 rounded img-fluid" alt="Tote Bag">
                                <a href="{{ route('blog.details', $value->id) }}"
                                    class="text-decoration-none fw-semibold text-dark">
                                    {{ $value->title }}
                                </a>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection
