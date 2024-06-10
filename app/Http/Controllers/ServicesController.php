<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:Services-list|Services-create|Services-edit|Services-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:Services-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:Services-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:Services-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $Services = Services::latest()->simplepaginate(6);

        return view('Services.index',compact('Services'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Services=Services::all();
        return view('Services.create',compact('Services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title'=>'required',
            'body'=>'required',
            'image'=>'nullable',
            'entitle','nullable',
           
        ]);
        $Services=Services::all();
        if($request->hasFile('image')){
            $request->validate([
           'image'=>'mimes:jpeg,jpg,png,svg'

            ]);
            $request->image->store('images-services','public');
            $img=$request->image->hashName();
            $request->image->store('images-services','public');
            $img=$request->image->hashName();
            $Services = new Services([
                'title'=>$request->get('title'),
                'body'=>$request->get('body'),
                'image'=>$img,
                'entitle'=>$request->get('entitle'),


            ]);

           
            $Services->save();

        }
       


        return redirect()->route('Services.index')
            ->with('success',__('Services created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Services = Services::find($id);

        return view('Services.show', compact('Services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Services = Services::find($id);

        return view('Services.edit',compact('Services'));
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

            'title'=>'required',
            'body'=>'required',
            'image'=>'nullable',
            'entitle'=>'required'
        ]);
        $Services=Services::all();

        $input = $request->all();

       if ($request->file('image')) {
        $request->validate([
            'image'=>'mimes:jpeg,jpg,png,svg'
 
             ]);
            $request->image->store('images-services','public');

            $input['image'] = $request->image->hashName();

        }else{

            unset($input['image']);

        }


        $Services = Services::find($id);

        $Services->update($input);



        return redirect()->route('Services.index')

                        ->with('success',__('Services updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Services::find($id)->delete();

        return redirect()->route('Services.index')
            ->with('success',__('Services deleted successfully.'));
    }
}
