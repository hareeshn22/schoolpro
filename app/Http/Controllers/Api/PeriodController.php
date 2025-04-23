<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\PeriodResource;
use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        return PeriodResource::collection(Period::where('school_id', '=', $id)->get());
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
        $period = Period::create([
            'school_id'  => $request->schoolid,
            'name'       => $request->name,
            'start_time' => $request->startTime,
            'end_time'   => $request->endTime,
        ]);

        if ($period) {
            return $this->sendResponse('Success', 'Period created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Period $period)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $period = Period::find($request->id);

        // $subject->school_id = $request->schoolid;
        $period->name       = $request->name;
        $period->start_time = $request->startTime;
        $period->end_time   = $request->endTime;

        if ($period->save()) {
            return $this->sendResponse('Success', 'Period Updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Period $period)
    {
        //
    }
}
