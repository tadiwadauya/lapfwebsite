<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::where('is_active', true)
            ->orderBy('display_order')
            ->orderByDesc('id')
            ->get();

        return view('front.departments.index', compact('departments'));
    }

    public function show(string $slug)
    {
        $department = Department::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('front.departments.show', compact('department'));
    }
}
