<?php

namespace App\Http\Controllers;

use App\Models\language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:language-list|language-create|language-edit|language-delete', ['only' => ['index','show']]);
         $this->middleware('permission:language-create', ['only' => ['create','store']]);
         $this->middleware('permission:language-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:language-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = language::latest()->paginate(5);
        return view('languages.index',compact('languages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'en_name_lang' => 'required',
            'name_lang' => 'required',
        ]);
    
        language::create($request->all());
    
        return redirect()->route('language.index')
                        ->with('success','language created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(language $language)
    {
        return view('languages.show',compact('language'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(language $language)
    {
        return view('languages.edit',compact('language'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, language $language)
    {
         request()->validate([
            'name_lang' => 'required',
            'en_name_lang' => 'required',

        ]);
    
        $language->update($request->all());
    
        return redirect()->route('language.index')
                        ->with('success','language updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(language $language)
    {
        $language->delete();
    
        return redirect()->route('language.index')
                        ->with('success','language deleted successfully');
    }
}
