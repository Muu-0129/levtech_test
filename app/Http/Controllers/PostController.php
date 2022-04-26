<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        /*
        return $post->get();        #sql post table
        */
        return view('index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        return view('show')->with(['post' => $post]);
        
    }
}
