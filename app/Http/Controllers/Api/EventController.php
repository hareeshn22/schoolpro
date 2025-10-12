<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid)
    {
        //
        return EventResource::collection(Event::where('sport_id', '=', $sid)->get());
    }

    /**
     * Display a listing of the resource.
     */
    public function eventbys($sid)
    {
        //
        return EventResource::collection(Event::where('sport_id', '=', $sid)->where('event_date', '=', Carbon::today())->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getStudentEvents(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'school_id' => 'required|integer|exists:schools,id',
            'category' => 'required|string|in:sports,social arts,daily need',
        ]);

        $studentId = $request->student_id;
        $schoolId = $request->school_id;
        $category = $request->category;
        $today = Carbon::today()->toDateString();

        // Get sports the student is enrolled in
        $student = Student::with('sports')->findOrFail($studentId);
        $sportIds = $student->sports->pluck('id');

        // Fetch today's events for those sports, filtered by school + category
        $events = Event::with([
            'participants.student',
            'notes',
            'highlights',
            'sport'
        ])
            ->where('school_id', $schoolId)
            ->whereDate('event_date', $today)
            ->whereIn('sport_id', $sportIds)
            ->whereHas('sport', function ($q) use ($category) {
                $q->where('category', $category);
            })
            ->get()
            ->map(function ($event) {
                // Group notes by type
                $groupedNotes = [
                    'performance' => $event->notes->where('note_type', 'performance')->pluck('content')->values(),
                    'remark' => $event->notes->where('note_type', 'remark')->pluck('content')->values(),
                    'suggestion' => $event->notes->where('note_type', 'suggestion')->pluck('content')->values(),
                ];

                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'event_date' => $event->event_date,
                    'sport' => [
                        'id' => $event->sport->id,
                        'name' => $event->sport->name,
                        // 'category' => $event->sport->category,
                    ],
                    'participants' => $event->participants->map(function ($p) {
                        return [
                            'id' => $p->id,
                            'student_id' => $p->student_id,
                            'practice_time' => $p->practice_time,
                            'student' => $p->student ? $p->student->only(['id', 'name']) : null,
                        ];
                    }),
                    'notes' => $groupedNotes,
                    'highlights' => $event->highlights->pluck('content'),
                ];
            });

        return response()->json([
            'student_id' => $studentId,
            'school_id' => $schoolId,
            'category' => $category,
            'date' => $today,
            'events' => $events
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $event = Event::create([
            'school_id' => $request->schoolid,
            'sport_id' => $request->sportid,
            'title' => $request->title,
            'event_date' => Carbon::now(),
            'maxmarks' => $request->maxmarks,
        ]);

        if ($event) {
            return $this->sendResponse('Success', 'Event created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
