<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::orderBy('sort_order')->orderBy('full_name')->paginate(20);
        return view('user.people.index', compact('people'));
    }

    public function create()
    {
        return view('user.people.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'default_qualifications' => ['nullable', 'string', 'max:1000'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('people', 'public');
        }

        Person::create($data);

        return redirect()->route('user.people.index')->with('success', 'Person saved successfully.');
    }

    public function edit(Person $person)
    {
        return view('user.people.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'default_qualifications' => ['nullable', 'string', 'max:1000'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            // delete old
            if ($person->photo && Storage::disk('public')->exists($person->photo)) {
                Storage::disk('public')->delete($person->photo);
            }
            $data['photo'] = $request->file('photo')->store('people', 'public');
        }

        $person->update($data);

        return redirect()->route('user.people.index')->with('success', 'Person updated successfully.');
    }

    public function destroy(Person $person)
    {
        if ($person->photo && Storage::disk('public')->exists($person->photo)) {
            Storage::disk('public')->delete($person->photo);
        }

        $person->delete();

        return redirect()->route('user.people.index')->with('success', 'Person deleted successfully.');
    }
}
