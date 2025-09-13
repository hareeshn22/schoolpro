<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Principal;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
use Hash;

class LoginController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $principal = Principal::where('username', $request->username)->first();

        if ($principal && Hash::check($request->password, $principal->password)) {
            $tokenName = Carbon::now()->format('Y-m-d-H-i-s');
            $token = $principal->createToken($tokenName)->plainTextToken;

            $success['token'] = $token;
            $success['name'] = $principal->name;
            $success['user'] = $principal;
            $success['school'] = School::find($principal->school_id);
            $success['tName'] = $tokenName;

            return $this->sendResponse($success, 'Principal login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }


        // $user = auth()->guard('principal')->user();

        // if (Auth::guard('principal')->attempt(['username' => $request->username, 'password' => $request->password])) {

        //     $user = Auth::guard('principal')->user();

        //     $tokenName = Carbon::now()->format('Y-m-d-H-i-s');

        //     $token = $user->createToken($tokenName)->plainTextToken;
        //     $success['token'] = $token;
        //     $success['name'] = $user->name;
        //     $success['user'] = $user;
        //     $success['tName'] = $tokenName;

        //     return $this->sendResponse($success, 'Principal login successfully.');
        // } else {
        //     return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        // }

    }

    public function logout(Request $request)
    {

        $id = $request->id;
        // $tokenId = $request->token;
        $tokenName = $request->tName;
        $user = Principal::findorFail($id);
        // return response()->json($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete());
        if ($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete()) {
            return response()->json('success');

        } else {
            return response()->json('failed');

        }

    }

    public function teachlogin(Request $request)
    {

        // $user = auth()->guard('principal')->user();

        if (Auth::guard('teacher')->attempt(['username' => $request->username, 'password' => $request->password])) {

            $user = Auth::guard('teacher')->user();

            $tokenName = Carbon::now()->format('Y-m-d-H-i-s');

            $token = $user->createToken($tokenName)->plainTextToken;
            $success['token'] = $token;
            $success['name'] = $user->first_name;
            $success['user'] = $user;
            $success['tName'] = $tokenName;
            $success['subject'] = $user->subject->name;
            $success['subject_id'] = $user->subject_id;
            $success['courses'] = $user->courses()->get();
            $success['school'] = School::find($user->school_id);
            // $success['school'] = $user->school;

            return $this->sendResponse($success, 'Teacher login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }

    }

    public function teachlogout(Request $request)
    {

        $id = $request->id;
        // $tokenId = $request->token;
        $tokenName = $request->tName;
        $user = Teacher::findorFail($id);
        // return response()->json($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete());
        if ($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete()) {
            return response()->json('success');

        } else {
            return response()->json('failed');

        }

    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function guardlogin(Request $request)
    {

        // $user = auth()->guard('principal')->user();

        if (Auth::guard('guardian')->attempt(['username' => $request->username, 'password' => $request->password])) {

            $user = Auth::guard('guardian')->user();

            $tokenName = Carbon::now()->format('Y-m-d-H-i-s');

            $token = $user->createToken($tokenName)->plainTextToken;

            $courseid = Student::find($user->student_id)->course_id;
            $success['token'] = $token;
            $success['name'] = $user->first_name;
            $success['user'] = $user;
            $success['tName'] = $tokenName;
            $success['courseid'] = $courseid;

            return $this->sendResponse($success, 'Parent login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }

    }

    public function guardlogout(Request $request)
    {

        $id = $request->id;
        // $tokenId = $request->token;
        $tokenName = $request->tName;
        $user = Guardian::findorFail($id);
        // return response()->json($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete());
        if ($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete()) {
            return response()->json('success');

        } else {
            return response()->json('failed');

        }

    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function studentlogin(Request $request)
    {

        // $user = auth()->guard('principal')->user();

        $student = Student::where('username', $request->username)->first();

        if (!$student || !Hash::check($request->password, $student->password)) {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }


        // if (! $student || ! Hash::check($request->password, $student->password)) {

        $user = $student;

        $tokenName = Carbon::now()->format('Y-m-d-H-i-s');

        $token = $user->createToken($tokenName)->plainTextToken;

        $courseid = Student::find($user->id)->course_id;
        $success['token'] = $token;
        $success['name'] = $user->first_name;
        $success['user'] = $user;
        $success['tName'] = $tokenName;
        $success['courseid'] = $courseid;

        return $this->sendResponse($success, 'Student login successfully.');
        // } else {
        //     return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        // }

    }

    public function studentlogout(Request $request)
    {

        $id = $request->id;
        // $tokenId = $request->token;
        $tokenName = $request->tName;
        $user = Student::findorFail($id);
        // return response()->json($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete());
        if ($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete()) {
            return response()->json('success');

        } else {
            return response()->json('failed');

        }

    }

}
