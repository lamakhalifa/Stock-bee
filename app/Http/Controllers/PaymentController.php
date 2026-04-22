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
        \Log::info('here');
    }

    public function initiatePayment(Request $request)
    {
        // هنا يمكنك جلب بيانات الطلب الحقيقية من قاعدة البيانات
        // مثلاً: $order = Order::find($request->order_id);

        \Log::info('Controller: before calling service');

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
                'first_name' => $request->user()->first_name ?? 'Ala',
                'last_name' => $request->user()->last_name ?? 'Zain',
                'email' => $request->user()->email ?? 'ali@gmail.com',
                'phone_number' => $request->user()->phone ?? '+92345xxxxxxxx',
            ],
            'special_reference' => 'order_' . uniqid(),
        ];

        $intention = $this->paymobService->createPaymentIntention($orderData);

        if (!$intention || empty($intention['client_secret'])) {
            return redirect()->back()->withErrors('فشل في تحضير الدفع، يرجى المحاولة لاحقاً');
        }

        // تخزين معرف الدفع أو client_secret في الجلسة أو قاعدة البيانات لاستخدامه لاحقًا في الـ webhook
        session(['paymob_intention_id' => $intention['id']]);

        // توجيه العميل إلى Paymob
        return view('checkout', [
            'clientSecret' => $intention['client_secret']
        ]);
    }
}
