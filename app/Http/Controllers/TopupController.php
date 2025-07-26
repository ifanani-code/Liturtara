<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TokenTransactions;
use Midtrans\Snap;
use Midtrans\Config;

class TopupController extends Controller
{
    public function __construct()
    {
        // Midtrans setup
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function showForm()
    {
        $user = Auth::user();

        // Talent hanya boleh topup 1x saat registrasi
        if ($user->role === 'talent') {
            // $hasTopup = TokenTransactions::where('user_id', $user->id)->exists();
            $token = Token::where('user_id', $user->id)->value('amount');
            if ($token >= 5) {
                return redirect()->back()->with('error', 'Talent hanya bisa top up sekali saat registrasi.');
            }
        }

        return view('token.topup-form');
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $role = $user->role;
        $profile = Profile::where('user_id', $user->id)->first();
        $request->validate([
            'token_amount' => 'required|integer|in:5,10,20,50',
        ]);

        $price = $request->token_amount * 2500;
        $tax = $price * 0.11;
        $finalPrice = $price + $tax;

        $transaction = TokenTransactions::create([
            'user_id' => $user->id,
            'token_amount' => $request->token_amount,
            'total_price' => $finalPrice,
            'status' => 'pending'
        ]);

        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => $transaction->total_price,
            ],
            'customer_details' => [
                'name' => $profile->full_name ?? 'pembeli 1',
                'email' => $user->email,
                'phone' => $profile->phone_number ?? '08123456789',
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        // @dd($snapToken);
        return view('token.payment', compact('snapToken', 'transaction', 'role', 'profile', 'price'));
    }

    public function success()
    {
        return view('token.success');
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("SHA512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status === 'capture' || $request->transaction_status === 'settlement') {
                $transaction = TokenTransactions::find($request->order_id);

                if ($transaction && $transaction->status !== 'paid') {
                    // Update status & payment_type
                    $transaction->update([
                        'status' => 'paid',
                        'payment_type' => $request->payment_type // <--- tambahkan ini
                    ]);

                    // Ambil atau buat token user
                    $token = Token::firstOrCreate(
                        ['user_id' => $transaction->user_id],
                        ['amount' => 0]
                    );

                    $token->increment('amount', $transaction->token_amount);
                    $token->touch();
                }
            }
        }

        return response()->json(['message' => 'Callback processed']);
    }



}
