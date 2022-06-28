<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        return view('pages/profile/dashboard', compact('user'));
    }

    public function profile()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        return view('pages/profile/index', compact('user'));
    }
    public function editProfile($id)
    {
        $user = User::find($id);
        return view('pages/profile/editProfile', compact('user'));
    }
}
