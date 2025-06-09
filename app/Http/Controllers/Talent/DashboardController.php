<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Profile;
use App\Models\Token;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil semua kasus dari case owner
        $cases = Cases::with('user.profile')->get();
        $userPoint = UserPoint::where('user_id', $user->id)->first();
        $token = Token::where('user_id', $user->id)->first();


        return view('talent.dashboard', [
            'user' => $user,
            'cases' => $cases,
            'userPoint' => $userPoint,
            'token' => $token,
            'showTopUpPopup' => $user->is_verified == 0, // trigger popup
        ]);
    }
}
