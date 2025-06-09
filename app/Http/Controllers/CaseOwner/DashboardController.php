<?php

namespace App\Http\Controllers\CaseOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('caseowner.dashboardco');
    }

    public function dashboard()
    {
        $user = Auth::user();

        // Ambil token
        $token = \App\Models\Token::where('user_id', $user->id)->first();

        // Ambil point & level
        $userPoint = \App\Models\UserPoint::where('user_id', $user->id)->first();

        // Ambil cases milik user
        $cases = \App\Models\Cases::where('user_id', $user->id)->latest()->get();

        return view('caseowner.dashboardco', compact('token', 'userPoint', 'cases'));
    }

}
