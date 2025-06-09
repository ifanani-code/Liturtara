<?php

namespace App\Http\Controllers\CaseOwner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function create(Cases $case)
    {
        $user = Auth::user();

        // Validasi: hanya case owner & belum review
        if ($case->user_id !== $user->id || $case->review) {
            return redirect()->route('caseowner.dashboard')->with('error', 'Tidak dapat me-review case ini.');
        }

        return view('caseowner.reviews.create', compact('case'));
    }

    public function store(Request $request, Cases $case)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();

        if ($case->user_id !== $user->id || $case->review) {
            return redirect()->route('caseowner.dashboard')->with('error', 'Tidak dapat me-review case ini.');
        }

        Review::create([
            'case_id' => $case->id,
            'reviewer_id' => $user->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('caseowner.dashboard')->with('success', 'Review berhasil disimpan.');
    }
}
