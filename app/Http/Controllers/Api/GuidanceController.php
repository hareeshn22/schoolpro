<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\ExamFeedbackResource;

use App\Models\Exam;
use App\Models\ExamFeedback;
use App\Models\Guidance;
use Illuminate\Http\Request;

class GuidanceController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // $guidance = Guidance::create([
        //     'school_id' => $request->schoolid,
        //     'course_id' => $request->courseId,
        //     'homework_id' => $request->workid,
        //     'suggestions' => $request->suggestions,
        //     'notes' => $request->notes,
        // ]);
        $guidance = Guidance::updateOrCreate(
            [
                'school_id' => $request->schoolid,
                'course_id' => $request->courseid,
                'homework_id' => $request->workid,
            ],
            [
                'suggestions' => $request->suggestions,
                'notes' => $request->notes,
            ]
        );


        if ($guidance) {
            return $this->sendResponse('Success', 'Guidance created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Guidance $guidance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guidance $guidance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guidance $guidance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guidance $guidance)
    {
        //
    }
}
