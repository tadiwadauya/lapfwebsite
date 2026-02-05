<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::orderBy('sort_order')->orderBy('id')->paginate(10);
        return view('user.committees.index', compact('committees'));
    }

    public function create()
    {
        return view('user.committees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        Committee::create($data);

        return redirect()->route('user.committees.index')->with('success','Committee created.');
    }

    public function edit(Committee $committee)
    {
        return view('user.committees.edit', compact('committee'));
    }

    public function update(Request $request, Committee $committee)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');

        $committee->update($data);

        return redirect()->route('user.committees.index')->with('success','Committee updated.');
    }

    public function destroy(Committee $committee)
    {
        $committee->delete();
        return redirect()->route('user.committees.index')->with('success','Committee deleted.');
    }
}

