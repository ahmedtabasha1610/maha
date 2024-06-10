<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\content;
use App\Models\country;
use App\Models\language;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardAdvisorController extends Controller
{
    public function index(){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent=content::findOrFail(6);
        $waiting=Purchase::where('advisor_id',Auth::user()->id)->where('status','waiting')->count();
        $ok=Purchase::where('advisor_id',Auth::user()->id)->where('status','ok')->count();
        $canceled=Purchase::where('advisor_id',Auth::user()->id)->where('status','canceled')->count();
        $completed=Purchase::where('advisor_id',Auth::user()->id)->where('status','completed')->count();
        $refunded=Purchase::where('advisor_id',Auth::user()->id)->where('status','refunded')->count();

        

          
        return view('homeadvisor',compact('Configuration','pages','pagecontent','Services',
        'refunded','completed','canceled','ok','waiting','refunded'
        ));
    }


    public function balance(){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent=content::findOrFail(6);
        //عرض الحجوزات المكتملة والمدفوعة
        $purchases=Purchase::where('status','completed')
        ->where('confirm','yes')
        ->where('advisor_id',Auth::user()->id)->latest()->simplepaginate(10);
        //الرصيد  القابل لسحب الذي سوف يحول خلال 30 يوم
        $balance_available=Purchase::where('advisor_id',Auth::user()->id)
        ->where('status','completed')
        ->where('confirm','no')
        ->sum('residual');
         // الرصيد  المعلق 
        $balance_unavailable=Purchase::where('advisor_id',Auth::user()->id)
        ->where('status','ok')
        ->sum('residual');;

        $total =array_sum([$balance_available,$balance_unavailable]);
        $user=User::find(Auth::user()->id);
        $user->unreadNotifications->where('notifiable_id',Auth::user()->id)->markAsRead();
        return view('dashadvisor.balance',compact('Configuration','purchases','total','pages','pagecontent','Services','balance_unavailable','balance_available'));
    }
    
    public function showChangePasswordGet() {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent=content::findOrFail(6);
        return view('dashadvisor.change-password',compact('Configuration','pages','pagecontent','Services'));
    }

     public function changePassword(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }

    public function profileget(){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent=content::findOrFail(6);
        $Configuration =  Configuration::get()->first();
        $countries=country::get();
        $languages=language::latest()->get();
        return view('profileadvisor',compact('Configuration','languages','countries','pages','pagecontent','Services'));
    }

    public function careerinfoadvisor(){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent=content::findOrFail(6);
        $Configuration =  Configuration::get()->first();
        $Servicesx=Services::get();
        return view('careerinfoadvisor',compact('Configuration','Servicesx','pages','pagecontent','Services'));
    }

    public function careerinfo(Request $request)
    {    $userprofile = Auth::user(); 
        $this->validate($request, [
            'specialization'=>'nullable',
            'description'=>'nullable',
            'files' => 'nullable',
            'files.*' => 'nullable', 
            'degree'=>'nullable',
            'amount'=>'nullable',
            'duration'=>'nullable',
        ]);
        $input = $request->except('files');
        if($request->hasfile('files'))
        {
           foreach($request->file('files') as $file)
           {
           // $name = time().rand(1,100).'.'.$file->extension();
           $files[] =  $file->store('files-user-profile','public'); 
                
           
           }
           $input['files'] = $files;
        }
      
        if($userprofile->status==0)
        { 
        $userprofile->update($input);
    
        return redirect()->route('careerinfo')->with('success','Update Your Carrer Info Successfully.');
        }else{
            return redirect()->route('careerinfo')->with('success','You cannot modify the profile after approval by the administrator.');
 
        }
    }

    public function profile(Request $request)
    {    $userprofile = Auth::user(); 
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.$userprofile->id,
            'avater'=>'nullable',
            'phone'=>'nullable',
            'phone2'=>'nullable',
            'address'=>'nullable',
            
        ]);
        $input = $request->except('files');
     
        if ($request->file('avater')) {

            $request->avater->store('images-user-profile','public');

            $input['avater'] = $request->avater->hashName();

        }else{

            unset($input['avater']);

        }
         if($userprofile->status==0)
         { 
        $userprofile->update($input);
        return redirect()->route('profile')->with('success','Update Your Profile Successfully.');
          }else{
        return redirect()->route('profile')->with('success','You cannot modify the profile after approval by the administrator.');

          }
    }


  

    public function deleteFile($id, $key)
    {
        $file=User::find($id);
        $files = $file->files;
        unset($files[$key]);
        $file->files = $files;
        $file->save();
        return redirect()->back(); 
    }


    public function showadvisor($id)
    {
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $notification = DB::table('notifications')->find($id);
        $user=User::find(Auth::user()->id);
        $user->unreadNotifications->where('id',$id)->markAsRead();
        $c = json_decode($notification->data);

        return view('dashadvisor.detailsnotifiy', compact('Configuration', 'pages', 'Services', 'pagecontent', 'c'));
    }

    public function showadvisorallnotifiy()
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
       


        return view('dashadvisor.allnotifiy', compact('Configuration', 'notification','pages', 'Services', 'pagecontent'));
    }
}
