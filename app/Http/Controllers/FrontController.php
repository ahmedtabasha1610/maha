<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\content;
use App\Mail\MyDemoMail;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index(){
  
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(8)->simplepaginate(6);
        $pagecontent=content::find(6);
        return view('welcome',compact('Configuration','pages','pagecontent','Services'));
    }
    
    public function page($id){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $pagecontent=content::find($id);
        return view('pages',compact('pagecontent','Configuration','pages'));
    }
    
    public function services($id){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Servicescontent=Services::find($id);
        return view('ServicesDetails',compact('Servicescontent','Configuration','pages'));
    }
    public function blog(){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $posts=Post::latest()->simplepaginate(12);
        return view('blog',compact('posts','Configuration','pages'));
    }

    public function contact(){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(8)->get();
        $pagecontent=content::find(6);
        return view('contactus',compact('Configuration','pages','pagecontent','Services'));

     }
    public function contactus(Request $request){
        $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(8)->get();
        $pagecontent=content::find(6);
        $this->validate($request, [
            'Name' => 'required',
            'Title' => 'required',
            'Phone' => 'required',
            'Email' => 'required|email',
            'Msg'=>'required',
        ]);
        $details = [
            'Name' => $request->Name,
            'Title' => $request->Title,
            'Phone' => $request->Phone,
            'Email' => $request->Email,
            'Msg' => $request->Msg,
        ];
       
        Mail::to('info@esteshari.com')->send(new MyDemoMail($details));
            $success='Your message has been sent successfully!! Thank you for contacting us..';
        return view('contactus',compact('Configuration','pages','pagecontent','Services','success'));
    }
}
