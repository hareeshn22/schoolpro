<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\SportAttendanceResource;
use App\Models\SportAttendance;
use Illuminate\Http\Request;

use App\Http\Resources\StudentResource;

class SportAttendanceController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($pid, $sid)
    {
        //
        return SportAttendanceResource::collection(SportAttendance::where('school_id', '=', $sid)->where('sport_id', '=', $pid)->get());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function presentStudents($pid, $sid)
    {
        //
        $students = SportAttendance::where('school_id', $sid)
            ->where('sport_id', $pid)
            ->where('status', true)
            ->with('student') // assuming a relation exists
            ->get()
            ->pluck('student');

        return StudentResource::collection($students);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $items = $request->input('attends');

        if (!is_array($items)) {
            return response()->json(['error' => 'Invalid attends format'], 400);
        }


        $attends = null;

        foreach ($items as $item) {
            // foreach ($data['attends'] as $item) {

            // if ($request->date == 'today') {
            //     $adate = Carbon::today()->toDateString();
            // } else {
            //     $adate = Carbon::yesterday()->toDateString();
            // }
            // dd($item["sport_id"]);


            $main = [
                'school_id' => $request->schoolid,
                // 'course_id' => $request->courseid,
                'sport_id' => $item["sport_id"],
                'student_id' => $item['student_id'],
                // 'attenddate' => $adate,
                // 'timing' => $item['timing'],
            ];
            $data = [
                // 'school_id' => $item["school_id"],
                // 'course_id' => $item["course_id"],
                // 'student_id' => $item['student_id'],
                // 'attenddate' => $adate,
                // 'timing' => $item['timing'],
                'status' => $item['status'] == 'present' ? 1 : 0,
            ];
            $attend = SportAttendance::firstOrNew($main, $data);
            $attend->status = $item['status'] == 'present' ? 1 : 0;
            $attends = $attend->save();
        }



        if ($attends) {
            return $this->sendResponse('Success', 'Sport Attendance created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
