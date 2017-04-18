<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Validator;
use App\SocialAccountService;
use Socialite;
use Auth;

class SocialAuthController extends Controller
{
    // redirect function
    public function facebookredirect(){
      return Socialite::driver('facebook')->redirect();
    }
    // callback function
    public function facebookcallback(SocialAccountService $service){
      try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
 
        $authUser = $this->findOrCreateUserFacebook($user);
 
        Auth::login($authUser, true);
 
        return redirect('dashboard');
    }
     /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUserFacebook($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();
 
        if ($authUser){
            return $authUser;
        }
 
        return User::create([
            'name'        => $facebookUser->name,
            'email'       => $facebookUser->email,
            'password'    => bcrypt($facebookUser->name),
            'role_id'     =>  2,
            'facebook_id' =>  $facebookUser->id,
           
        ]);
    }
    public function twitterredirect()
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function twittercallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect('/dashboard');
    }
    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findOrCreateUser($twitterUser)
    {
        $authUser = User::where('twitter_id', $twitterUser->id)->first();
        if ($authUser){
            return $authUser;
        }
          return User::create([
              'name'          =>  $twitterUser->name,
              'password'      =>  bcrypt($twitterUser->name),
              'email'         =>  'developer1.mapol@gmal.com',
              'role_id'       =>  2,
              'twitter_id'    =>  $twitterUser->id,
          ]);
    }
}
 
 