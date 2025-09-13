<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, $cid, $sid)
    {
         return LessonResource::collection(Lesson::where('school_id', '=', $id)->where('course_id', '=', $cid)->where('subject_id', '=', $sid)->get());
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
        $lesson = Lesson::create([
            'school_id' => $request->schoolId,
            'teacher_id' => $request->teacherId,
            'course_id' => $request->courseId,
            'subject_id' => $request->subjectId,
            'name' => $request->name,
            'review' => $request->review,
        ]);

        if ($lesson) {
            return $this->sendResponse('Success', 'Lesson created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
         $lesson = Lesson::find($id);

        if ($lesson->delete()) {
            return $this->sendResponse('Success', 'Lesson deleted successfully.');
        } else {
            return $this->sendError('Error', ['error' => 'error occured']);
        }
    }
}
