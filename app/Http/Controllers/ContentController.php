<?php

namespace App\Http\Controllers;

use App\Models\content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:content-list|content-create|content-edit|content-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:content-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:content-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:content-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $content = content::latest()->simplepaginate(4);

        return view('content.index',compact('content'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content=content::all();
        return view('content.create',compact('content'));
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
            'titlear'=>'required',
            'bodyar'=>'required',
           
        ]);
        $content=content::all();
        if($request->hasFile('image')){
            $request->validate([
           'image'=>'mimes:jpeg,jpg,png,svg'

            ]);
            $request->image->store('images-page','public');
            $img=$request->image->hashName();

        }else{
            $img= '';
        }
        
            $content = new content([
                'title'=>$request->get('title'),
                'body'=>$request->get('body'),
                'image'=>$img,
                'titlear'=>$request->get('titlear'),
                'bodyar'=>$request->get('bodyar'),


            ]);
            $content->save();
       


        return redirect()->route('content.index')
            ->with('success',__('content created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = content::find($id);

        return view('content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = content::find($id);

        return view('content.edit',compact('content'));
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
            'image'=>'nullable'
        ]);
        $content=content::all();

        $input = $request->all();

       if ($request->file('image')) {
        $request->validate([
            'image'=>'mimes:jpeg,jpg,png,svg'
 
             ]);
            $request->image->store('images-page','public');

            $input['image'] = $request->image->hashName();

        }else{

            unset($input['image']);

        }


        $content = content::find($id);

        $content->update($input);



        return redirect()->route('content.index')

                        ->with('success',__('content updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        content::find($id)->delete();

        return redirect()->route('content.index')
            ->with('success',__('content deleted successfully.'));
    }
}
