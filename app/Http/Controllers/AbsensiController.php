<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $this->Carbon::now();
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $cek_absen = Absensi::where(['user_id' => $user_id, 'date' => $date])
            ->get()
            ->first();
        if (is_null($cek_absen)) {
            $info = array(
                "status" => "Anda belum mengisi absensi!",
                "btnIn" => "",
                "btnOut" => "disabled"
            );
        } elseif ($cek_absen->time_out == NULL) {
            $info = array(
                "status" => "Jangan lupa absen keluar",
                "btnIn" => "disabled",
                "btnOut" => ""
            );
        } else {
            $info = array(
                "status" => "Absensi hari ini telah selesai!",
                "btnIn" => "disabled",
                "btnOut" => "disabled"
            );
        }
        if (auth()->user()->role == 'karyawan') {
            $data_absen = Absensi::where('user_id', $user_id)
                ->orderBy('date', 'desc')
                ->paginate(20);
        } else {
            $data_absen = Absensi::all()->orderBy('date', 'desc')->paginate(20);
        }
        return view('pages/dataAbsensi/index', compact('data_absen', 'info'));
    }
    public function absen(Request $request)
    {
        // $this->timeZone('Asia/Jakarta');
        // dd($request->all());
        $user_id = Auth::user()->id;
        $date = date("Y-m-d"); // 2017-02-01
        $time = date("H:i:s"); // 12:31:20
        $note = $request->note;

        $absen = new Absensi();

        // absen masuk
        if ($request->btnIn == 'btnIn') {
            // cek double data
            $cek_double = $absen->where(['date' => $date, 'user_id' => $user_id])
                ->count();
            if ($cek_double > 0) {
                return redirect()->back();
            }
            $absen->create([
                'user_id' => $user_id,
                'date' => $date,
                'time_in' => $time,
                'note' => $note
            ]);
            return redirect()->back();
        }
        // absen keluar
        elseif ($request->btnOut == 'btnOut') {
            // return "btn out";
            $absen->where(['date' => $date, 'user_id' => $user_id])
                ->update([
                    'time_out' => $time,
                    'note' => $note
                ]);
            return redirect()->back();
        }
        return redirect('absensi');
    }
    public function absensiOut(Request $request)
    {
        // $this->timeZone('Asia/Jakarta');
        // dd($request->all());
        $user_id = Auth::user()->id;
        $date = date("Y-m-d"); // 2017-02-01
        $time = date("H:i:s"); // 12:31:20
        $note = $request->note;

        $absen = new Absensi();

        if ($request->btnOut == null) {
            // return "btn out";
            $absen->where(['date' => $date, 'user_id' => $user_id])
                ->update([
                    'time_out' => $time,
                    'note' => $note
                ]);
            return redirect()->back();
        }
        return redirect('absensi');
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
