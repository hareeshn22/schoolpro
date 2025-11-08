<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Http\Resources\CompetitionResource;
use App\Models\Student;
use App\Models\School;
use Carbon\Carbon;
use Intervention\Image\ImageManager;

class CompetitionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($sid)
    {
        $school = School::find($sid); // Replace with actual school ID
        $competitions = $school->competitions()->latest('event_datetime')->get();
        return CompetitionResource::collection($competitions);
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
         if ($request->snapImg != null) {

            $name = $request->snapImg->getClientOriginalName();

            $file = $request->snapImg->move(public_path('uploads/'), $name);

            $thumbpath = "uploads/thumb/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 100)->save(public_path($thumbpath . $name));

            $smpath = "uploads/small/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 200)->save(public_path($smpath . $name));

            $larpath = "uploads/large/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 470)->save(public_path($larpath . $name));
        } else {
            $name = '';
        }

        $competition = Competition::create([
            'school_id' => $request->schoolid,
            'event_name' => $request->name,
            'event_datetime' => $request->eventdate,
            'event_place' => $request->eventplace,
            'participation_method' => $request->method,
            'participation_category' => $request->category,
            'gender' => $request->gender,
            'official_sponsor' => $request->sponsor,
            'photo_path' => $name,
            'last_date_for_entries' => $request->lastdate,
        ]);
        if ($competition) {
            $competition->schools()->attach([$request->schoolid, 2, 3]);
        }

        if ($competition) {
            return $this->sendResponse('Success', 'Competition created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition $competition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competition $competition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition $competition)
    {
        //
    }
}
