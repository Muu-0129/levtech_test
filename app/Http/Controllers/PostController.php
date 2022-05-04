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
    
    public function edit(Post $post)
    {
        return view('edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)    //public:アクセス制限 function:関数の前に書く update:関数 
                                                                //PostRequest $request:クラスをインスタンス化
    {
        $input = $request['post'];  //$input:変数
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    /*
    public function update(PostRequest $request)    //上のと同じ
    {
        $post = new Post;       //Postクラスを$postにインスタンス化
        $input = $request['post'];  //$input:変数
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    */
}
