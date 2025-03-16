<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Staff;
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
        $user = User::findorFail($id);
        // return response()->json($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete());
        if ($user->tokens()->where('personal_access_tokens.name', $tokenName)->delete()) {
            return response()->json('success');

        } else {
            return response()->json('failed');

        }

    }
}
