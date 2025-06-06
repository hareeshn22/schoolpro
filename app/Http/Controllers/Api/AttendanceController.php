<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends BaseController
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
        $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('timing', 'LIKE', $slot)->where('attenddate', '=', Carbon::today()->toDateString())->get());

        $merged = collect($data)
            ->groupBy('course_id', 'status')
            ->map(function ($group, $courseId) {
                return [
                    'course_id' => $courseId,
                    'Absent' => $group->where('status', 'absent')->count(),
                    'Present' => $group->where('status', 'present')->count(),
                ];
            })
            ->values()
            ->toArray();
        return $merged;

        // return Attendance::where('school_id', '=', $sid)
        // ->get()->countBy('status');

    }

    public function tattendsbyc($sid, $cid, $slot, $date)
    {
        if ($date == 'today') {
            $date = Carbon::today()->toDateString();
        } else {
            $date = Carbon::yesterday()->toDateString();
        }
        $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('timing', 'LIKE', $slot)->where('attenddate', '=', $date)->get());
        return $data;


    }


    public function wattendsbyc($sid, $cid, $slot)
    {
        // $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->groupBy( 'course_id', 'status', )->select('course_id', 'status', DB::raw('count(*) as total', 'id'))->get())->map(function ($item) {
        //     return [
        //         // 'id',  => $item->id,
        //         'course_id' => $item->course_id,
        //         $item->status => $item->total,
        //         // 'total' => $item->total,
        //     ];
        // });

        // ->subDays(2);
        // $startDate = Carbon::today()->subDays(8);
        $fdata = [];
        for ($i = 0; $i < 6; $i++) {
            $sDate = Carbon::yesterday()->subDays($i);
            $data = AttendanceResource::collection(Attendance::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('timing', 'LIKE', $slot)->where('attenddate', '=', $sDate)->get());

            $merged = collect($data)
                ->groupBy( 'course_id','status', )
                ->map(function ($group, $courseId, ) {
                    return [
                        // 'course_id' => $courseId,
                        'attenddate' => $group->first()->attenddate,
                        'Absent' => $group->where('status', 'absent')->count(),
                        'Present' => $group->where('status', 'present')->count(),
                    ];
                })
                ->values();
            if (count($merged) > 0) {
                $fdata[] = $merged->collapse();
            }


        }
        $filterdata = array_filter($fdata, function ($subArray) {
            return !empty($subArray);
        });

        return array_values($filterdata);



        // return Attendance::where('school_id', '=', $sid)
        // ->get()->countBy('status');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $items = $request->attends;
        $data = [];

        // return $this->sendResponse($items, 'Attendance created successfully.');

        foreach ((array) $items as $item) {
            if ($request->date == 'today') {
                $adate = Carbon::today()->toDateString();
            } else {
                $adate = Carbon::yesterday()->toDateString();
            }

            $main = [
                'course_id' => $item["course_id"],
                'student_id' => $item['student_id'],
                'attenddate' => $adate,
                'timing' => $item['timing'],
            ];
            $data = [
                'school_id' => $item["school_id"],
                'course_id' => $item["course_id"],
                'student_id' => $item['student_id'],
                'attenddate' => $adate,
                'timing' => $item['timing'],
                'status' => $item['status'] == 'present' ? 1 : 0,
            ];
            $attends = Attendance::firstOrNew($main, $data);
            $attends->status = $item['status'] == 'present' ? 1 : 0;
            $attends->save();
        }



        if ($attends) {
            return $this->sendResponse('Success', 'Attendance created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }


    public function attendsbyst($sid, $week)
    {
        if ($week == 'this') {
            $sDate = Carbon::today()->subDays(7)->toDateString();
            $date = Carbon::today()->toDateString();
        } else {
            $sDate = Carbon::today()->subDays(14)->toDateString();
            $date = Carbon::today()->subDays(7)->toDateString();
        }
        $data = AttendanceResource::collection(Attendance::
            where('student_id', '=', $sid)
            // ->where('timing', 'LIKE', $slot)
            ->whereBetween('attenddate', [$sDate, $date])
            ->get());
        $finaldata = collect($data)
            ->groupBy('attenddate') // Group by date
            ->map(function ($items, $date) {
                return [
                    "date" => $date,
                    "morning" => $items->where('timing', 'Morning')->first()['status'] ?? "",
                    "afternoon" => $items->where('timing', 'Afternoon')->first()['status'] ?? "",
                    "extra" => $items->where('timing', 'Extra')->first()['status'] ?? ""
                ];
            })->values()->all();

        return $finaldata;


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
