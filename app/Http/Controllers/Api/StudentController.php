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
        return StudentResource::collection(Student::where('school_id', '=', $id)->with('guardian')->get());

    }

    /**
     * Display a listing of the students with school, class filter.
     */
    public function studentsbys($sid, $cid)
    {
        //
        return StudentResource::collection(Student::where('school_id', '=', $sid)->where('course_id', '=', $cid)->with('guardian')->get());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function studentsinfo($cid)
    {
        //  return StudentResource::collection();
        $students = Student::where('course_id', '=', $cid)->count();
        $mstudents = Student::where('course_id', '=', $cid)->where('gender', '=', 'male')->count();
        $fstudents = Student::where('course_id', '=', $cid)->where('gender', '=', 'female')->count();
        $data['total'] = $students;
        $data['boys']  = $mstudents;
        $data['girls'] = $fstudents;

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        $pattern = " ";
        $firstPart = strstr(strtolower($request->firstName), $pattern, true);
        $secondPart = substr(strstr(strtolower($request->lastName), $pattern, false), 0, 3);
        $thirdPart = strstr(strtolower($request->address), $pattern, true);
        $nrRand = rand(0, 100);

        //
        $username = trim($firstPart) . trim($secondPart) . trim($nrRand);

        $student = Student::create([
            'school_id' => $request->schoolId,
            'course_id' => $request->courseId,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'photo' => $name,
            'birthdate' => $request->birthdate,
            'father_name' => $request->fatherName,
            'gender' => $request->gender,
            'roll_no' => $request->rollNo,
            'address' => $request->address,
        ]);
        if ($student) {
            $student->guardian()->create([
                'school_id' => $request->schoolId,
                'first_name' => $request->fatherName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'username' => $username,
                'password' => $username . $student->id,
                'phone' => $request->phone,
            ]);
        }

        if ($student) {
            return $this->sendResponse('Success', 'Student created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return StudentResource::collection(Student::where('id', '=', $id)->with('guardian')->get());

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
        $student = Student::find(intval($request->id));

        if ($request->snapImg) {
            $image_path = 'uploads/' . $student->photo;
            $larpath = 'uploads/large/' . $student->photo;

            if (File::exists($image_path)) {
                File::delete($image_path);
                File::delete($larpath);
            }

            $name = $request->file('snapImg')->getClientOriginalName();

            $file = $request->snapImg->move(public_path('uploads/'), $name);
            $thumbpath = "uploads/thumb/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 100)->save(public_path($thumbpath . $name));

            $smpath = "uploads/small/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 200)->save(public_path($smpath . $name));

            $larpath = "uploads/large/";
            ImageManager::gd()->read($file->getRealPath())->scale(height: 470)->save(public_path($larpath . $name));

        }

        $student->first_name = $request->firstName;
        $student->last_name = $request->lastName;
        if ($request->snapImg) {
            $student->photo = $name;
        } else {
            // $student->photo = $student->photo;
        }
        // $student->photo       = $request->photo;

        $student->birthdate = $request->birthdate;
        $student->father_name = $request->fatherName;
        $student->gender = $request->gender;
        // $student->code        = $request->code;
        // $student->status      = $request->status;
        $student->roll_no = $request->rollNo;
        $student->address = $request->address;
        // $student->school_id   = $request->schoolId;
        // $student->course_id   = $request->courseId;

        if ($student->save()) {
            return $this->sendResponse('Success', 'Student Updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
