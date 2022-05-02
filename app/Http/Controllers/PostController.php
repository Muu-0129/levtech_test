<?php

namespace App\Http\Controllers;


use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Log;     //debug

/*
8-4 PostRequest.php作成後
作成前は汎用性のあるRequest: use Illuminate\Http\Request;
*/

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
    
    public function create()
    {
        return view('create');
    }
    
    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
        
    }
}
