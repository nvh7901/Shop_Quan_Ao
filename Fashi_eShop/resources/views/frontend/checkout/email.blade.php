<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <title>Order Notification | CodeLean eCommerce</title>
</head>

<body
    style="background-color: #e7eff8; font-family: trebuchet,sans-serif; margin-top: 0; box-sizing: border-box; line-height: 1.5;">
    <div class="container-fluid">
        <div class="container" style="background-color: #e7eff8; width: 600px; margin: auto;">
            <div class="col-12 mx-auto" style="width: 580px;  margin: 0 auto;">
                {{-- Cảm ơn --}}
                <div class="row" style="background-color: #00509d; height: 200px; padding: 35px; color: white;">
                    <div class="container-fluid">
                        <h3 class="m-0 p-0 mt-4" style="margin-top: 0; font-size: 28px; font-weight: 500;">
                            <strong style="font-size: 32px;">Order Notification</strong>
                            <br>
                            Thank you very much
                        </h3>
                        <div class="row mt-5" style="margin-top: 35px; display: flex;">
                            <div class="col-6"
                                style="margin-bottom: 25px; flex: 0 0 50%; width: 50%; box-sizing: border-box;">
                                <b>{{ $order->name}}</b>
                                <br>
                                <span>
                                    <a style="color: white !important;" href="mailto:{{ $order->email }}"
                                        target="_blank">{{ $order->email }}</a>
                                </span>
                                <br>
                                <span>{{ $order->phone }}</span>
                            </div>
                            <div class="col-6" style="flex: 0 0 50%; width: 50%; box-sizing: border-box;">
                                <b>Order date:</b> {{ date('d/m/yy H:i', strtotime($order->created_at)) }}
                                <br>
                                <b>Address:</b> {{ $order->street_address . ' - ' . $order->town_city }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 p-4" style="background-color: white; margin-top: 15px; padding: 20px;">
                    <table>
                        <tr>
                            <td>
                                <img src="https://ci6.googleusercontent.com/proxy/8eUxMUXMkvgUKX8veBCRQM5N7-jXP0Wx8KjQLaGDch2DnV_5HYw9PMgJXsoqgSR_jonTY9jAftWPKNsN5W9cUUneQ9hz7IhxH4rIXNzHMm0ijbsNjHB9m7g6XfJJ=s0-d-e1-ft#https://www.bambooairways.com/reservation/common/hosted-images/tickets.jpg"
                                    alt="">
                            </td>

                            @if ($order->payment_type == 'pay_later')
                            <td class="pl-3" style=" padding-left:15px;">
                                <span class="d-inline"
                                    style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                    You will pay on delivery. We have just handed over your order to a shipping
                                    partner.
                                </span>
                            </td>
                            @endif

                            @if ($order->payment_type == 'online_payment')
                            <td class="pl-3" style=" padding-left:15px;">
                                <span class="d-inline"
                                    style="color:#424853; font-family:trebuchet,sans-serif; font-size:16px; font-weight:normal; line-height:22px;">
                                    Your order has been paid online. We have just handed over your order to a
                                    shipping partner.
                                </span>
                            </td>
                            <td class="pl-3" style=" padding-left:10px;">
                                <img src="https://vnpay.vn/wp-content/uploads/2020/07/Logo-VNPAYQR-update.png"
                                    width="130px" style="margin-top: 10px;" alt="">
                            </td>
                            @endif

                        </tr>
                    </table>
                </div>
                {{-- Order --}}
                <div class="row mt-2" style="margin-top: 15px;">
                    <div class="container-fluid">
                        <div class="row pl-3 py-2" style="background-color: #f4f8fd; padding: 10px 0 10px 20px;">
                            <b>Order details</b>
                        </div>
                        <div class="row pl-3 py-2" style="background-color: #fff; padding: 10px 20px 10px 20px;">
                            <table class="table table-sm table-hover"
                                style="text-align: left;  width: 100%; margin-bottom: 5px; border-collapse: collapse;">
                                <thead>
                                    <tr>
                                        <th style="padding: 5px 0;">PRODUCT</th>
                                        <th style="padding: 5px 20px 5px 0; text-align: right;">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderDetails as $orderDetail)
                                    <tr>
                                        <td style="border-top: 1px solid #dee2e6; padding: 5px 0;">
                                            {{ $orderDetail->product->name . ' (x' . $orderDetail->qty . ')' }}
                                        </td>
                                        <td
                                            style="border-top: 1px solid #dee2e6; padding: 5px 20px 5px 0; text-align: right;">
                                            {{ $orderDetail->total }} $
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</body>

</html>