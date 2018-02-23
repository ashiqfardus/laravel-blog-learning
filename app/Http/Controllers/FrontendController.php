<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Settings;
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
            ;
    }
}
