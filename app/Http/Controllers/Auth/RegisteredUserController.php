<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\content;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Notifications\Notification;
use App\Notifications\NewUserRegisterNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        return view('auth.register',compact('Configuration','pages','Services'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {    
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required | string |email |max:255 | unique:users',
        //     'password' =>'required|confirmed| Rules\Password::defaults()',

        // ]);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
     

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        $details = [
            'title'=> 'New User Register Now:'.$user->name,
            'body' => "Please check the new user's profile.",
            'user_id'=>$user->id,
        ];
        $user->notify(new NewUserRegisterNotification($details));
        DB::update('update notifications set notifiable_id = ? where type = ?',[1,'App\Notifications\NewUserRegisterNotification']);

            Auth::login($user);

            $user->assignRole($request->role_id);

           event(new Registered($user));


        return redirect(RouteServiceProvider::HOME);
    }
}
