<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Settings;
use App\tag;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index')

            ->with('title',Settings::first()->site_name)
            ->with('categories',Category::take(6)->get())
            ->with('first_post',Post::orderBy('created_at','desc')->first())
            ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('firstcategory',Category::orderBy('created_at','desc')->first())
            ->with('secondcategory',Category::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
            ->with('thirdcategory',Category::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('settings',Settings::first());
    }

    public function singlePost($slug)
    {

        $post= Post::where('slug',$slug)->first();

        $next_id=Post::where('id','>',$post->id)->min('id');
        $previous_id=Post::where('id','<',$post->id)->max('id');
        return view('single')->with('post',$post)
            ->with('title',$post->title)
            ->with('categories',Category::take(5)->get())
            ->with('settings',Settings::first())
            ->with('next',Post::find($next_id))
            ->with('previous',Post::find($previous_id))
            ->with('tags',tag::all());
    }
    public function category($id)
    {
        $category = Category::find($id);
        return view('category')->with('category',$category)
                                    ->with('title',$category->name)
                                    ->with('settings',Settings::first())
                                    ->with('categories',Category::take(5)->get());
    }

    public function tag($id)
    {
        $tag = tag::find($id);

        return view('tag')->with('tag',$tag)
            ->with('title',$tag->tag)
            ->with('settings',Settings::first())
            ->with('categories',Category::take(5)->get());

    }
}
