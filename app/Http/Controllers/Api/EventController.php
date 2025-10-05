<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\EventResource;
use App\Models\Event;
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
        return EventResource::collection(Event::where('sport_id', '=', $sid)->where('event_date','=', Carbon::today())->get());
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
