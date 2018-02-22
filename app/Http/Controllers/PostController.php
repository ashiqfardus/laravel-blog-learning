<?php

namespace App\Http\Controllers;
Use App\Post;
Use App\Tag;
use App\Category;
use Session;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        if ($categories->count()==0)
        {
            Session::flash('info','Categories are empty');
            return redirect()->back();
        }
        $tags=Tag::all();
        if ($tags->count()==0)
        {
            Session::flash('info','Tags are empty');
            return redirect()->back();
        }
        return view('admin.post.create')->with('categories',$categories)->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'title'=>'required|max:255',
           'featured'=>'required|image',
           'content'=>'required|max:1000',
            'category_id'=> 'required',
            'tags'=> 'required'
        ]);

        $featured=$request->featured;
        $featured_new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post=Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'uploads/posts/'.$featured_new_name,
            'category_id'=>$request->category_id,
            'slug'=>str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','You Successfully created a Post');
        return redirect()->route('posts');

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
        $post=Post::find($id);
        return view('admin.post.edit')->with('post',$post)
                                            ->with('categories',Category::all())
                                            ->with('tags',Tag::all());
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
        $post=Post::find($id);
        $this->validate($request,[
           'title'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);

        if ($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name=time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
            $post->featured='uploads/posts/'.$featured_new_name;
        }
        $post->title=$request->title;
        $post->content=$request->content;
        $post->category_id=$request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','Post updated successfully');
        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();

        Session::flash('success','Your Post has been successfully Trashed');

        return redirect()->back();
    }
    public function trashed()
    {
        $posts=Post::onlyTrashed()->get();
        return view('admin.post.trashed')->with('posts',$posts);
    }
    public function kill($id)
    {
        $post= Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Your Post has been successfully Deleted');
        return redirect()->back();
    }
    public function restore($id)
    {
        $post= Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Your Post has been successfully restored');
        return redirect()->route('posts');
    }
}
