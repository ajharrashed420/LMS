<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class StripePaymentController extends Controller
{
    public function stripePayment(Request $request) 
    {
        if ($request->amount > 0) {
            
            $stripe = new StripeClient(env('STRIPE_SECRET'));
            $response = $stripe->checkout->sessions->create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $request->amount * 100,
                        'product_data' => [
                            'name' => '#Invoice ID-' . $request->invoice_id . ' || Customer: ' . $request->name,
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel'),
                'metadata' => [
                    'invoice_id' => $request->invoice_id,
                ],
            ]);

            if (isset($response->id) && $response->id != '') {
                session()->put('product_name', $request->name);
                session()->put('quantity', 1);
                session()->put('price', $request->amount);
                session()->put('invoice_id', $request->invoice_id); // Store invoice_id in the session
                
                return redirect($response->url);
            } else {
                return redirect()->route('cancel');
            }
        }else {
            flash()->addWarning('Payble amount must be getter then 0');
            return redirect()->back(); 
        }
    }

public function success(Request $request) 
    {
       $stripe = new StripeClient(env('STRIPE_SECRET'));
        $sessionId = $request->get('session_id');

    try {
        // Retrieve the session from Stripe
        $session = $stripe->checkout->sessions->retrieve($sessionId);

        $paymentIntentId = $session->payment_intent;
  
        $paymentIntent = $stripe->paymentIntents->retrieve($paymentIntentId);

        $chargeId = $paymentIntent->latest_charge;

        // Access the amount and invoice_id from the session metadata
        $amount = $session->amount_total / 100; // Stripe stores amounts in cents.
        $invoiceId = $session->metadata->invoice_id;

        Payment::create([
            'amount' => $amount,
            'invoice_id' => $invoiceId,
            'stripe_payment_intent_id' => $paymentIntentId,
            'stripe_charge_id' => $chargeId,
        ]);

        flash()->addSuccess('Payment completed successfully!');
        return redirect()->route('invoice-edit', $invoiceId);

        } catch (\Exception $e) {
            // Log the exception
            Log::error('Payment verification failed: ' . $e->getMessage(), ['exception' => $e]);
            flash()->addError('Payment verification failed: ' . $e->getMessage());
            return redirect()->route('cancel');
        }
    }


    public function cancel() 
    {
        flash()->addWarning('Payment not completed!');
        return redirect()->back();
    }

}

