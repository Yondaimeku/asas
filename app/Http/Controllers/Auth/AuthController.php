<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\Http\Controllers\Auth\AuthAndRegisterUsers;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Validator;
use App\Models\User;
use App\Http\Controllers\Auth;

class AuthController extends Controller {

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


	use AuthAndRegisterUsers;

	/*
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

    public function showLogin()
    {
        return view('login');
    }

    /*
     * logs a user in with id and password
     */
    public function login($credentials)
    {
       // $validator = $this->registrar->validator($credentials); // get validator with credentials

        $validator = Validator::make($credentials,
        [
            'id' => 'required|numeric',
			'password' => 'required|confirmed|min:6',
        ]);

        if($validator->passes() )
        {
        	dd("controller   "+Auth::user());
         return redirect($this->redirectPath());
        }
        else
        {
            return view('login')->withErrors($validator);
        }
    }
}
