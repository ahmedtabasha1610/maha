<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'show']]);
         $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
         $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
         $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $category=Category::all();
        $posts = Category::join('posts','posts.category_id','=','categories.id')->select('posts.*','categories.catname')
        ->simplepaginate(4);

        return view('posts.index',compact('posts','category'));
    }
    public function searcharticle($id){
        $posts = Category::join('posts','posts.category_id','=','categories.id')->where('category_id',$id)->simplepaginate(4);
        $category=Category::all();
        return view('posts.show',compact('posts','category'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        return view('posts.create',compact('category'));
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
            'category_id'=>'required',
            'body'=>'required',
            'image'=>'required',
            'author'=>'nullable',
            'slug'=>'nullable',
        ]);
        $category=Category::all();
        if($request->hasFile('image')){
            $request->validate([
           'image'=>'mimes:jpeg,jpg,png'

        ]);
            $request->image->store('images-blog','public');
            $posts = new Post([
                'title'=>$request->get('title'),
                'category_id'=>$request->get('category_id'),
                'body'=>$request->get('body'),
                'image'=>$request->image->hashName(),
                'author'=>Auth::User()->name,
                'slug' => \Str::slug($request->title),

            ]);
            $posts->save();

        }


        return redirect()->route('post.index')
            ->with('success',__('Articale created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);

        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        $category=Category::all();

        return view('posts.edit',compact('posts','category'));
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
            'category_id'=>'required',
            'body'=>'required',
            'image'=>'nullable',
            'author'=>'nullable',
            'slug'=>'nullable'
        ]);
        $category=Category::all();

        $input = $request->all();

        if ($request->file('image')) {

            $request->image->store('images-blog','public');

            $input['image'] = $request->image->hashName();

        }else{

            unset($input['image']);

        }

        $posts = Post::find($id);

        $posts->update($input);



        return redirect()->route('post.index')

                        ->with('success',__('Article updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('post.index')
            ->with('success',__('Article deleted successfully.'));
    }
}
