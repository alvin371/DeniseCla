<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('pages/dataKaryawan/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('pages/dataKaryawan/detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        $jabatan = Jabatan::all();
        return view('pages/dataKaryawan/edit', compact('user', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

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
        return redirect('karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //

        $user = User::find($id);
        $user->delete();
        return redirect('karyawan');
    }
}
