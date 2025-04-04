<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class StudentController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        return StudentResource::collection(Student::where('school_id', '=', $id)->get());

    }

    /**
     * Display a listing of the students with school, class filter.
     */
    public function studentsbys($sid, $cid)
    {
        //
        return StudentResource::collection(Student::where('school_id', '=', $sid)->where('course_id', '=', $cid)->get());

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
        $name = $request->snapImg->getClientOriginalName();

        $file = $request->snapImg->move(public_path('uploads/'), $name);

        $thumbpath = "uploads/thumb/";
        ImageManager::gd()->read($file->getRealPath())->scale(height: 100)->save(public_path($thumbpath . $name));

        $smpath = "uploads/small/";
        ImageManager::gd()->read($file->getRealPath())->scale(height: 200)->save(public_path($smpath . $name));

        $larpath = "uploads/large/";
        ImageManager::gd()->read($file->getRealPath())->scale(height: 470)->save(public_path($larpath . $name));

        //
        $student = Student::create([
            'school_id'   => $request->schoolId,
            'course_id'   => $request->courseId,
            'first_name'  => $request->firstName,
            'last_name'   => $request->lastName,
            'photo'       => $name,
            'birthdate'   => $request->birthdate,
            'father_name' => $request->fatherName,
            'gender'      => $request->gender,
            'roll_no'     => $request->rollNo,
            'address'     => $request->address,
        ]);

        if ($student) {
            return $this->sendResponse('Success', 'Student created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
