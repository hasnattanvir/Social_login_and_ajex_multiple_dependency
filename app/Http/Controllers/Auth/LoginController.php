<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


// https://console.cloud.google.com/projectselector2/apis/dashboard?pli=1&supportedpurview=project
    // google login
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    // google callback
    public function handleGoogleCallback(){      

        $user = Socialite::driver('google')->stateless()->user();
        $findUser = User::where('google_id',$user->id)->first();
        if($findUser){
         Auth::login($findUser);
         return redirect()->route('home');
 
        }else{   
            try {
                $user = Socialite::driver('google')->stateless()->user();
                // dd($user->avatar);
                // Check Users Email If Already There
                $is_user = User::where('email', $user->getEmail())->first();
                if(!$is_user){
    
                    $saveUser = User::updateOrCreate([
                        'google_id' => $user->getId(),
                        'avatar'=>$user->getAvatar(),
                    ],[
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        // 'avatar'=>$user->getAvatar(),
                        'password' => Hash::make($user->getName().'@'.$user->getId())
                    ]);
                }else{
                    $saveUser = User::where('email',  $user->getEmail())->update([
                        'google_id' => $user->getId(),
                    ]);
                    $saveUser = User::where('email', $user->getEmail())->first();
                }
    
    
                Auth::loginUsingId($saveUser->id);
                
                return redirect()->route('home');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }




    // facebook login
    public function redirectToFacebook(){
        return Socialite::driver('facebook')->redirect();
    }
    // facebook callback
    public function handleFacebookCallback(){

        $user = Socialite::driver('facebook')->stateless()->user();
        $findUser = User::where('facebook_id',$user->id)->first();
        if($findUser){
         Auth::login($findUser);
         return redirect()->route('home');
 
        }else{        
         
            try {
                $user = Socialite::driver('facebook')->stateless()->user();
                // dd($user->avatar);
                // Check Users Email If Already There
                $is_user = User::where('email', $user->getEmail())->first();
                if(!$is_user){
    
                    $saveUser = User::updateOrCreate([
                        'facebook_id' => $user->getId(),
                        'avatar'=>$user->getAvatar(),
                    ],[
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'avatar'=>$user->getAvatar(),
                        'password' => Hash::make($user->getName().'@'.$user->getId())
                    ]);
                }else{
                    $saveUser = User::where('email',  $user->getEmail())->update([
                        'facebook_id' => $user->getId(),
                    ]);
                    $saveUser = User::where('email', $user->getEmail())->first();
                }
    
    
                Auth::loginUsingId($saveUser->id);
                
                return redirect()->route('home');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }



    // github login
    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }
    // github callback
    public function handleGithubCallback(){


        try {
            $user = Socialite::driver('github')->stateless()->user();
            // dd($user->avatar);
            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){

                $saveUser = User::updateOrCreate([
                    'github_id' => $user->getId(),
                    'avatar'=>$user->getAvatar(),

                ],[
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'avatar'=>$user->getAvatar(),
                    'password' => Hash::make($user->getName().'@'.$user->getId())
                ]);
            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'github_id' => $user->getId(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }


            Auth::loginUsingId($saveUser->id);
            
            return redirect()->route('home');
        } catch (\Throwable $th) {
            throw $th;
        }

       
    }


    


}
