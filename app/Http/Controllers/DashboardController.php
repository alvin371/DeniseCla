<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function updateProfile($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name ? $request->name : $user->name;
        $user->email = $request->email ? $request->email : $user->email;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->role = $request->role ? $request->role : $user->role;
        $user->nip = $request->nip ? $request->nip : $user->nip;
        $user->jenis_kelamin = $request->jenis_kelamin ? $request->jenis_kelamin : $user->jenis_kelamin;
        $user->TTL = $request->TTL ? $request->TTL : $user->TTL;
        $user->phone = $request->phone ? $request->phone : $user->phone;
        $user->jabatan = $request->jabatan ? $request->jabatan : $user->jabatan;
        $user->alamat = $request->alamat ? $request->alamat : $user->alamat;
        $user->status = $request->status ? $request->status : $user->status;
        $user->gaji = $request->gaji ? $request->gaji : $user->gaji;
        $user->image = $request->image ? $request->file('image')->store('product-image') : $user->image;
        $user->save();
        return redirect('profiles');
    }
}
