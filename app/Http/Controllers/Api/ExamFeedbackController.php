<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\ExamFeedbackResource;

use App\Models\Exam;
use App\Models\ExamFeedback;
use Illuminate\Http\Request;

class ExamFeedbackController extends BaseController
{
   /**
     * Display a listing of the resource.
     */
    public function index($eid, $sid)
    {
        //
        return ExamFeedbackResource::collection(ExamFeedback::where('exam_id', '=', $eid)->where('subject_id', '=', $sid)->get());
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
        $feedback = ExamFeedback::create([
            'school_id' => $request->schoolid,
            // 'teacher_id' => $request->teacherId,
            'course_id' => $request->courseid,
            'subject_id' => $request->subjectid,
            'student_id' => $request->studentid,
            'exam_id' => $request->examid,
            'feedback' => $request->feedback,
            // 'review' => $request->review,
        ]);

        if ($feedback) {
            return $this->sendResponse('Success', ' Message sent successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamFeedback $examFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamFeedback $examFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamFeedback $examFeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamFeedback $examFeedback)
    {
        //
    }
}
