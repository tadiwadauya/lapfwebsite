<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('display_order')
            ->orderByDesc('id')
            ->paginate(15);

        return view('user.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('user.departments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:departments,slug'],
            'icon' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active'] = $request->has('is_active');

        // if slug is empty, create it
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Department::create($data);

        return redirect()->route('user.departments.index')
            ->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        return view('user.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable', 'string', 'max:255',
                Rule::unique('departments', 'slug')->ignore($department->id)
            ],
            'icon' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active'] = $request->has('is_active');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $department->update($data);

        return redirect()->route('user.departments.index')
            ->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('user.departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}
