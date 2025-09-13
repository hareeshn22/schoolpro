<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\ExamSyllabusResource;

use App\Models\Exam;
use App\Models\ExamSyllabus;
use Illuminate\Http\Request;

class ExamSyllabusController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($eid, $sid)
    {
        //
        return ExamSyllabusResource::collection(ExamSyllabus::where('exam_id', '=', $eid)->where('subject_id', '=', $sid)->get());
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
        $syllabus = ExamSyllabus::create([
            'school_id' => $request->schoolid,
            // 'teacher_id' => $request->teacherId,
            'course_id' => $request->courseid,
            'subject_id' => $request->subjectid,
            'exam_id' => $request->examid,
            'name' => $request->lesson,
            // 'review' => $request->review,
        ]);

        if ($syllabus) {
            return $this->sendResponse('Success', 'Exam Syllabus created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
        //     $marks = $item['marks'];
        //     $permarks = ($marks / $exam->maxmarks) * 100;

        //     if ($permarks >= 90) {
        //         $grade = 'A+';
        //     } elseif ($permarks >= 80) {
        //         $grade = 'A';
        //     } elseif ($permarks >= 70) {
        //         $grade = 'B+';
        //     } elseif ($permarks >= 60) {
        //         $grade = 'B';
        //     } elseif ($permarks >= 50) {
        //         $grade = 'C';
        //     } elseif ($permarks >= 35) {
        //         $grade = 'D';
        //     } else {
        //         $grade = 'F';
        //     }

        //     $main = [
        //         'exam_id' => $item["exam_id"],
        //         'student_id' => $item['student_id'],
        //         'subject_id' => $item["subject_id"],
        //     ];

        //     $data = [
        //         'exam_id' => $item["exam_id"],
        //         'student_id' => $item['student_id'],
        //         'subject_id' => $item["subject_id"],
        //         'marks' => $item['marks'],
        //         'grade' => $grade,
        //     ];

        //     $results = ExamSyllabus::firstOrNew($main, $data);
        //     $results->marks = $item['marks'];
        //     $results->grade = $grade;
        //     $results->save();
        // }


        // if ($results) {
        //     return $this->sendResponse('Success', 'ExamResult added successfully.');
        // } else {
        //     return $this->sendError('Error.', ['error' => 'error occured']);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamSyllabus $examSyllabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamSyllabus $examSyllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamSyllabus $examSyllabus)
    {
        //
    }

     /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
         $examsyllabus = ExamSyllabus::find($id);

        if ($examsyllabus->delete()) {
            return $this->sendResponse('Success', 'Exam Syllabus deleted successfully.');
        } else {
            return $this->sendError('Error', ['error' => 'error occured']);
        }
    }
}
