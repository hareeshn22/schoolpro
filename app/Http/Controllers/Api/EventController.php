<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Student;
use App\Models\Sport;
use App\Models\SportTimetable;
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
        return EventResource::collection(Event::where('sport_id', '=', $sid)->orderByDesc('id')->get());
    }

    /**
     * Display a listing of the resource.
     */
    public function eventbys($sid)
    {
        //
        return EventResource::collection(Event::where('sport_id', '=', $sid)->where('event_date', '=', Carbon::today())->orderByDesc('id')->get());
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

        $student = Student::with('sports')->findOrFail($studentId);
        $sportIds = $student->sports->pluck('id');
        // $sport = Sport::with('trainers')->find($sportIds[0]);
        // dd($sport->trainers);


        $sports = Event::with([
            'participants',
            'notes' => fn($q) => $q->where('student_id', $studentId),
            'highlights',
            'videos',
            'sport.trainers'
        ])
            ->where('school_id', $schoolId)
            ->whereDate('event_date', $today)
            ->whereIn('sport_id', $sportIds)
            ->whereHas('sport', fn($q) => $q->where('category', $category))
            ->get()
            ->map(function ($event) {
                $groupedNotes = [
                    'performance' => $event->notes->where('note_type', 'performance')->pluck('content')->values(),
                    'remark' => $event->notes->where('note_type', 'remark')->pluck('content')->values(),
                    'suggestion' => $event->notes->where('note_type', 'suggestion')->pluck('content')->values(),
                ];

                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'event_date' => $event->event_date,
                    'sport_id' => $event->sport->id,
                    'sport_name' => $event->sport->name,
                    'trainers' => $event->sport->trainers->map(fn($trainer) => $trainer->first_name . ' ' . $trainer->last_name),
                    'participants' => $event->participants->map(function ($student) {
                        return [
                            'id' => $student->id,
                            'student_id' => $student->id,
                            'practice_time' => $student->pivot->practice_time ?? null,
                            'student' => $student->first_name . ' ' . $student->last_name,
                        ];
                    }),
                    'notes' => $groupedNotes,
                    'highlights' => $event->highlights->pluck('content'),
                    'videos' => $event->videos->map(fn($video) => [
                        'title' => $video->title,
                        'url' => $video->url,
                    ]),
                ];
            })
            ->groupBy('sport_id')
            ->map(function ($group, $sportId) {
                return [
                    'sport_id' => $sportId,
                    'sport_name' => $group->first()['sport_name'],
                    'trainers' => $group->first()['trainers'],
                    'events' => $group->values(),
                ];
            })
            ->values();

        return response()->json([
            'student_id' => intval($studentId),
            'school_id' => intval($schoolId),
            'category' => $category,
            'date' => $today,
            'sports' => $sports
        ]);
    }

    // Get Registered Events 
    public function getTodayRegisteredEvents(Request $request)
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

        // Step 1: Get sports registered by the student and filter by category
        $student = Student::with(['sports' => fn($q) => $q->where('category', $category)])
            ->findOrFail($studentId);

        $registeredSportIds = $student->sports->pluck('id');

        // Step 2: Get today's events for those sports
        $events = Event::with([
            'participants',
            'videos',
            'sport.trainers'
        ])
            ->where('school_id', $schoolId)
            ->whereDate('event_date', $today)
            ->whereIn('sport_id', $registeredSportIds)
            ->get()
            ->map(function ($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->title,
                    'event_date' => $event->event_date,
                    'sport_id' => $event->sport->id,
                    'sport_name' => $event->sport->name,
                    'trainers' => $event->sport->trainers->map(fn($trainer) => $trainer->first_name . ' ' . $trainer->last_name),
                    'participants' => $event->participants->map(function ($student) {
                        return [
                            'id' => $student->id,
                            'student_id' => $student->id,
                            'practice_time' => $student->pivot->practice_time ?? null,
                            'student' => $student->first_name . ' ' . $student->last_name,
                        ];
                    }),
                    'videos' => $event->videos->map(fn($video) => [
                        'title' => $video->title,
                        'url' => $video->url,
                    ]),
                ];
            });

        // Step 3: Get timetable from sport_timetables table
        $timetable = SportTimetable::where('school_id', $schoolId)
            ->whereIn('sport_id', $registeredSportIds)
            ->orderByRaw("FIELD(day_of_week, 'monday','tuesday','wednesday','thursday','friday','saturday','sunday')")
            ->get()
            ->map(function ($row) {
                return [
                    'sport_id' => $row->sport_id,
                    'day' => ucfirst($row->day_of_week),
                    'start_time' => Carbon::parse($row->start_time)->format('g:i A'),
                    'end_time' => Carbon::parse($row->end_time)->format('g:i A'),
                ];
            })
            ->groupBy('sport_id');

        // Step 4: Merge events and timetable by sport
        $sports = $events
            ->groupBy('sport_id')
            ->map(function ($group, $sportId) use ($timetable) {
                return [
                    'sport_id' => $sportId,
                    'sport_name' => $group->first()['sport_name'],
                    'trainers' => $group->first()['trainers'],
                    'events' => $group->values(),
                    'timetable' => $timetable[$sportId]?->values() ?? [],
                ];
            })
            ->values();

        return response()->json([
            'student_id' => intval($studentId),
            'school_id' => intval($schoolId),
            'category' => $category,
            'date' => $today,
            'sports' => $sports,
        ]);
    }
    // public function getTodayRegisteredEvents(Request $request)
    // {
    //     $request->validate([
    //         'student_id' => 'required|integer|exists:students,id',
    //         'school_id' => 'required|integer|exists:schools,id',
    //         'category' => 'required|string|in:sports,social arts,daily need',
    //     ]);

    //     $studentId = $request->student_id;
    //     $schoolId = $request->school_id;
    //     $category = $request->category;
    //     $today = Carbon::today()->toDateString();

    //     // Step 1: Get sports registered by the student and filter by category
    //     $student = Student::with(['sports' => fn($q) => $q->where('category', $category)])
    //         ->findOrFail($studentId);

    //     $registeredSportIds = $student->sports->pluck('id');

    //     // Step 2: Get today's events for those sports
    //     $events = Event::with([
    //         'participants',
    //         'notes' => fn($q) => $q->where('student_id', $studentId),
    //         'highlights',
    //         'videos',
    //         'sport.trainers'
    //     ])
    //         ->where('school_id', $schoolId)
    //         ->whereDate('event_date', $today)
    //         ->whereIn('sport_id', $registeredSportIds)
    //         ->get()
    //         ->map(function ($event) use ($studentId) {
    //             $groupedNotes = [
    //                 'performance' => $event->notes->where('note_type', 'performance')->pluck('content')->values(),
    //                 'remark' => $event->notes->where('note_type', 'remark')->pluck('content')->values(),
    //                 'suggestion' => $event->notes->where('note_type', 'suggestion')->pluck('content')->values(),
    //             ];

    //             return [
    //                 'id' => $event->id,
    //                 'title' => $event->title,
    //                 'event_date' => $event->event_date,
    //                 'sport_id' => $event->sport->id,
    //                 'sport_name' => $event->sport->name,
    //                 'trainers' => $event->sport->trainers->map(fn($trainer) => $trainer->first_name . ' ' . $trainer->last_name),
    //                 'participants' => $event->participants->map(function ($student) {
    //                     return [
    //                         'id' => $student->id,
    //                         'student_id' => $student->id,
    //                         'practice_time' => $student->pivot->practice_time ?? null,
    //                         'student' => $student->first_name . ' ' . $student->last_name,
    //                     ];
    //                 }),
    //                 'notes' => $groupedNotes,
    //                 'highlights' => $event->highlights->pluck('content'),
    //                 'videos' => $event->videos->map(fn($video) => [
    //                     'title' => $video->title,
    //                     'url' => $video->url,
    //                 ]),
    //             ];
    //         });

    //     // Step 3: Get timetable for each sport
    //     $timetable = Event::where('school_id', $schoolId)
    //         ->whereIn('sport_id', $registeredSportIds)
    //         ->orderBy('event_date')
    //         ->get()
    //         ->map(function ($event) {
    //             return [
    //                 'sport_id' => $event->sport_id,
    //                 'day' => Carbon::parse($event->event_date)->format('l'),
    //                 'time' => Carbon::parse($event->event_date)->format('g:i A'),
    //                 'title' => $event->title,
    //             ];
    //         })
    //         ->groupBy('sport_id');

    //     // Step 4: Merge events and timetable by sport
    //     $sports = $events
    //         ->groupBy('sport_id')
    //         ->map(function ($group, $sportId) use ($timetable) {
    //             return [
    //                 'sport_id' => $sportId,
    //                 'sport_name' => $group->first()['sport_name'],
    //                 'trainers' => $group->first()['trainers'],
    //                 'events' => $group->values(),
    //                 'timetable' => $timetable[$sportId]?->values() ?? [],
    //             ];
    //         })
    //         ->values();

    //     return response()->json([
    //         'student_id' => intval($studentId),
    //         'school_id' => intval($schoolId),
    //         'category' => $category,
    //         'date' => $today,
    //         'sports' => $sports,
    //     ]);
    // }
    // public function getRegisteredStudentEvents(Request $request)
    // {
    //     $request->validate([
    //         'student_id' => 'required|integer|exists:students,id',
    //     ]);

    //     $studentId = $request->student_id;

    //     $events = Event::with([
    //         'sport.trainers',
    //         'notes' => fn($q) => $q->where('student_id', $studentId),
    //         'highlights',
    //         'videos',
    //     ])
    //         ->whereHas('participants', fn($q) => $q->where('student_id', $studentId))
    //         ->get()
    //         ->map(function ($event) use ($studentId) {
    //             $groupedNotes = [
    //                 'performance' => $event->notes->where('note_type', 'performance')->pluck('content')->values(),
    //                 'remark' => $event->notes->where('note_type', 'remark')->pluck('content')->values(),
    //                 'suggestion' => $event->notes->where('note_type', 'suggestion')->pluck('content')->values(),
    //             ];

    //             return [
    //                 'id' => $event->id,
    //                 'title' => $event->title,
    //                 'event_date' => $event->event_date,
    //                 'sport_id' => $event->sport->id,
    //                 'sport_name' => $event->sport->name,
    //                 'trainers' => $event->sport->trainers->map(fn($trainer) => $trainer->first_name . ' ' . $trainer->last_name),
    //                 'notes' => $groupedNotes,
    //                 'highlights' => $event->highlights->pluck('content'),
    //                 'videos' => $event->videos->map(fn($video) => [
    //                     'title' => $video->title,
    //                     'url' => $video->url,
    //                 ]),
    //             ];
    //         });

    //     return response()->json([
    //         'student_id' => intval($studentId),
    //         'registered_events' => $events,
    //     ]);
    // }

    // public function getStudentEvents(Request $request)
    // {
    //     $request->validate([
    //         'student_id' => 'required|integer|exists:students,id',
    //         'school_id' => 'required|integer|exists:schools,id',
    //         'category' => 'required|string|in:sports,social arts,daily need',
    //     ]);

    //     $studentId = $request->student_id;
    //     $schoolId = $request->school_id;
    //     $category = $request->category;
    //     $today = Carbon::today()->toDateString();

    //     $student = Student::with('sports')->findOrFail($studentId);
    //     $sportIds = $student->sports->pluck('id');

    //     $sports = Event::with([
    //         'participants',
    //         'notes' => fn($q) => $q->where('student_id', $studentId),
    //         'highlights',
    //         'sport'
    //     ])
    //         ->where('school_id', $schoolId)
    //         ->whereDate('event_date', $today)
    //         ->whereIn('sport_id', $sportIds)
    //         ->whereHas('sport', fn($q) => $q->where('category', $category))
    //         ->get()
    //         ->map(function ($event) {
    //             $groupedNotes = [
    //                 'performance' => $event->notes->where('note_type', 'performance')->pluck('content')->values(),
    //                 'remark' => $event->notes->where('note_type', 'remark')->pluck('content')->values(),
    //                 'suggestion' => $event->notes->where('note_type', 'suggestion')->pluck('content')->values(),
    //             ];

    //             return [
    //                 'id' => $event->id,
    //                 'title' => $event->title,
    //                 'event_date' => $event->event_date,
    //                 'sport_id' => $event->sport->id,
    //                 'sport_name' => $event->sport->name,
    //                 'participants' => $event->participants->map(function ($student) {
    //                     return [
    //                         'id' => $student->id,
    //                         'student_id' => $student->id,
    //                         'practice_time' => $student->pivot->practice_time ?? null,
    //                         'student' => $student->first_name . ' ' . $student->last_name,
    //                     ];
    //                 }),
    //                 'notes' => $groupedNotes,
    //                 'highlights' => $event->highlights->pluck('content'),
    //             ];
    //         })
    //         ->groupBy('sport_id')
    //         ->map(function ($group, $sportId) {
    //             return [
    //                 'sport_id' => $sportId,
    //                 'sport_name' => $group->first()['sport_name'],
    //                 'events' => $group->values(),
    //             ];
    //         })
    //         ->values();

    //     return response()->json([
    //         'student_id' => intval($studentId),
    //         'school_id' => intval($schoolId),
    //         'category' => $category,
    //         'date' => $today,
    //         'sports' => $sports
    //     ]);
    //     // return response()->json([$events]);
    // }

    // {
    //     $request->validate([
    //         'student_id' => 'required|integer|exists:students,id',
    //         'school_id' => 'required|integer|exists:schools,id',
    //         'category' => 'required|string|in:sports,social arts,daily need',
    //     ]);

    //     $studentId = $request->student_id;
    //     $schoolId = $request->school_id;
    //     $category = $request->category;
    //     $today = Carbon::today()->toDateString();

    //     $student = Student::with('sports')->findOrFail($studentId);
    //     $sportIds = $student->sports->pluck('id');

    //     $events = Event::with([
    //         'participants',
    //         'notes' => fn($q) => $q->where('student_id', $studentId),
    //         'highlights',
    //         'sport'
    //     ])
    //         ->where('school_id', $schoolId)
    //         ->whereDate('event_date', $today)
    //         ->whereIn('sport_id', $sportIds)
    //         ->whereHas('sport', fn($q) => $q->where('category', $category))
    //         ->get()
    //         ->map(function ($event) {
    //             $groupedNotes = [
    //                 'performance' => $event->notes->where('note_type', 'performance')->pluck('content')->values(),
    //                 'remark' => $event->notes->where('note_type', 'remark')->pluck('content')->values(),
    //                 'suggestion' => $event->notes->where('note_type', 'suggestion')->pluck('content')->values(),
    //             ];

    //             return [
    //                 'id' => $event->id,
    //                 'title' => $event->title,
    //                 'event_date' => $event->event_date,
    //                 'sport' => [
    //                     'id' => $event->sport->id,
    //                     'name' => $event->sport->name,
    //                 ],
    //                 'participants' => $event->participants->map(function ($student) {
    //                     return [
    //                         'id' => $student->id,
    //                         'student_id' => $student->id,
    //                         'practice_time' => $student->pivot->practice_time ?? null,
    //                         'student' => $student->first_name . ' ' . $student->last_name,
    //                     ];
    //                 }),
    //                 'notes' => $groupedNotes,
    //                 'highlights' => $event->highlights->pluck('content'),
    //             ];
    //         });

    //     return response()->json([
    //         'student_id' => intval($studentId),
    //         'school_id' => intval($schoolId),
    //         'category' => $category,
    //         'date' => $today,
    //         'events' => $events
    //     ]);


    // }


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
