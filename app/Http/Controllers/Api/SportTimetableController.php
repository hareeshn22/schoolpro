<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\SportTimetableResource;
use App\Models\Sport;
use App\Models\SportTimetable;
use Illuminate\Http\Request;

class SportTimetableController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($pid, $sid)
    {
        //
        return SportTimetableResource::collection(SportTimetable::where('school_id', '=', $sid)->where('sport_id', '=', $pid)->get());
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
        // $validated = $request->validate([
        //     'schoolid' => 'required|exists:schools,id',
        //     'sportid' => 'required|exists:sports,id',
        //     'timetable' => 'required|array',
        //     'timetable.*.day' => 'required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        //     'timetable.*.start_time' => 'required|date_format:H:i',
        //     'timetable.*.end_time' => 'required|date_format:H:i|after:timetable.*.start_time',
        // ]);
        $validated = $request;

        foreach ($validated['timetable'] as $slot) {
            $timetable = SportTimetable::updateOrCreate(
                [
                    'school_id' => $validated['schoolid'],
                    'sport_id' => $validated['sportid'],
                    'day_of_week' => $slot['day'],
                ],
                [
                    'start_time' => $slot['start_time'],
                    'end_time' => $slot['end_time'],
                ]
            );
        }

        if ($timetable) {
            return $this->sendResponse('Success', 'Timetable created or updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SportTimetable $sportTimetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SportTimetable $sportTimetable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SportTimetable $sportTimetable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SportTimetable $sportTimetable)
    {
        //
    }
}
