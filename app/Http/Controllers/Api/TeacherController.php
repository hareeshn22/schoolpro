<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        return TeacherResource::collection(Teacher::where('school_id', '=', $id)->get());

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
        $pattern    = " ";
        $firstPart  = strstr(strtolower($request->firstName), $pattern, true);
        $secondPart = substr(strstr(strtolower($request->lastName), $pattern, false), 0, 3);
        $thirdPart  = strstr(strtolower($request->address), $pattern, true);
        $nrRand     = rand(0, 100);

        $username = trim($firstPart) . trim($secondPart) . trim($nrRand);

        $teacher = Teacher::create([
            'school_id'  => $request->schoolId,
            'first_name' => $request->firstName,
            'last_name'  => $request->lastName,
            'birthdate'  => $request->birthdate,
            'subject_id' => $request->subjectId,
            'qualify'    => $request->qualify,
            'gender'     => $request->gender,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'username'   => $username,
            'password'   => $username,
        ]);

        if ($teacher) {
            return $this->sendResponse('Success', 'Teacher created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return TeacherResource::collection(Teacher::where('id', '=', $id)->get());

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $teacher = Teacher::find(intval($request->id));


        $teacher->first_name  = $request->firstName;
        $teacher->last_name   = $request->lastName;
        $teacher->subject_id  = $request->subjectId;
        $teacher->qualify     = $request->qualify;
        $teacher->phone       = $request->phone;
        $teacher->email       = $request->email;
        $teacher->birthdate   = $request->birthdate;
        // $teacher->father_name = $request->fatherName;
        $teacher->gender      = $request->gender;
        $teacher->address     = $request->address;

        if ($teacher->save()) {
            return $this->sendResponse('Success', 'Teacher updated successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    public function random_username($string)
    {
        $pattern    = " ";
        $firstPart  = strstr(strtolower($string), $pattern, true);
        $secondPart = substr(strstr(strtolower($string), $pattern, false), 0, 3);
        $nrRand     = rand(0, 100);

        $username = trim($firstPart) . trim($secondPart) . trim($nrRand);
        return $username;
    }

}
