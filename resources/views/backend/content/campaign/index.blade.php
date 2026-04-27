@extends('backend.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}- Landingpage List
    @endsection

    <div class="mt-4 container-fluid">
        <div class="shadow card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Campaign List</h5>
                <a href="{{ route('admin.campaigns.create') }}" class="btn btn-primary btn-sm">Add Campaign</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped" id="campaignTable" style="border:1px solid #ddd">
                    <thead class="table-dark" style="border:1px solid #ddd">
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Products</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($campaigns as $key => $campaign)
                            <tr>
                                <td>{{ $key + 1 }}</td>

                                <td>
                                    <img src="{{ asset($campaign->image) }}" width="60" height="60" style="object-fit:cover;">
                                </td>

                                <td style="max-width:250px;">
                                    {{ Str::limit($campaign->title, 60) }}
                                </td>

                                <td>
                                    <small class="text-muted d-block">{{ $campaign->oldprice_title }}</small>
                                    <strong>{{ $campaign->price_title }}</strong>
                                </td>

                                <td>
                                    @php
                                        $products = json_decode($campaign->product_id, true);
                                    @endphp

                                    @if($products)
                                        <span class="badge bg-info">
                                            {{ count($products) }} Products
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if($campaign->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
