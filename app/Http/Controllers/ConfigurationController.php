<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:configuration-list|configuration-create|configuration-edit|configuration-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:configuration-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:configuration-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:configuration-delete', ['only' => ['destroy']]);    }

    public function index()
    {
        $Configuration = Configuration::latest()->simplepaginate(5);

        return view('configuration.index',compact('Configuration'));
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
        $Configuration = Configuration::find($id);

        return view('configuration.edit',compact('Configuration'));
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
        $this->validate($request, [

            'phone'=>'nullable',
            'email'=>'nullable|email',
            'address'=>'nullable',
           'websitename'=>'nullable',
            'facebook'=>'nullable|url',
           'instagram'=>'nullable|url',
           'whatsapp'=>'nullable|url',
           'twiter'=>'nullable|url',
           'footernote'=>'nullable',
           'desginby'=>'nullable',
           'iconwebsite'=>'nullable|mimes:png,jpg,jpeg',
           'map'=>'nullable',
           
        ]);

        $input = $request->all();

      if($request->file('iconwebsite')){
            $request->iconwebsite->store('icons','public');
            $input['iconwebsite'] = $request->iconwebsite->hashName();

        }elseif($request->file('iconwebsiteen'))
            {

                $request->iconwebsiteen->store('icons','public');
                $input['iconwebsiteen'] = $request->iconwebsiteen->hashName();

        }else{
            unset($input['iconwebsiteen']);
            unset($input['iconwebsite']);
        }

        $Configuration = Configuration::find($id);
        $Configuration->update($input);
        return redirect()->route('configuration.index')
            ->with('success',__('Configuration updated successfully.'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
