<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\EventHighlightResource;
use App\Models\Event;

use App\Models\EventHighlight;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventHighlightController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid)
    {
        //
        return EventHighlightResource::collection(EventHighlight::where('event_id', '=', $sid)->get());
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
        $highlights = $request->input('highlights');

        if (!is_array($highlights)) {
            return $this->sendError('Invalid data.', ['error' => 'highlights must be an array']);
        }

        $created = [];

        foreach ($highlights as $highlight) {
            $created[] = EventHighlight::create([
                // 'school_id' => $request->schoolid ?? null,
                'event_id' => $highlight['event_id'],
                'content' => $highlight['content'],
            ]);
        }

        if (count($created) > 0) {
            return $this->sendResponse('Success', 'EventHighlights created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'No highlights created']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(EventHighlight $eventHighlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventHighlight $eventHighlight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventHighlight $eventHighlight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventHighlight $eventHighlight)
    {
        //
    }
}
