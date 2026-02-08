<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('display_order')
            ->orderByDesc('id')
            ->paginate(15);

        return view('user.team.index', compact('members'));
    }

    public function create()
    {
        return view('user.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'position_title' => ['nullable', 'string', 'max:255'],
            'qualifications' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:4096'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('user.team-members.index')
            ->with('success', 'Team member created successfully.');
    }

    public function edit(TeamMember $team_member)
    {
        return view('user.team.edit', ['member' => $team_member]);
    }

    public function update(Request $request, TeamMember $team_member)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'position_title' => ['nullable', 'string', 'max:255'],
            'qualifications' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:4096'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('photo')) {
            if (!empty($team_member->photo)) {
                Storage::disk('public')->delete($team_member->photo);
            }
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        $team_member->update($data);

        return redirect()->route('user.team-members.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team_member)
    {
        if (!empty($team_member->photo)) {
            Storage::disk('public')->delete($team_member->photo);
        }

        $team_member->delete();

        return redirect()->route('user.team-members.index')
            ->with('success', 'Team member deleted successfully.');
    }
}
