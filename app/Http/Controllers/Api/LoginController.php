<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Principal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;

class LoginController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        
        // $user = auth()->guard('principal')->user();

        if (Auth::guard('principal')->attempt(['username' => $request->username, 'password' => $request->password])) {
           
            $user = Auth::guard('principal')->user();

            $tokenName = Carbon::now()->format('Y-m-d-H-i-s');

            $token = $user->createToken($tokenName)->plainTextToken;
            $success['token'] = $token;
            $success['name'] = $user->name;
            $success['user'] = $user;
            $success['tName'] = $tokenName;

            return $this->sendResponse($success, 'Principal login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }

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

}
