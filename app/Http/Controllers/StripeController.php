<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {

    }
    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $paymentMethodId = $request->paymentMethodId;

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => 500,
                'currency' => 'gbp',
                'payment_method' => $paymentMethodId,
                'confirmation_method' => 'manual',
                'confirm' => true,
                'return_url' => 'http://localhost:5173/',
            ]);

            return response()->json([
                'success_url' => 'http://localhost:5173/',
            ]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function success(){

    }
}
