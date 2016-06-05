<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Metiers\UserServices;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthMobileController extends Controller
{
    protected $userServices;

    public function __construct(UserServices $userServices)
    {
        $this->userServices = $userServices;
    }

    function signin(Request $request)
    {
        ini_set('xdebug.max_nesting_level', 200);

        $credentials = $request->only('email', 'password');
        //return $credentials;
        $user = User::whereEmail($request->input('email'))->get()->first();
        if ($user == null) {
            return response()->json(['response' => 'invalid_user'], 500);
        } else {
            if ($user->valide == 0) {
                return response()->json(['response' => 'inactive_account'], 402);
            } else {
                try {
                    // verify the credentials and create a token for the user
                    if (!$token = JWTAuth::attempt($credentials)) {
                        return response()->json(['response' => 'invalid_credentials'], 401);
                    }

                } catch (JWTException $e) {
                    // something went wrong
                    return response()->json(['response' => 'could_not_create_token'], 500);
                }

                // if no errors are encountered we can return a JWT
                return response()->json(compact('token', 'user'), 200);
            }
        }
    }

    function signup(Request $request)
    {
        $user = User::whereEmail($request->input('email'))->get()->first();
        if ($user == null) {
            return $this->userServices->store($request);
        } else {
            return  response()->json(['response'=>'user exist !'],405);
        }
    }

    function validateEmail($id_user, $validation_code)
    {
        return $this->userServices->validate($id_user, $validation_code);
    }

    function signout(Request $request)
    {

    }
}
