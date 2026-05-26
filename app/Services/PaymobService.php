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
    }

    /**
     * 
     *
     * @param array 
     * @return array|null 
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

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Token ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ])->post('https://ksa.paymob.com/v1/intention/', $payload);

            if ($response->successful()) {
                $data = $response->json();
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


    public function redirectToCheckout(string $clientSecret): RedirectResponse
    {
        $url = "https://accept.paymob.com/unifiedcheckout/?publicKey={$this->publicKey}&clientSecret={$clientSecret}";
        return redirect()->away($url);
    }

}
