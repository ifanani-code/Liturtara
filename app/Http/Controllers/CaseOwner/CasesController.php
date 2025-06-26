<?php

namespace App\Http\Controllers\CaseOwner;

use App\Http\Controllers\Controller;
use App\Models\Cases;
use App\Models\CaseTalentProposal;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    //
    public function viewProposals($caseId)
    {
    $case = Cases::with('proposals.talent')->findOrFail($caseId);
    return view('caseowner.proposals.index', compact('case'));
    }

    public function acceptProposal($proposalId)
    {
        $proposal = CaseTalentProposal::findOrFail($proposalId);
        $proposal->status = 'accepted';
        $proposal->save();

        // Update case untuk assign talent
        $proposal->case->update([
            'selected_talent_id' => $proposal->talent_id
        ]);

        // Set semua proposal lain jadi rejected
        CaseTalentProposal::where('case_id', $proposal->case_id)
            ->where('id', '!=', $proposalId)
            ->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Talent selected!');
    }
}
