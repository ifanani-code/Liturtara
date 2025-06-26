<?php

namespace App\Http\Controllers\CaseOwner;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\Profile;
use App\Models\Review;
use App\Models\Token;
use App\Models\UserPoint;
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
        $token = Token::where('user_id', $user->id)->first();
        $userPoint = UserPoint::where('user_id', $user->id)->first();
        $cases = Cases::where('user_id', $user->id)->latest()->get();
        $profile = Profile::where('user_id', $user->id)->first();
        return view('caseowner.dashboardco', compact('token', 'userPoint', 'cases', 'profile'));
    }

}
