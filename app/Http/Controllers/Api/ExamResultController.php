<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\ExamResultResource;
use App\Models\Exam;
use App\Models\ExamResult;
use Illuminate\Http\Request;

class ExamResultController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($eid, $sid)
    {
        //
        return ExamResultResource::collection(ExamResult::where('exam_id', '=', $eid)->where('subject_id', '=', $sid)->get());
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
        $exam = Exam::find($request->examid);
        $results = $request->examResults;

        foreach ((array) $results as $item) {
            
            $main = [
                'exam_id' => $item["exam_id"],
                'student_id' => $item['student_id'],
                'subject_id' => $item["subject_id"],
            ];

            $data = [
                'exam_id' => $item["exam_id"],
                'student_id' => $item['student_id'],
                'subject_id' => $item["subject_id"],
                'marks'   => $item['marks'],
            ];

            $results = ExamResult::firstOrNew($main,$data);
            $results->marks = $item['marks'];
            $results->save();
        }

        if ($results) {
            return $this->sendResponse('Success', 'ExamResult added successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(ExamResult $examResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamResult $examResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamResult $examResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamResult $examResult)
    {
        //
    }
}
