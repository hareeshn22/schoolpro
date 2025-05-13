<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\HomeworkResource;
use App\Models\Homework;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeworkController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid, $cid)
    {
        //
        return HomeworkResource::collection(Homework::where('school_id', '=', $sid)
        ->where('course_id', '=', $cid)
        // ->where('workdate', '=', Carbon::today()->toDateString())
        ->get());

    }

    public function workbyc($sid, $cid, $subjid)
    {
        // $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->groupBy( 'course_id', 'status', )->select('course_id', 'status', DB::raw('count(*) as total', 'id'))->get())->map(function ($item) {
        //     return [
        //         // 'id',  => $item->id,
        //         'course_id' => $item->course_id,
        //         $item->status => $item->total,
        //         // 'total' => $item->total,
        //     ];
        // });
        $fdata =[];
        for ($i = 0; $i < 6; $i++) {
            $sDate = Carbon::today()->subDays($i);
        $data = HomeworkResource::collection(Homework::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('subject_id', '=', $subjid)->where('workdate', '=', $sDate)->get());

        $merged = collect($data)
            ->groupBy('course_id',  'status')
            ->map(function ($group, $courseId) {
                return [
                    'course_id' => $courseId,
                    'Done'    => $group->where('status', 'done')->count(),
                    'Not Done'   => $group->where('status', 'not done')->count(),
                ];
            })
            ->values();

            if (count($merged) > 0) {
                $fdata[] = $merged->collapse();
            }


        }
        return $fdata;

    }

    /**
     * Display a listing of the resource.
     */
    public function wdata($sid, $cid)
    {
        //
        return HomeworkResource::collection(Homework::where('school_id', '=', $sid)
        ->where('course_id', '=', $cid)
        ->whereBetween('workdate', [Carbon::today()->subDays(7)->toDateString(), Carbon::today()->toDateString()])
        // ->where('workdate', '<', Carbon::today()->toDateString())
        ->get());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $data = [
            'school_id'   => $request->schoolId,
            'teacher_id'  => $request->teacherId,
            'course_id'   => $request->courseId,
            'subject_id'  => $request->subjectId,
            'title'       => $request->title,
            'workdate'    => $request->workdate,
            'content'     => $request->content,
        ];
        $work = Homework::create($data);


        if ($work) {
            return $this->sendResponse('Success', 'Homework created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Homework $homework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Homework $homework)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Homework $homework)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Homework $homework)
    {
        //
    }
}
