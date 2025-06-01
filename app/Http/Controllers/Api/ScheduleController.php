<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use App\Models\Course;
use Illuminate\Http\Request;

class ScheduleController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid, $cid)
    {
        //
        $data = ScheduleResource::collection(Schedule::where('school_id', '=', $sid)->where('course_id', '=', $cid)->get());

        // Convert array to collection and group by "day"
        $datar = collect($data)->groupBy('day');

        $result = collect($datar)->map(function ($items, $day) {
            return collect($items)->map(function ($item) {
                return [
                    "id"         => $item['id'],
                    "subject"    => $item['subject']['name'],
                    "startTime"  => $item['period']['start_time'],
                    "endTime"    => $item['period']['end_time'],
                ];
            })->toArray();
        })->toArray();

        $output = [];

        foreach ($result as $day => $data) {
            $output[] = [
                "day"  => $day,
                "data" => $data,
            ];
        }

        return $output;

        // Transform the grouped data into the desired format
        // $result = $groupedData->map(function ($items, $day) {
        //     return [
        //         "day"  => $day,
        //         "data" => $items->map(function ($item) {
        //             return [
        //                 "timing"  => date("H:i", strtotime($item['period'])),
        //                 "subject" => $item['subject'],
        //             ];
        //         })->values()->toArray(),
        //     ];
        // })->values()->toArray();

        // return $result;

        // $oData = Schedule::with('Period', 'Subject')->where('school_id', '=', $id)->get();

        //  return collect($oData)
        //     ->groupBy('day')->values();
        // // $transformedData = [];
        // foreach ($merged as $data) {
        //     $transformedData[] = [
        //         "id"   => $data['id'],
        //         "day"  => $data['day'],
        //         "data" => [],
        //     ];
        // }

        // foreach ($oData as $item) {
        //     $startTime   = date("H:i", strtotime($item['period']['start_time']));
        //     $subjectName = $item['subject']['name'];

        //     $transformedData[0]['data'][] = [
        //         "timing"  => $startTime,
        //         "subject" => $subjectName,
        //     ];
        // }

        // return response()->json($transformedData);

    }

     /**
     * Display a listing of the resource.
     */
    public function teachtables($sid, $cid)
    {
        //
        $data = ScheduleResource::collection(Schedule::where('school_id', '=', $sid)->where('subject_id', '=', $cid)->get());

        // Convert array to collection and group by "day"
        $datar = collect($data)->groupBy('day');

        $result = collect($datar)->map(function ($items ) {
            return collect($items)->map(function ($item ) {
                return [
                    "id"         => $item['id'],
                    'courseid'   => $item['course_id'],
                    'course'     => Course::find($item['course_id'])->name,
                    // "subject"    => $item['subject']['name'],
                    "startTime"  => $item['period']['start_time'],
                    "endTime"    => $item['period']['end_time'],
                ];
            })->toArray();
        })->toArray();

        $output = [];

        foreach ($result as $day => $data) {
            $output[] = [
                "day"  => $day,
                "data" => $data,
            ];
        }

        return $output;

       

    }
    /**
     * Show the form for creating a new resource.
     */
    public function timebyday($sid, $cid, $day)
    {
        //
        $data = ScheduleResource::collection(Schedule::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('day', '=', $day)->get());
        // $data = Schedule::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('day', '=', $day)->get();

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $items = $request->schedules;
        // $sitems = $request->subjectids;

        // foreach ($variable as $key => $value) {
        //     # code...
        // }

        // foreach ((array) $items as $item) {
        //     // return response()->json($item["name"], 500);
        //     Schedule::create([
        //         'school_id'  => $item["schoolId"],
        //         'course_id'  => $item["courseId"],
        //         'period_id'  => $item["periodId"],
        //         // 'subject_id' => $sitems[$key]['id'],
        //         'subject_id' => $item['subjectId'],
        //         'day'        => $request->day,
        //     ]);

        // }

        $data = [];

        foreach ((array) $items as $item) {
            $data[] = [
                'school_id'  => $item["schoolId"],
                'course_id'  => $item["courseId"],
                'period_id'  => $item["periodId"],
                'subject_id' => $item['subjectId'],
                'day'        => $item['day'],
            ];
        }
        $schedule = Schedule::insert($data);

        if ($schedule) {
            return $this->sendResponse('Success', 'Timetable created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);
        if ($schedule) {
            $data = new ScheduleResource($schedule);
            return $data;
            // return $this->sendResponse(new ScheduleResource($schedule), 'Schedule retrieved successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
        // return ScheduleResource::collection(Schedule::where('school_id', '=', $sid)->where('course_id', '=', $cid)->where('day', '=', $day)->get());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $schedule             = Schedule::find($request->id);
        // $schedule->school_id  = $request->schoolid;
        // $schedule->course_id  = $request->courseid;
        $schedule->period_id  = $request->periodid;
        $schedule->subject_id = $request->subjectid;
        $schedule->day        = $request->day;

        if ($schedule->save()) {
            return $this->sendResponse('Success', 'Schedule Updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $schedule = Schedule::find($id);

        if ($schedule->delete()) {
            return $this->sendResponse('Success', 'Schedule deleted successfully.');
        } else {
            return $this->sendError('Error', ['error' => 'error occured']);
        }

    }
}
