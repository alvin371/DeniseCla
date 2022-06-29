<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $pinjaman = Pinjaman::all();
        return view('pages/dataPinjaman/index', compact('pinjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages/dataPinjaman/create');
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
        $pinjaman = new Pinjaman();
        $pinjaman->name = $request->paned;
        $pinjaman->note = $request->note;
        $pinjaman->money = $request->money;
        $pinjaman->end = $request->end;
        $pinjaman->save();
        return redirect('pinjaman');
    }
    public function approved($id)
    {
        $pinjaman = Pinjaman::find($id);
        $status = 'Approved';
        $pinjaman->status = $status;
        $pinjaman->update();
        return redirect('pinjaman');
    }
    public function rejected($id)
    {
        $pinjaman = Pinjaman::find($id);
        $status = 'Rejected';
        $pinjaman->status = $status;
        $pinjaman->update();
        return redirect('pinjaman');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
