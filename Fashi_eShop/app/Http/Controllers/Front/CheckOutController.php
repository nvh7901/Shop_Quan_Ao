<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use App\Utilities\VNPay;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    // Hàm khởi tạo
    public function __construct(
        OrderServiceInterface $orderService,
        OrderDetailServiceInterface $orderDetailService
    ) {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    // Trang checkout
    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('frontend.checkout.index')
            ->with(compact('carts'))
            ->with(compact('total'))
            ->with(compact('subtotal'));
    }

    // Chi tiết hóa đơn
    public function addOrder(Request $request)
    {
        // Tạo mới đơn hàng
        $params = [
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'town_city' => $request->town_city,
            'street_address' => $request->street_address,
            'phone' => $request->phone,
            'payment_type' => $request->payment_type,
        ];
        // dd($params);
        $params['status'] = Constant::order_status_ReceiveOrders;

        $order = $this->orderService->create($params);
        // Tạo chi tiết đơn hàng
        $carts = Cart::content();
        DB::beginTransaction();
        try {
            foreach ($carts as $cart) {
                $params = [
                    'order_id' => $order->id,
                    'product_id' => $cart->id,
                    'qty' => $cart->qty,
                    'amount' => $cart->price,
                    'total' => $cart->qty * $cart->price,
                ];
                $this->orderDetailService->create($params);

                DB::table('product_details')
                    ->where('product_id', $cart->id)
                    // ->where('size', $cart->options['size'])
                    ->decrement('qty', $cart->qty);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        // Kiểm tra hình thức chọn thanh toán
        if ($request->payment_type == 'pay_later') {
            // Gửi mail
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendMail($order, $total, $subtotal);
            // Xóa giỏ hàng
            Cart::destroy();

            // Thông báo
            return redirect('/checkout/result')
                ->with('notification', 'Bạn đã đặt hàng thành công. Vui lòng kiểm tra email của bạn !');
        }
        // Thanh toán online
        if ($request->payment_type == 'online_payment') {
            // Lấy URL thanh toán
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef' => $order->id,
                'vnp_OrderInfo' => 'Mô tả đơn hàng',
                'vnp_Amount' => Cart::total(0, '', '') * 23675,
            ]);
            
            return redirect()->to($data_url);
        }
    }

    // Kết quả khi thanh toán
    public function result()
    {
        $notification = session('notification');

        return view('frontend.checkout.result')
            ->with(compact('notification'));
    }

    // Thanh toán vnpay
    public function vnPayCheck(Request $request)
    {
        // Lấy data từ URL (gửi về qua vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');

        // Kiểm tra xem giao dịch có hợp lệ không
        if ($vnp_ResponseCode != null) {
            if ($vnp_ResponseCode == 00) {
                // Cập nhật trạng thái order
                $this->orderService->update(['status' => Constant::order_status_Paid], $vnp_TxnRef);
                // Gửi mail
                $order = $this->orderService->find($vnp_TxnRef);
                $total = Cart::total();
                $subtotal = Cart::subtotal();
                $this->sendMail($order, $total, $subtotal);
                // Xóa giỏ hàng
                Cart::destroy();

                // Thông báo
                return redirect('/checkout/result')
                    ->with('notification', 'Bạn đã đặt hàng thành công. Vui lòng kiểm tra email của bạn !');
            } else {
                // Xóa đơn hàng đã thêm vào db
                $this->orderService->delete($vnp_TxnRef);
                // Thông báo
                return redirect('/checkout/result')
                    ->with('notification', 'Bạn đã đặt hàng không thành công. Có lỗi khi thanh toán online');
            }
        }
    }

    // Gửi Mail
    public function sendMail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send('frontend.checkout.email', compact('order', 'total', 'subtotal'), function ($message) use ($email_to) {
            $message->from('ngo.huy.van.2001@gmail.com', 'Ngo Van Huy');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }
}
