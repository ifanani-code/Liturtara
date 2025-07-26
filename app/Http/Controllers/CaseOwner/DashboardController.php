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
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        // Ambil query input
        $search = $request->input('search');
        $status = $request->input('status');
        $allowedStatus = ['Sent', 'Available', 'In-progress', 'Completed', 'Expired'];

        // Ambil case milik user saja
        $query = Cases::with('user.profile')->where('user_id', $user->id);

        // Filter berdasarkan status (jika valid)
        if ($status && in_array($status, $allowedStatus)) {
            $query->where('status', $status);
        }

        // Filter berdasarkan pencarian judul
        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        // Ambil data terurut terbaru
        $cases = $query->latest()->paginate(4)->withQueryString();

        // Gunakan relasi jika ada
        $token = $user->tokens;
        $userPoint = $user->userPoint;
        $profile = $user->profile;

        session()->put("token", $token->amount);
        session()->put("point", $userPoint->points);
        session()->put("role", $user->role);

        return view('caseowner.dashboard', compact('cases', 'profile', 'search', 'status'));
    }
}
