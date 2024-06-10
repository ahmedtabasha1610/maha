<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:Category-list|Category-create|Category-edit|Category-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:Category-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:Category-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:Category-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $Category = Category::latest()->simplepaginate(4);

        return view('category.index',compact('Category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'catname' => 'required|unique:categories,catname',
        ]);

        $cat=Category::create(['catname' => $request->input('catname')]);
        // activity()
        // ->performedOn($cat);
    //  $lastActivity = Activity::all()->last(); //returns the last logged activity
    //  $lastActivity->subject; //returns the model that was passed to `performedOn`;
    //  $lastActivity->description; //returns 'created'
    //  $lastActivity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
     
        return redirect()->route('category.index')
            ->with('success',__('Category created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Category = Category::find($id);

        return view('category.show', compact('Category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Category = Category::find($id);
        return view('category.edit', compact('Category'));
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
            'catname' => 'required'
        ]);

        $Category = Category::find($id);
        $Category->catname = $request->input('catname');
        $Category->save();

        return redirect()->route('category.index')
            ->with('success',__('Category updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat=  Category::find($id);
        $cat->delete();
//         activity()
//       ->performedOn($cat);
//   $lastActivity = Activity::all()->last(); //returns the last logged activity
//   $lastActivity->subject; //returns the model that was passed to `performedOn`;
//   $lastActivity->description; //returns 'created'
//   $lastActivity->changes; //returns ['attributes' => ['name' => 'original name', 'text' => 'Lorum']];
  
        return redirect()->route('category.index')
            ->with('success',__('Category deleted successfully.'));
    }
}
