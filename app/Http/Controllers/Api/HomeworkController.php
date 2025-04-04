<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\HomeworkResource;
use App\Models\Homework;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeworkController extends Controller
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

    public function workbyc($sid, $cid)
    {
        // $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->groupBy( 'course_id', 'status', )->select('course_id', 'status', DB::raw('count(*) as total', 'id'))->get())->map(function ($item) {
        //     return [
        //         // 'id',  => $item->id,
        //         'course_id' => $item->course_id,
        //         $item->status => $item->total,
        //         // 'total' => $item->total,
        //     ];
        // });
        $data = HomeworkResource::collection(Homework::where('school_id', '=', $sid)->where('course_id', '=', $cid)->get());

        $merged = collect($data)
            ->groupBy('course_id', 'subject_id', 'status')
            ->map(function ($group, $courseId) {
                return [
                    'course_id' => $courseId,
                    'Done'    => $group->where('status', 'done')->count(),
                    'Not Done'   => $group->where('status', 'not done')->count(),
                ];
            })
            ->values()
            ->toArray();
        return $merged;

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
        //
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
