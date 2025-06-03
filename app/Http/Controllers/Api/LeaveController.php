<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\LeaveResource;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        return LeaveResource::collection(Leave::where('school_id', '=', $id)->get());

    }

    /**
     * Display a leaves of the teacher.
     */
    public function tleaves($id)
    {
        //
        return LeaveResource::collection(Leave::where('teacher_id', '=', $id)->get());

    }

    /**
     * Display a leaves of the teacher.
     */
    public function sleaves($id)
    {
        //
        return LeaveResource::collection(Leave::where('student_id', '=', $id)->get());

    }

    /**
     * Display a listing of the resource.
     */
    public function leavesbyc($id, $cate)
    {
        //
        return LeaveResource::collection(Leave::where('school_id', '=', $id)->where('user_type', '=', $cate)->get());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user_type == 'student') {
            $leave = Leave::create([
                'school_id' => $request->schoolId,
                'student_id' => $request->studentId,
                'user_type' => $request->usertype,
                'leavedate' => $request->leavedate,
                'reason' => $request->reason,
            ]);

        } else {
            $leave = Leave::create([
                'school_id' => $request->schoolId,
                'teacher_id' => $request->teacherId,
                'user_type' => $request->usertype,
                'leavedate' => $request->leavedate,
                'reason' => $request->reason,
            ]);
        }


        if ($leave) {
            return $this->sendResponse('Success', 'Leave created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return LeaveResource::collection(Leave::where('id', '=', $id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $leave = Leave::find($request->id);

        $leave->school_id = $request->schoolid;
        $leave->name = $request->name;

        if ($leave->save()) {
            return $this->sendResponse('Success', 'Leave Updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
