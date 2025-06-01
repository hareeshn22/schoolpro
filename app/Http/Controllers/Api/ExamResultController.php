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
     * Display a listing of the resource.
     */
    public function resultbyexam($eid)
    {
        //
        $results = ExamResultResource::collection(ExamResult::where('exam_id', '=', $eid)->get());

        // Convert to Laravel collection for easier manipulation
        // $collection = collect($results);

        // return $collection;
        $customOrder = ["A+", "A", "B+", "B", "C", "D", "F"];


        // Group by subject and grade, then count occurrences
        $groupedData = collect($results)->groupBy('subject')->map(function ($subjectGroup) use ($customOrder) {
            return [
                "subject" => $subjectGroup->first()->subject->name, // Explicitly including subject name
                "grades" => $subjectGroup->groupBy('grade')->map(function ($gradeGroup) {
                    return [
                        'grade' => $gradeGroup->first()->grade,
                        'count' => $gradeGroup->count(),
                    ];
                })->values()->sortBy(function ($item) use ($customOrder) {
                    return array_search($item['grade'], $customOrder);
                })->values()->all(),

            ];
        })->values()->all();


        return $groupedData;

    }


    /**
     * Display a listing of the resource.
     */
    public function resultsbyst($eid, $sid)
    {
        //
        return ExamResultResource::collection(ExamResult::where('exam_id', '=', $eid)->where('student_id', '=', $sid)->get());
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
            $marks = $item['marks'];
            $permarks = ($marks/$exam->maxmarks) * 100;
          
            if ($permarks >= 90) {
               $grade = 'A+';
            } elseif ($permarks >= 80) {
                $grade = 'A';
            } elseif ($permarks >= 70) {
               $grade = 'B+';
            } elseif ($permarks >= 60) {
                $grade = 'B';
            }elseif ($permarks >= 50) {
                $grade = 'C';
            } elseif ($permarks >= 35) {
                $grade = 'D';
            }else {
                $grade = 'F';
            }

            $main = [
                'exam_id' => $item["exam_id"],
                'student_id' => $item['student_id'],
                'subject_id' => $item["subject_id"],
            ];

            $data = [
                'exam_id' => $item["exam_id"],
                'student_id' => $item['student_id'],
                'subject_id' => $item["subject_id"],
                'marks' => $item['marks'],
                'grade' => $grade,
            ];

            $results = ExamResult::firstOrNew($main, $data);
            $results->marks = $item['marks'];
            $results->grade = $grade;
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
