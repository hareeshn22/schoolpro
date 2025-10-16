<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\EventParticipantResource;
use App\Http\Resources\StudentResource;
use App\Models\EventParticipant;
use App\Models\Event;
use Illuminate\Http\Request;

class EventParticipantController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid)
    {
        // return EventParticipantResource::collection(EventParticipant::where('event_id', '=', $sid)->get());
        $students = EventParticipant::where('event_id', $sid)
            ->with('student') // eager load student relationship
            ->get()
            ->pluck('student') // extract only student models
            ->filter(); // remove nulls if any

        return StudentResource::collection($students);

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
        $validated = $request->validate([
            'eventid' => 'required|exists:events,id',
            'studentsList' => 'required|array',
        ]);

        $event = Event::findOrFail($validated['eventid']);

        $syncData = [];

        // foreach ($validated['studentsList'] as $student) {
        //     EventParticipant::updateOrCreate(
        //         ['event_id' => $event->id, 'student_id' => $student['student_id']],
        //         ['practice_time' => $student['practice_time'] ?? null]
        //     );
        // }


        foreach ($validated['studentsList'] as $student) {
            if (is_array($student) && isset($student['student_id'])) {
                $syncData[$student['student_id']] = [
                    'practice_time' => $student['practice_time'] ?? null,
                    // 'role' => $student['role'] ?? 'player',
                ];
            } elseif (is_numeric($student)) {
                $syncData[$student] = []; // No metadata
            }
        }

        $event->participants()->sync($syncData);

        return $this->sendResponse('Success', 'Participants synced successfully.');

        // $validated = $request->validate([
        //     'eventid' => 'required|exists:events,id',
        //     'studentsList' => 'required|array',
        //     // 'participants.*.student_id' => 'required|exists:students,id',
        //     // 'participants.*.practice_time' => 'nullable|date_format:H:i',
        //     // 'participants.*.role' => 'nullable|in:player,substitute,trainer,referee',
        // ]);

        // $event = Event::find($validated['eventid']);

        // // Prepare sync data
        // $syncData = [];
        // foreach ($validated['studentsList'] as $student) {
        //     // If $student is just an ID, use: $syncData[$student] = [];
        //     // If $student is an array with metadata:
        //     $syncData[$student] = [
        //         'practice_time' => $student['practice_time'] ?? null,
        //         // 'role' => $student['role'] ?? 'player',
        //     ];
        // }

        // // Sync participants
        // $event->participants()->sync($syncData);

        // return $this->sendResponse('Success', 'Participants synced successfully.');


        // foreach ($validated['studentsList'] as $student) {
        //     $events = EventParticipant::updateOrCreate(
        //         [
        //             'event_id' => $validated['eventid'],
        //             'student_id' => $student,
        //         ],
        //         [

        //             'practice_time' => $validated['practiceTime'] ?? null,
        //             // 'role' => $student['role'] ?? 'player',
        //         ]
        //     );
        // }

        // if ($events) {
        //     return $this->sendResponse('Success', 'Participants saved successfully.');
        // } else {
        //     return $this->sendError('Error.', ['error' => 'error occured']);
        // }


        // return response()->json(['message' => 'Participants saved successfully.']);
    }


    /**
     * Display the specified resource.
     */
    public function show(EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function remove(Request $request)
    {
        $validated = $request->validate([
            'eventid' => 'required|exists:events,id',
            'studentid' => 'required',
        ]);

        $event = Event::findOrFail($validated['eventid']);

        $detach = $event->participants()->detach($validated['studentid']);

        if ($detach) {
            return $this->sendResponse('Success', 'Participant removed successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventParticipant $eventParticipant)
    {
        //
    }
}
