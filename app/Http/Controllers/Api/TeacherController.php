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
        $firstPart  = strstr(strtolower(    $request->firstName), $pattern, true);
        $secondPart = substr(strstr(strtolower($request->lastName), $pattern, false), 0, 3);
        $thirdPart  = strstr(strtolower($request->address), $pattern, true);
        $nrRand     = rand(0, 100);

        $username = trim($firstPart) . trim($secondPart) . trim($nrRand);

        $teacher = Teacher::create([
            'school_id'   => $request->schoolId,
            'first_name'  => $request->firstName,
            'last_name'   => $request->lastName,
            'birthdate'   => $request->birthdate,
            'subject_id'  => $request->subjectId,
            'qualify'     => $request->qualify,
            'gender'      => $request->gender,
            'address'     => $request->address,
            'phone'       => $request->phone,
            'email'       => $request->firstName . '@gmail.com',
            'username'    => $username,
            'password'    => $username,
        ]);

        if ($teacher) {
            return $this->sendResponse('Success', 'Student created successfully.');
        } else {
            return $this->sendError('Error.', ['error' => 'error occured']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
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
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    function random_username($string)
    {
        $pattern    = " ";
        $firstPart  = strstr(strtolower($string), $pattern, true);
        $secondPart = substr(strstr(strtolower($string), $pattern, false), 0, 3);
        $nrRand     = rand(0, 100);

        $username = trim($firstPart) . trim($secondPart) . trim($nrRand);
        return $username;
    }

}
