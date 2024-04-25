<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\Console\Input\Input;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }






    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->route('login');
    }

    public function username()
    {
        $value =request()->Input('userlogin');
        if(filter_var($value,FILTER_VALIDATE_EMAIL)){
            request()->merge(['email'=>$value]);
            return 'email';
        }
        elseif(preg_match("/^[a-z ,.'-]+$/",$value)){
            request()->merge(['name'=>$value]);
            return 'name'; 

        }
       else{
        request()->merge(['email'=>$value]);
        return 'email';
       }
      
    }   
    
    protected function validateLogin(Request $request)
    {
        $request->validate([
           'userlogin'=>'required|string',
            'password'=>'required|string',
        ],[
            "userlogin.required"=>"L'Email ou le prenom est obligatoire "
        ]) ;
    }
    
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'userlogin' => [trans('auth.failed')],
        ]);
    }
    
}
