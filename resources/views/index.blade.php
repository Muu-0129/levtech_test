<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
       <h1>Blog Name</h1>
       <p class='creat'>[<a href='/posts/create'>create</a>]</p>
       <div class='posts'>
           @foreach ($posts as $post)
               <div class='post'>
                   <form action="/posts/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
                       @csrf
                       @method('DELETE')
                       <input type="button" value="delete" onclick="deletePost(this);"/>
                      
                   </form>
                   <a href='/posts/{{ $post->id }}'><h2 class='title'>{{ $post->title }}</h2></a>
                   <p class='body'>{{ $post->body }}</p>
               </div>
           @endforeach
       </div>
       <div class='paginate'>
           {{ $posts->links() }}
       </div>
       
        <script>
           function deletePost(e)
           {
               'use strict';
               if (confirm('削除されると復元できません。\n本当に削除しますか？')) {
                 document.getElementById('form_delete').submit();
               }
           }
        </script>
    </body>
</html>
