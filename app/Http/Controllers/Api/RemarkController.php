<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Remark;
use App\Http\Resources\RemarkResource;
use Illuminate\Http\Request;

class RemarkController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        // $success =
        return RemarkResource::collection(Remark::where('school_id', '=', $id)->get());
        // return $this->sendResponse($success, 'Data Fetched successfully.');
    }

     /**
     * Display a listing of the resource.
     */
    public function remarksbyc($sid, $cid, $hid)
    {
        // $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->groupBy( 'course_id', 'status', )->select('course_id', 'status', DB::raw('count(*) as total', 'id'))->get())->map(function ($item) {
        //     return [
        //         // 'id',  => $item->id,
        //         'course_id' => $item->course_id,
        //         $item->status => $item->total,
        //         // 'total' => $item->total,
        //     ];
        // });
        $data = RemarkResource::collection(Remark::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('homework_id', '=', $hid)->get());

        $merged = collect($data)
                ->groupBy('course_id')
                // ->map(function ($group, $courseId, ) {
                //     return [
                //         // 'course_id' => $courseId,
                //         'homework_id' => $group->first()->attenddate,
                //         'Absent' => $group->where('status', 'absent')->count(),
                //         'Present' => $group->where('status', 'present')->count(),
                //     ];
                // })
                ->values();
            if (count($merged) > 0) {
                $fdata[] = $merged->collapse();
            }
        return $data;

        // return Attendance::where('school_id', '=', $sid)
        // ->get()->countBy('status');

    }

    /**
     * Display Remarks by teacher.
     */
    public function remarkbyt($id)
    {
        //
        // $teacher = Teacher::find($id);
        // return  RemarkResource::collection($teacher->Remarks()->get());
        // return $this->sendResponse($success, 'Data Fetched successfully.');
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
        $items = $request->remarks;
        $data = [];

        // return $this->sendResponse($items, 'Attendance created successfully.');

        foreach ((array) $items as $item) {


            $main = [
                'course_id' => $item["course_id"],
                'student_id' => $item['student_id'],
                'homework_id' => $item['homework_id'],
                'teacher_id' => $item['teacher_id'],
            ];
            $data = [
                'school_id' => $item["school_id"],
                'course_id' => $item["course_id"],
                'student_id' => $item['student_id'],
                'homework_id' => $item['homework_id'],
                'teacher_id' => $item['teacher_id'],
                'remark' => $item['remark'],
            ];
            $remarks = Remark::firstOrNew($main, $data);
            $remarks->remark = $item['remark'];
            $remarks->save();
        }



        if ($remarks) {
            return $this->sendResponse('Success', 'Remark created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sstore(Request $request)
    {
        //
        $remark = remark::create([
            'school_id' => $request->schoolid,
            'course_id' => $request->courseid,
            'teacher_id' => $request->teacherid,
            'student_id' => $request->studentid,
            'homework_id' => $request->workid,
            'remark' => $request->remark,
        ]);

        if ($remark) {
            return $this->sendResponse('Success', 'remark created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(remark $remark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(remark $remark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $remark = Remark::find($request->id);

        $remark->school_id = $request->schoolid;
        $remark->name = $request->name;

        if ($remark->save()) {
            return $this->sendResponse('Success', 'remark Updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $remark = remark::find($id);

        if ($remark->delete()) {
            return $this->sendResponse('Success', 'remark deleted successfully.');
        } else {
            return $this->sendError('Error', ['error' => 'error occured']);
        }

    }
}
