<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PaymobService
{
    protected string $secretKey;
    protected string $publicKey;

    public function __construct()
    {
        $this->secretKey = config('services.paymob.secret_key');
        $this->publicKey = config('services.paymob.public_key');
        \Log::info('Paymob secret key: ' . ($this->secretKey ? 'found' : 'MISSING'));
    }

    /**
     * إنشاء نية دفع لدى Paymob
     *
     * @param array $orderData بيانات الطلب (المبلغ، المنتجات، بيانات العميل)
     * @return array|null بيانات الاستجابة من Paymob أو null في حال الفشل
     */
    public function createPaymentIntention(array $orderData): ?array
    {
        if (empty($this->secretKey)) {
            Log::error('Paymob secret key is missing');
            return null;
        }
        $integrationId = (int) config('services.paymob.integration_id');

        $payload = [
            'amount' => (int) $orderData['amount'],
            'currency' => $orderData['currency'],
            'payment_methods' =>  [$integrationId],
            'items' => $orderData['items'],
            'billing_data' => $orderData['billing_data'],
            'extras' => new \stdClass(),
            'special_reference' => $orderData['special_reference'] ?? uniqid('order_'),
            'expiration' => $orderData['expiration'] ?? 3600,
            'notification_url' => $orderData['notification_url'] ?? route('webhook.paymob'),
            'redirection_url' => $orderData['redirection_url'] ?? route('payment.callback'),
        ];
        Log::error($payload);

        // https://ksa.paymob.com/v1/intention/
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ])->post('https://ksa.paymob.com/v1/intention/', $payload);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Payment intention created', ['intention_id' => $data['id'] ?? null]);
                return $data;
            } else {
                Log::error('Paymob intention creation failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Paymob API exception: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * توجيه المستخدم إلى صفحة الدفع الموحدة من Paymob
     */
    public function redirectToCheckout(string $clientSecret): RedirectResponse
    {
        $url = "https://accept.paymob.com/unifiedcheckout/?publicKey={$this->publicKey}&clientSecret={$clientSecret}";
        return redirect()->away($url);
    }

    /**
     * بيانات فواتير افتراضية (يمكن استبدالها ببيانات حقيقية من المستخدم)
     */
    protected function getDefaultBillingData(): array
    {
        return [
            'apartment' => 'NA',
            'first_name' => 'Guest',
            'last_name' => 'User',
            'street' => 'NA',
            'building' => 'NA',
            'phone_number' => '0000000000',
            'city' => 'Cairo',
            'country' => 'EG',
            'email' => 'guest@example.com',
            'floor' => 'NA',
            'state' => 'NA',
        ];
    }
}
