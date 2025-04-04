<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $data = ScheduleResource::collection(Schedule::where('school_id', '=', $id)->get());

        // Convert array to collection and group by "day"
        $datar = collect($data)->groupBy('day');

        $result = collect($datar)->map(function ($items, $day) {
            return collect($items)->map(function ($item) {
                return [
                    "id"      => $item['id'],
                    "subject" => $item['subject']['name'],
                    "period"  => $item['period']['start_time'],
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
        $result = $groupedData->map(function ($items, $day) {
            return [
                "day"  => $day,
                "data" => $items->map(function ($item) {
                    return [
                        "timing"  => date("H:i", strtotime($item['period'])),
                        "subject" => $item['subject'],
                    ];
                })->values()->toArray(),
            ];
        })->values()->toArray();

        return $result;

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
    public function show(Schedule $schedule)
    {
        //
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
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
