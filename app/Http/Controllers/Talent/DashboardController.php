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
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        if ($user->role != 'talent') {
            abort(403);
        }

        $tab = $request->get('tab', 'case-list');
        $status = $request->input('status');
        $search = $request->input('search');
        $allowedStatus = ['Available', 'In-progress', 'Completed'];

        $tabViewMap = [
            'case-list' => 'talent.partials.case-list',
            'explore-case' => 'talent.partials.explore-case',
            'solution-status' => 'talent.partials.solution-status',
        ];
        $tab_view = $tabViewMap[$tab] ?? 'talent.partials.case-list';

        $query = Cases::query()->latest();

        // Filter query berdasarkan tab
        if ($tab === 'case-list') {
            $query->whereIn('status', $allowedStatus);
        } elseif ($tab === 'explore-case') {
            $query->whereNull('selected_talent_id')->where('status', 'Available');
        } elseif ($tab === 'solution-status') {
            $query->where('selected_talent_id', $user->id);
        }

        // Filter status jika valid
        if ($status && in_array($status, $allowedStatus)) {
            $query->where('status', $status);
        }

        // Filter pencarian
        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        $cases = $query->paginate(4)->withQueryString();

        // Session point & token
        $userPoint = $user->userPoint;
        $token = $user->tokens;

        session()->put('point', $userPoint->points);
        session()->put('token', $token->amount);
        session()->put('role', $user->role);

        return view('talent.dashboard', compact('cases', 'user', 'tab_view', 'status', 'search'));
    }
}
