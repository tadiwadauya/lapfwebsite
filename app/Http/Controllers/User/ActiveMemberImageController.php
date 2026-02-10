<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ActiveMemberImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActiveMemberImageController extends Controller
{
    public function index()
    {
        $images = ActiveMemberImage::orderBy('display_order')
            ->orderByDesc('id')
            ->paginate(20);

        return view('user.active_members.index', compact('images'));
    }

    public function create()
    {
        return view('user.active_members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable'],
            'images' => ['required'],
            'images.*' => ['image', 'max:4096'],
        ]);

        $order = (int) ($request->display_order ?? 0);
        $isActive = $request->has('is_active');

        foreach ($request->file('images') as $file) {
            $path = $file->store('active-members', 'public');

            ActiveMemberImage::create([
                'title' => $request->title,
                'image' => $path,
                'display_order' => $order++,
                'is_active' => $isActive,
            ]);
        }

        return redirect()
            ->route('user.active-members.index')
            ->with('success', 'Images uploaded successfully.');
    }

    public function edit(ActiveMemberImage $active_member)
    {
        return view('user.active_members.edit', ['image' => $active_member]);
    }

    public function update(Request $request, ActiveMemberImage $active_member)
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($active_member->image);
            $data['image'] = $request->file('image')->store('active-members', 'public');
        }

        $active_member->update($data);

        return redirect()
            ->route('user.active-members.index')
            ->with('success', 'Image updated successfully.');
    }

    public function destroy(ActiveMemberImage $active_member)
    {
        Storage::disk('public')->delete($active_member->image);
        $active_member->delete();

        return redirect()
            ->route('user.active-members.index')
            ->with('success', 'Image deleted successfully.');
    }
}
