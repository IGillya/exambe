<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Comment;
use App\User;

class BlogController extends Controller
{
    public function getIndex (){
        $posts = Post::paginate(10);
        return view ('blog.index',compact('posts'));
    }

    public function getSingle ($slug){
        $post = Post::where('slug', '=', $slug)->first();



        return view('blog.single')->withPost($post);
    }
}
