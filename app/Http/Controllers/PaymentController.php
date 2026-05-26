<?php

namespace App\Http\Controllers;

use App\Services\PaymobService;
use Illuminate\Http\Request;
use App\Models\Plan;

class PaymentController extends Controller
{
    protected PaymobService $paymobService;

    public function __construct(PaymobService $paymobService)
    {
        $this->paymobService = $paymobService;
    }

    public function initiatePayment(Request $request)
    {
ت
              
        $plan = Plan::findOrFail($request->plan_id);
        $orderData = [
            'amount' => $plan->price * 100,
            'currency' => 'SAR',
            'items' => [
                [
                    'name' => $plan->name,
                    'amount' => (int) $plan->price * 100,
                    'description' => null,
                    'quantity' => 1,
                ]
            ],
            'billing_data' => [
                'first_name' => $request->user()->name,
                'last_name' => $request->user()->last_name,
                'email' => $request->user()->email,
                'phone_number' => $request->user()->phone,
            ],
            'special_reference' => 'order_' . uniqid(),
        ];

        $intention = $this->paymobService->createPaymentIntention($orderData);

        
	if (!$intention || empty($intention['client_secret'])) {
    		return redirect()->back()->withErrors('حدث خطأ أثناء إنشاء عملية الدفع');
	}

        session(['paymob_intention_id' => $intention['id']]);

        return view('checkout', [
            'clientSecret' => $intention['client_secret']
        ]);
    }

public function callback(Request $request)
{
    session([
        'payment' => $request->all()
    ]);
  $success = filter_var($request->get('success'), FILTER_VALIDATE_BOOLEAN);

    if ($success) {
        return redirect()->route('payment.success');
    }

    return redirect()->route('payment.failed');
}
}
