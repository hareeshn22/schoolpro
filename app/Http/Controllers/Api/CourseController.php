<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Teacher;

class CourseController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        // $success =
        return CourseResource::collection(Course::where('school_id', '=', $id)->get());
        // return $this->sendResponse($success, 'Data Fetched successfully.');
    }

    /**
     * Display courses by teacher.
     */
    public function coursebyt($id)
    {
        //
        $teacher = Teacher::find($id);
        return  CourseResource::collection($teacher->courses()->get());
        // return $this->sendResponse($success, 'Data Fetched successfully.');
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
        $course = Course::create([
            'school_id' => $request->schoolid,
            'name'      => $request->name,
        ]);

        if ($course) {
            return $this->sendResponse('Success', 'Course created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $course = Course::find($request->id);

        $course->school_id = $request->schoolid;
        $course->name      = $request->name;

        if ($course->save()) {
            return $this->sendResponse('Success', 'Course Updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        if ($course->delete()) {
            return $this->sendResponse('Success', 'Course deleted successfully.');
        } else {
            return $this->sendError('Error', ['error' => 'error occured']);
        }

    }
}
