<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\MyDemoMail;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {      $d= Purchase::selectRaw('DATE_FORMAT(register_status_day, "%b") as month, SUM(disacount) as total')
        ->where('status','completed')
        ->where('confirm','yes')
        ->whereYear('register_status_day', '=', Carbon::now()->year)
         ->groupBy('month')
        ->orderByRaw('MONTH(register_status_day)')
        ->getQuery()
        ->get()
        ->mapWithKeys(function ($row) {
            return [$row->month => $row->total];
        })
        ->toJson();  
        $numadvisor =User::role('Employee')->count();
       $numUser =User::role('User')->count();
        return view('home',compact('d','numadvisor','numUser'));
    }
    public function show($id,$user_id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->where('type','App\Notifications\NewUserRegisterNotification')->first();

        if ($notification) {
            $notification->markAsRead();
            $notification->delete(); // can be single or multiple change according to your logic

            return redirect()->route('users.show',$notification->data['user_id']);
        }
    }
    public function showall(){
        $notification = auth()->user()->notifications()->where('type','App\Notifications\NewUserRegisterNotification')->get();
              
        $notification->markAsRead();
        DB::table('notifications')
        ->where('notifiable_id',1)->where('read_at','!=',null)
        ->delete();     
            return redirect()->back();
        

    }
    public function profileget(){
        return view('users.profile');
    }



    public function profile(Request $request)
    { 
        $userprofile = Auth::user(); 
        $this->validate($request, [
            'name' => 'nullable',
            'email' => 'nullable|email|unique:users,email,'.$userprofile->id,
            'avater'=>'nullable',
            'phone'=>'nullable',
            'password'=>'nullable'
        ]);
        $input = $request->except('password');

        if ($request->file('avater')) {

            $request->avater->store('images-admin-profile','public');

            $input['avater'] = $request->avater->hashName();

        }else{

            unset($input['avater']);

        }
            $input['password']=Hash::make($request->password);
        $userprofile->update($input);
    
        return redirect()->route('profileadmin')->with('success',__('Update Your  Profile Successfully.'));
    }
    
}
