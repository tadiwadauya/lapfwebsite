<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PensionerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PensionerImageController extends Controller
{
    public function index()
    {
        $images = PensionerImage::orderBy('display_order')->orderByDesc('id')->paginate(20);
        return view('user.pensioners.index', compact('images'));
    }

    public function create()
    {
        return view('user.pensioners.create');
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

        $order = (int)($request->display_order ?? 0);
        $isActive = $request->has('is_active');

        foreach ($request->file('images') as $file) {
            $path = $file->store('pensioners', 'public');

            PensionerImage::create([
                'title' => $request->title,
                'image' => $path,
                'display_order' => $order++,
                'is_active' => $isActive,
            ]);
        }

        return redirect()->route('user.pensioners.index')
            ->with('success', 'Pensioner images uploaded successfully.');
    }

    public function edit(PensionerImage $pensioner)
    {
        return view('user.pensioners.edit', ['image' => $pensioner]);
    }

    public function update(Request $request, PensionerImage $pensioner)
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
            Storage::disk('public')->delete($pensioner->image);
            $data['image'] = $request->file('image')->store('pensioners', 'public');
        }

        $pensioner->update($data);

        return redirect()->route('user.pensioners.index')
            ->with('success', 'Pensioner image updated successfully.');
    }

    public function destroy(PensionerImage $pensioner)
    {
        Storage::disk('public')->delete($pensioner->image);
        $pensioner->delete();

        return redirect()->route('user.pensioners.index')
            ->with('success', 'Pensioner image deleted successfully.');
    }
}
