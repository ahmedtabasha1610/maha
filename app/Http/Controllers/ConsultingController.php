<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\content;
use App\Models\Purchase;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;

class ConsultingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $Configuration = Configuration::first();
        $pages = content::take(4)->get();
        $Services = Services::take(6)->get();
        $pagecontent = content::findOrFail(6);
        $purchases= Purchase::where('user_id', '=',Auth::user()->id)->OrderBy('id','DESC')->simplepaginate(5);
        $sers=Services::all();
        return view('dashuser.myconsulting',[
            'Configuration' => $Configuration,
            'pages' => $pages,
            'Services' => $Services,
            'pagecontent' => $pagecontent,
            'purchases'=>$purchases,
            'sers'=>$sers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
