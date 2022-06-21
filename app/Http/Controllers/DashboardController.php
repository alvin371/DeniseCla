<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('pages/profile/dashboard');
    }

    public function profile()
    {
        return view('pages/profile/index');
    }
}
