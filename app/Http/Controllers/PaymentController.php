<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Omise\OmiseCharge;
use Omise\OmiseToken;
use Omise\Omise;
class PaymentController extends Controller
{
    public function showPaymentPage()
    {
        return view('payment.index');
    }

 
    public function processPayment(Request $request)
    {
        define('OMISE_PUBLIC_KEY', env('OMISE_PUBLIC_KEY'));
        define('OMISE_SECRET_KEY', env('OMISE_SECRET_KEY'));
    
        try {
            $amountInCents = $request->amount * 100; // แปลงเป็นสตางค์
    
            $charge = \OmiseCharge::create([
                'amount'   => $amountInCents,
                'currency' => 'THB',
                'card'     => $request->omiseToken
            ]);
    
            if ($charge['status'] === 'successful') {
                // ✅ เรียกใช้ PlaceOrder() เพื่อบันทึกคำสั่งซื้อ (แต่ไม่บันทึกใน payments)
                app(ClientController::class)->PlaceOrder();
    
                return redirect()->route('pendingorder')->with('message', 'Order placed successfully!');
            } else {
                return redirect()->route('payment.failed');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
    
    
    

    

    
    public function paymentSuccess()
    {
        return view('');
    }

    public function paymentFailed()
    {
        return view('');
    }
}
