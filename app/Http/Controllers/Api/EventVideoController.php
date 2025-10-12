<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\EventVideoResource;
use App\Models\Event;
use App\Models\EventVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EventVideoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid)
    {
        //
        return EventVideoResource::collection(EventVideo::where('event_id', '=', $sid)->get());
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
         $highlight = EventVideo::create([
            // 'school_id' => $request->schoolid ?? null,
            'event_id' => $request->eventid,
            'title' => $request->input('title'),
            'url' => $request->input('video'),
        ]);

        if ($highlight) {
            return $this->sendResponse('Success', 'Videos created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'No Videos created']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
