<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{
    public function index(Committee $committee)
    {
        $members = $committee->members()->paginate(20);
        return view('user.committee-members.index', compact('committee','members'));
    }

    public function create(Committee $committee)
    {
        return view('user.committee-members.create', compact('committee'));
    }

    public function store(Request $request, Committee $committee)
    {
        $data = $request->validate([
            'member_name' => ['required', 'string', 'max:255'],
            'qualifications' => ['nullable', 'string', 'max:1000'],
            'nominated_by' => ['nullable', 'string', 'max:255'],
        ]);
    
        $committee->members()->create($data);
    
        return redirect()
            ->route('user.committees.members.index', $committee)
            ->with('success', 'Member saved successfully.');
    }
    
    public function edit(Committee $committee, CommitteeMember $member)
    {
        // ensure member belongs to committee
        abort_unless($member->committee_id === $committee->id, 404);

        return view('user.committee-members.edit', [
            'committee' => $committee,
            'member' => $member
        ]);
    }

    public function update(Request $request, Committee $committee, CommitteeMember $member)
    {
        abort_unless($member->committee_id === $committee->id, 404);

        $data = $request->validate([
            'member_name' => ['required','string','max:255'],
            'qualifications' => ['nullable','string','max:255'],
            'nominated_by' => ['nullable','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;

        $member->update($data);

        return redirect()->route('user.committees.members.index', $committee)->with('success','Member updated.');
    }

    public function destroy(Committee $committee, CommitteeMember $member)
    {
        abort_unless($member->committee_id === $committee->id, 404);

        $member->delete();

        return redirect()->route('user.committees.members.index', $committee)->with('success','Member removed.');
    }
}

