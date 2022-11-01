@extends('backend.layouts.master')
@section('title', 'Chi Tiết Order')
@section('content')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body display_data">

                        <div class="table-responsive">
                            <h2 class="text-center">Products list</h2>
                            <hr>
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderDetails as $order)
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img style="height: 60px;" data-toggle="tooltip"
                                                                    title="Image" data-placement="bottom"
                                                                    src="frontend/img/products/{{ $order->product->productImages[0]->path }}">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{ $order->product->name }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                {{ $order->qty }}
                                            </td>
                                            <td class="text-center">${{ $order->amount }}</td>
                                            <td class="text-center">
                                                ${{ $order->total }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>



                        <h2 class="text-center mt-5">Order info</h2>
                        <hr>
                        <div class="position-relative row form-group">
                            <label for="name" class="col-md-3 text-md-right col-form-label" style="padding-top: 0px;">
                                Full Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->first_name  }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="email" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Email</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->email }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="phone" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Phone</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->phone }}</p>
                            </div>
                        </div>

                        {{-- <div class="position-relative row form-group">
                            <label for="company_name" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">
                                Company Name
                            </label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->company_name }}</p>
                            </div>
                        </div> --}}

                        <div class="position-relative row form-group">
                            <label for="street_address" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">
                                Street Address</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->street_address }}</p>
                            </div>
                        </div>

                        {{-- <div class="position-relative row form-group">
                            <label for="town_city" class="col-md-3 text-md-right col-form-label " style="padding-top: 0px;">
                                Town City</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->town_city }}</p>
                            </div>
                        </div> --}}

                        {{-- <div class="position-relative row form-group">
                            <label for="country" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Country</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->country }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="postcode_zip" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">
                                Postcode Zip</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->postcode_zip }}</p>
                            </div>
                        </div> --}}

                        <div class="position-relative row form-group">
                            <label for="payment_type" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Payment Type</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->payment_type }}</p>
                            </div>
                        </div>

                        <div class="position-relative row form-group">
                            <label for="status" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Status</label>
                            <div class="col-md-9 col-xl-8">
                                <div class="badge badge-dark mt-2">
                                    {{ \App\Utilities\Constant::$order_status[$orders->status] }}
                                </div>
                            </div>
                        </div>

                        {{-- <div class="position-relative row form-group">
                            <label for="description" class="col-md-3 text-md-right col-form-label "
                                style="padding-top: 0px;">Description</label>
                            <div class="col-md-9 col-xl-8">
                                <p>{{ $orders->description }}</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->
@endsection
