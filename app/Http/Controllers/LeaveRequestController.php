<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $leave = LeaveRequest::all();
        return view('pages/leaveRequest/index', compact('leave'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages/leaveRequest/create');
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
        $leave = new LeaveRequest();
        $leave->name = $request->paned;
        $leave->leave_name = $request->leave_name;
        $leave->start = $request->start;
        $leave->end = $request->end;
        $leave->save();
        return redirect('leave-request');
    }
    public function approved($id)
    {
        $leave = LeaveRequest::find($id);
        $approver = auth()->user()->name;
        $status = 'Approved';
        $leave->approver = $approver;
        $leave->status = $status;
        $leave->update();
        return redirect('leave-request');
    }
    public function rejected($id)
    {
        $leave = LeaveRequest::find($id);
        $approver = auth()->user()->name;
        $status = 'Rejected';
        $leave->approver = $approver;
        $leave->status = $status;
        $leave->update();
        return redirect('leave-request');
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
