<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\User;
use App\Models\content;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Configuration;

class GoogleController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected $providers = [
        'google'
    ];

    public function show()
    {   $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        return view('auth.login',compact('Configuration','pages','Services'));
    }

    public function redirectToProvider($driver)
    {
        if( ! $this->isProviderAllowed($driver) ) {
            
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

  
    public function handleProviderCallback( $driver )
    {
        try {
            $user = Socialite::driver($driver)->user();//جلب معلومات اليوزر 
       // dd($user);
          
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse()
    {
        return redirect()->intended('Dashboard/User');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('social.login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // if user already found
        if( $user ) {
            // update the avatar and provider that might have changed
            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token

            ]);
        } else {
            // create a new user
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'avater' => $providerUser->getAvatar(),
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                'status'=>1,
                'email_verified_at'=>now(),
                // user can use reset password to create a password
                'password' => ''
            ]);
            $user->assignRole(4);
        }

        // login the user
        Auth::login($user, true);

        return $this->sendSuccessResponse();
    }

    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }  
}
