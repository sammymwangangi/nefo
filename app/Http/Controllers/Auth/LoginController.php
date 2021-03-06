<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;

use App\User;

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
    protected $redirectTo = '/forum';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $github_user = Socialite::driver('github')->user();
        
        $user = $this->userFindOrCreate($github_user);
        
        Auth::login($user, true);
        
        return redirect('/forum');
    }

    public function userFindOrCreate($github_user){
        
        $user = User::where('provider_id', $github_user->id)->first();
        
        if(!$user){    
        $user = new User;
        
        $user->name = $github_user->getName();
        $user->email = $github_user->getEmail();
        $user->avatar = $github_user->getAvatar();
        $user->provider_id = $github_user->getid();
        
        $user->save();
        }
        return $user;
    }
}
