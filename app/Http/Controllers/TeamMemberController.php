<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('display_order')->latest()->paginate(20);
        return view('admin.team_members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team_members.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'position_title' => ['nullable', 'string', 'max:255'],
            'qualifications' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:4096'],

            'facebook' => ['nullable', 'url', 'max:255'],
            'twitter' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],

            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['display_order'] = $data['display_order'] ?? 0;

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create($data);

        return redirect()->route('team-members.index')->with('success', 'Team member created successfully.');
    }

    public function edit(TeamMember $team_member)
    {
        return view('admin.team_members.edit', ['member' => $team_member]);
    }

    public function update(Request $request, TeamMember $team_member)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'position_title' => ['nullable', 'string', 'max:255'],
            'qualifications' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'max:4096'],

            'facebook' => ['nullable', 'url', 'max:255'],
            'twitter' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'linkedin' => ['nullable', 'url', 'max:255'],

            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');
        $data['display_order'] = $data['display_order'] ?? 0;

        if ($request->hasFile('photo')) {
            if (!empty($team_member->photo)) {
                Storage::disk('public')->delete($team_member->photo);
            }
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }

        $team_member->update($data);

        return redirect()->route('team-members.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team_member)
    {
        if (!empty($team_member->photo)) {
            Storage::disk('public')->delete($team_member->photo);
        }

        $team_member->delete();

        return redirect()->route('team-members.index')->with('success', 'Team member deleted successfully.');
    }
}
