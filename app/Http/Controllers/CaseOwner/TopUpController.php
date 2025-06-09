<?php

namespace App\Http\Controllers\CaseOwner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TokenTransactions;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;


class TopUpController extends Controller
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
            $hasTopup = TokenTransactions::where('user_id', $user->id)->exists();
            if ($hasTopup) {
                return redirect()->back()->with('error', 'Talent hanya bisa top up sekali saat registrasi.');
            }
        }

        return view('caseowner.token.topup-form');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'token_amount' => 'required|integer|in:5,10,20,50',
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        $price = $request->token_amount * 2500;

        $transaction = TokenTransactions::create([
            'user_id' => Auth::id(),
            'token_amount' => $request->token_amount,
            'total_price' => $price,
            'status' => 'pending'
        ]);

        $midtransPayload = [
            'transaction_details' => [
                'order_id' => 'TXN-' . $transaction->id . '-' . time(),
                'gross_amount' => $price,
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'phone' => $request->phone,
            ],
            'callbacks' => [
                'finish' => route('caseowner.token.topup.success'),
            ]
        ];

        $snapToken = Snap::getSnapToken($midtransPayload);

        return view('caseowner.token.payment', compact('snapToken'));
    }

    public function success()
    {
        return view('caseowner.token.success');
    }
}
