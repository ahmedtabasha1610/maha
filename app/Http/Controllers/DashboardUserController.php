<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\content;
use App\Models\language;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Purchase;

class DashboardUserController extends Controller
{
    public function index()
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $waiting=Purchase::where('user_id',Auth::user()->id)->where('status','waiting')->count();
        $ok=Purchase::where('user_id',Auth::user()->id)->where('status','ok')->count();
        $canceled=Purchase::where('user_id',Auth::user()->id)->where('status','canceled')->count();
        $completed=Purchase::where('user_id',Auth::user()->id)->where('status','completed')->count();
        $refunded=Purchase::where('user_id',Auth::user()->id)->where('status','refunded')->count();

       
        return view('homeuser', compact('Configuration', 'pages','pagecontent', 'Services',
        'completed','canceled','ok','waiting'
        
    ));
    }

    public function showChangePasswordGet()
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        return view('dashuser.change-password', compact('Configuration', 'pages', 'pagecontent', 'Services'));
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password successfully changed!");
    }

    public function profilegetuser()
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $Configuration =  Configuration::get()->first();
        $languages=language::latest()->get();
        return view('profileuser', compact('Configuration', 'pages','languages','pagecontent', 'Services'));
    }


    public function profileuser(Request $request)
    {
        $userprofile = Auth::user();
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,' . $userprofile->id,
            'avater' => 'nullable',
            'phone' => 'nullable',
            'phone2' => 'nullable',
            'specialization' => 'nullable',
            'description' => 'nullable',
            'address' => 'nullable',
            'files' => 'nullable',
            'files.*' => 'nullable',
            'language_id'=>'required'
        ]);
        $input = $request->except('files');
        if ($request->hasfile('files')) {
            foreach ($request->file('files') as $file) {
                // $name = time().rand(1,100).'.'.$file->extension();
                $files[] =  $file->store('files-user-profile', 'public');
            }
            $input['files'] = $files;
        }
        if ($request->file('avater')) {

            $request->avater->store('images-user-profile', 'public');

            $input['avater'] = $request->avater->hashName();
        } else {

            unset($input['avater']);
        }



        $userprofile->update($input);

        return redirect()->route('profileuser')->with('success', 'Update Your Profile Successfully.');
    }

    public function deleteFile($id, $key)
    {
        $file = User::find($id);
        $files = $file->files;
        unset($files[$key]);
        $file->files = $files;
        $file->save();
        return redirect()->back();
    }


    public function showuser($id)
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $notification = DB::table('notifications')->find($id);
        $user=User::find(Auth::user()->id);
        $user->unreadNotifications->where('id',$id)->markAsRead();
        $c = json_decode($notification->data);

        return view('dashuser.detailsnotifiy', compact('Configuration', 'pages', 'Services', 'pagecontent', 'c'));
    }

    public function showuserallnotifiy()
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $notification = DB::table('notifications')
        ->where('type','App\Notifications\dashNotifaction')
        ->where('notifiable_id',Auth::user()->id)
        ->orderBy('id','DESC')
        ->get();
       
        // $user=User::find(Auth::user()->id);
        // $user->unreadNotifications->markAsRead();
       // $c = json_decode($notification->data);

        return view('dashuser.allnotifiy', compact('Configuration', 'notification','pages', 'Services', 'pagecontent'));
    }

    public function filteradvisor(Request $request)
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        
        $service_idx=$request->query('service_idx');

        if($service_idx){
            $Serv= Services::findorFail($service_idx);
        $alladvisor=User::where('service_id',$Serv->id)->where('status', 1)->role('Employee')->get();
       // dd($servicespage);
        }else{
            $alladvisor = User::where('status', 1)->role('Employee')->get();

        }
        $pagecontent = content::findOrFail(6);
        //$alladvisor = User::where('status', 1)->role('Advisor')->get();
        if ($request->country_id ||  $request->service_id) {
            // $alladvisor =User::where('status',0)
            // ->role('Advisor')
            // ->where('country_id',$request->country_id)
            // ->orwhere('language_id',$request->language_id)
            // ->orwhere('service_id',$request->service_id)
            // ->get();
            $r = [];
            $r['country_id'] = $request->country_id;
            $r['service_id'] = $request->service_id;

            $alladvisor = User::where('status', 1)
                ->role('Employee')
                ->where(function ($query) use ($r) {
                    $query->orwhere('country_id', $r['country_id'])
                        ->orWhere('service_id', $r['service_id']);
                })
                ->latest()
                ->get();
        }

        $selected_id = [];
        $selected_id['country_id'] = $request->country_id;
        $selected_id['service_id'] = $request->service_id;

        // dd($alladvisor,
        // $Configuration,
        // $selected_id,
        // $pages,
        // $Services,
        // $pagecontent,);
        return view('dashuser.filteradvisor', compact('alladvisor','Configuration', 'selected_id', 'pages', 'Services', 'pagecontent'));
    }
}
