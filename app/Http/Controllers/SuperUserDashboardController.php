<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperUserDashboardController extends Controller
{
    public function index()
    {
        return view('dashboards.superuser');
    }
    
}
