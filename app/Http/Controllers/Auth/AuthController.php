<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Metiers\UserServices;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use App\Http\Requests;

class AuthController extends Controller
{
    protected $userServices;

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserServices $mobileService)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->userServices = $mobileService;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    function signin(Request $request)
    {
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
        return $this->userServices->store($request);
    }

    function validateEmail($id_user, $validation_code)
    {
        return $this->userServices->validate($id_user, $validation_code);
    }

    function signout(Request $request)
    {

    }
}
