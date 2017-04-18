<?php

namespace App;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Laravel\Socialite\Contracts\User as LaravelSocialiteContractsprovider;
//use LaravelSocialiteContractsprovider;
class SocialAccountService

{
  
    public function createOrGetUser(ProviderUser $providerUser)
    {
 

$provider = \Socialize::with($facebook);      
if (Input::has('code'))     {
    $user = $provider->stateless()->user();
}
      
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
            
        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }

    // public function createOrGetUser(Provider $provider)
    // {
    //   $providerUser = $provider->user();
    //   $providerName = class_basename($provider);
    //     $account = SocialAccount::whereProvider($providerName)
    //         ->whereProviderUserId($providerUser->getId())
    //         ->first();
    //     if ($account) {
    //         return $account->user;
    //     } else {
    //         $account = new SocialAccount([
    //             'provider_user_id' => $providerUser->getId(),
    //             'provider' => $providerName
    //         ]);
    //         $user = User::whereEmail($providerUser->getEmail())->first();
    //         if (!$user) {
    //             $user = User::create([
    //                 'email' => $providerUser->getEmail(),
    //                 'name' => $providerUser->getName(),
    //             ]);
    //         }
    //         $account->user()->associate($user);
    //         $account->save();
    //         return $user;
    //     }
    // }
}

 