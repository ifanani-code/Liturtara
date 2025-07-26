<?php

namespace App\Http\Controllers\Talent;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\CaseTalentProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasesController extends Controller
{
    public function listAvailableCases()
    {
    $cases = Cases::whereNull('selected_talent_id')->get();
    return view('talent.available-cases', compact('cases'));
    }

    public function index(Request $request) {
        $query = $query = $request->input('search');

        $cases = Cases::when($query, function ($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%');
        })->latest()->paginate(10); // paginate atau bisa ->get()

        return view('talent.dashboard', compact('cases', 'query'));
    }

    public function submitProposal(Request $request, $caseId)
    {
        $request->validate([
            'proposal_text' => 'required|string'
        ]);

        CaseTalentProposal::create([
            'case_id' => $caseId,
            'user_id' => Auth::id(),
            'proposal_text' => $request->proposal_text
        ]);

        return redirect()->route('talent.dashboard')->with('success', 'Proposal submitted!');
    }

    public function myProjects()
    {
    $projects = Cases::where('selected_talent_id', Auth::id())->get();
    return view('talent.my-projects', compact('projects'));
    }

}
