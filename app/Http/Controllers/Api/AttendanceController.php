<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid, $cid)
    {
        //
        return AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->where('course_id', '=', $cid)->get());

    }

    /**
     * Display a listing of the resource.
     */
    public function attendsbyc($sid, $cid, $slot)
    {
        // $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->groupBy( 'course_id', 'status', )->select('course_id', 'status', DB::raw('count(*) as total', 'id'))->get())->map(function ($item) {
        //     return [
        //         // 'id',  => $item->id,
        //         'course_id' => $item->course_id,
        //         $item->status => $item->total,
        //         // 'total' => $item->total,
        //     ];
        // });
        $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('timing', 'LIKE', $slot)->get());

        $merged = collect($data)
            ->groupBy('course_id', 'status')
            ->map(function ($group, $courseId) {
                return [
                    'course_id' => $courseId,
                    'Absent'    => $group->where('status', 'absent')->count(),
                    'Present'   => $group->where('status', 'present')->count(),
                ];
            })
            ->values()
            ->toArray();
        return $merged;

        // return Attendance::where('school_id', '=', $sid)
        // ->get()->countBy('status');

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
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
