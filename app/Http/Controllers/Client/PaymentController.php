<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    // public function vnpay_payment(Request $request)
    // {
    //     $code_cart = rand(00, 9999);
    //     $data = $request->all();
    //     $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    //     $vnp_Returnurl = "http://127.0.0.1:8000/";
    //     $vnp_TmnCode = "MMCD44EP";
    //     $vnp_HashSecret = "RM9OBPDL0ELEWYYD4S4HF7EB8YIIPAX2";

    //     $vnp_TxnRef = $code_cart;
    //     $vnp_OrderInfo = "Thanh toán hóa đơn";
    //     $vnp_OrderType = "billpayment";
    //     $vnp_Amount = $data['total-price'] * 100;
    //     $vnp_Locale = "VN";
    //     // $vnp_BankCode = "NCB";
    //     $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //     $startTime = date("YmdHis");
    //     $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
    //     $inputData = array(
    //         "vnp_Version" => "2.1.0",
    //         "vnp_TmnCode" => $vnp_TmnCode,
    //         "vnp_Amount" => $vnp_Amount,
    //         "vnp_Command" => "pay",
    //         "vnp_CreateDate" => $startTime,
    //         "vnp_CurrCode" => "VND",
    //         "vnp_IpAddr" => $vnp_IpAddr,
    //         "vnp_Locale" => $vnp_Locale,
    //         "vnp_OrderInfo" => $vnp_OrderInfo,
    //         "vnp_OrderType" => $vnp_OrderType,
    //         "vnp_ReturnUrl" => $vnp_Returnurl,
    //         "vnp_TxnRef" => $vnp_TxnRef,
    //         "vnp_ExpireDate" => $expire,
    //     );

    //     if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    //         $inputData['vnp_BankCode'] = $vnp_BankCode;
    //     }
    //     // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    //     //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    //     // }

    //     //var_dump($inputData);
    //     ksort($inputData);
    //     $query = "";
    //     $i = 0;
    //     $hashdata = "";
    //     foreach ($inputData as $key => $value) {
    //         if ($i == 1) {
    //             $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    //         } else {
    //             $hashdata .= urlencode($key) . "=" . urlencode($value);
    //             $i = 1;
    //         }
    //         $query .= urlencode($key) . "=" . urlencode($value) . '&';
    //     }

    //     $vnp_Url = $vnp_Url . "?" . $query;
    //     if (isset($vnp_HashSecret)) {
    //         $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
    //         $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    //     }
    //     $returnData = array(
    //         'code' => '00',
    //         'message' => 'success',
    //         'data' => $vnp_Url
    //     );
    //     if (isset($_POST['redirect'])) {
    //         return redirect()->to($vnp_Url);
    //     } else {
    //         echo json_encode($returnData);
    //     }
    //     return redirect($vnp_Url);
    // }


    public function vnpay_payment(Request $request, string $id)
    {
        $bill = Bill::findOrFail($id);
        $code_cart = $bill->code;

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('order.vnpay_callback');
        $vnp_TmnCode = "MMCD44EP"; //Mã website tại VNPAY 
        $vnp_HashSecret = "RM9OBPDL0ELEWYYD4S4HF7EB8YIIPAX2";

        $vnp_TxnRef = $code_cart;
        $vnp_OrderInfo = "Thanh toán đơn hàng #{$code_cart}";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $bill->total_amount * 100;
        $vnp_Locale = "VN";
        // $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => $startTime,
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
        if (isset($_POST['redirect'])) {
            return redirect()->to($vnp_Url);
        } else {
            echo json_encode($returnData);
        }
        return redirect($vnp_Url);
    }

    public function vnpayCallback(Request $request)
    {
        $vnp_HashSecret = 'RM9OBPDL0ELEWYYD4S4HF7EB8YIIPAX2';

        $inputData = $request->except(['vnp_SecureHashType', 'vnp_SecureHash']);
        ksort($inputData);

        // ✅ KHÔNG dùng urldecode
        $hashData = http_build_query($inputData, '', '&', PHP_QUERY_RFC3986);
        $secureHash = $request->input('vnp_SecureHash');
        $checkSum = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $checkSum) {
            $code = $request->input('vnp_TxnRef');
            $order = Bill::where('code', $code)->first();
            if (!$order) {
                return response('Không tìm thấy đơn hàng', 404);
            }
            if ($order->payment_status === 'Paid') {
                return view('payment.success', compact('order'));
            }

            $isSuccess = $request->input('vnp_ResponseCode') === '00' &&
                $request->input('vnp_TransactionStatus') === '00';

            if ($isSuccess) {
                $order->update([
                    'status' => 2,
                    'payment_status' => 'Paid',
                    'payment_method' => 'online',
                    'transaction_id' => $request->input('vnp_TransactionNo'),
                    'transaction_time' => Carbon::createFromFormat('YmdHis', $request->input('vnp_PayDate')),
                ]);
                return view('client.page.bill.success', compact('order'));
            } else {
                $order->update([
                    'payment_status' => 'Payment Failed',
                    'payment_method' => 'online',
                    'transaction_id' => $request->input('vnp_TransactionNo'),
                ]);
                return view('client.page.bill.fail', compact('order'));
            }
        } else {
            return response('Chữ ký không hợp lệ', 400);
        }
    }
}
/*
http://127.0.0.1:8000/
?vnp_Amount=661000000
&vnp_BankCode=NCB
&vnp_BankTranNo=VNP14982758
&vnp_CardType=ATM
&vnp_OrderInfo=Thanh+to%C3%A1n+h%C3%B3a+%C4%91%C6%A1n
&vnp_PayDate=20250527163420
&vnp_ResponseCode=00
&vnp_TmnCode=MMCD44EP
&vnp_TransactionNo=14982758
&vnp_TransactionStatus=00
&vnp_TxnRef=6881
&vnp_SecureHash=b5851e961ceab80131d98fdeb7a067b05228899952627aaefdccf8283dbe23cdacd47d011ef0c30d0cb765853b3b34265d6b0bfd642e14104955ed3057781744
*/