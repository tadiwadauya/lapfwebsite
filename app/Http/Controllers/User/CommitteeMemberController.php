<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\Person;
use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{
    public function index(Committee $committee)
    {
        // Chairperson first, then sort_order, then latest
        $members = $committee->members()
            ->orderByDesc('is_chairperson')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(20);

        return view('user.committee-members.index', compact('committee', 'members'));
    }

    public function create(Committee $committee)
    {
        $people = Person::where('is_active', 1)->orderBy('sort_order')->orderBy('full_name')->get();
    return view('user.committees.members.create', compact('committee','people'));
    }

    public function store(Request $request, Committee $committee)
    {
        $data = $request->validate([
            'member_name'     => ['required', 'string', 'max:255'],
            'qualifications'  => ['nullable', 'string', 'max:1000'],
            'nominated_by'    => ['nullable', 'string', 'max:255'],
            'sort_order'      => ['nullable', 'integer', 'min:0'],
            'is_chairperson'  => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_chairperson'] = $request->boolean('is_chairperson');

        // ✅ Ensure only ONE chairperson per committee
        if ($data['is_chairperson']) {
            $committee->members()->update(['is_chairperson' => false]);
        }

        $committee->members()->create($data);

        return redirect()
            ->route('user.committees.members.index', $committee)
            ->with('success', 'Member saved successfully.');
    }

    public function edit(Committee $committee, CommitteeMember $member)
    {
        abort_unless($member->committee_id === $committee->id, 404);

        return view('user.committee-members.edit', compact('committee', 'member'));
    }

    public function update(Request $request, Committee $committee, CommitteeMember $member)
    {
        abort_unless($member->committee_id === $committee->id, 404);

        $data = $request->validate([
            'member_name'     => ['required', 'string', 'max:255'],
            'qualifications'  => ['nullable', 'string', 'max:1000'],
            'nominated_by'    => ['nullable', 'string', 'max:255'],
            'sort_order'      => ['nullable', 'integer', 'min:0'],
            'is_chairperson'  => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_chairperson'] = $request->boolean('is_chairperson');

        // ✅ Ensure only ONE chairperson per committee
        if ($data['is_chairperson']) {
            $committee->members()
                ->where('id', '!=', $member->id)
                ->update(['is_chairperson' => false]);
        }

        $member->update($data);

        return redirect()
            ->route('user.committees.members.index', $committee)
            ->with('success', 'Member updated.');
    }

    public function destroy(Committee $committee, CommitteeMember $member)
    {
        abort_unless($member->committee_id === $committee->id, 404);

        $member->delete();

        return redirect()
            ->route('user.committees.members.index', $committee)
            ->with('success', 'Member removed.');
    }
}
