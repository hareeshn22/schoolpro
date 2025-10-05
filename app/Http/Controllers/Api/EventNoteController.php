<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\EventNoteResource;
use App\Models\Event;
use App\Models\EventNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EventNoteController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid)
    {
        //
        return EventNoteResource::collection(EventNote::where('event_id', '=', $sid)->get());
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
            'schoolid' => 'required|exists:schools,id',
            'event_id' => 'required|exists:events,id',
            'eventtype' => 'required|in:performance,remark,suggestion,', // extendable later
            'performances' => 'required|array|min:1',
            'performances.*.student_id' => 'nullable|exists:students,id',
            'performances.*.content' => 'required|string',
        ]);


        $notes = [];

        DB::transaction(function () use ($validated, &$notes) {
            foreach ($validated['performances'] as $perf) {
                $notes[] = EventNote::updateOrCreate(
                    [
                        'event_id' => $validated['event_id'],
                        'student_id' => $perf['student_id'] ?? null,
                        'note_type' => $validated['eventtype'], // "performance"
                    ],
                    [
                        'content' => $perf['content'],
                    ]
                );
            }
        });

        if (count($notes) > 0) {
            return $this->sendResponse('Success', $request->eventtype . ' created or updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'No ' . $request->eventtype . ' created']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(EventNote $eventNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventNote $eventNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventNote $eventNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventNote $eventNote)
    {
        //
    }
}
