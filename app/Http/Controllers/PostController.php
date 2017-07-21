<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use App\Comment;
use Image;






use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Relations\Relation;
use Mews\Purifier\Purifier;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view ('posts.blog')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
       return view ('posts.create')
           ->withCategories($categories)
           ->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'title'=>'required|max:255',
            'slug'=>'required|min:5|max:10',
            'category_id'=>'required|numeric',
            'body'=>'required'
        ));
/*        $post = Post::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
             'category_id'=>$request->category_id,
             'body'=> Purifier::clean($request->input('body'))
        ]);*/
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = clean($request->body);
        $post->user_id = auth()->user()->id;
        //image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(400, 400)->save($location);
            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);


        Session::flash('success', 'Post is posted successfully');
        return redirect ()->route('post.show',$post->id);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(auth()->user()->id !== $post->user_id) {
            $tags = Tag::all();
            return view('posts.edit', compact('post'))
                ->withTags($tags);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if(auth()->user()->id !== $post->user_id){
        $this->validate($request, [
            'title'=>'required|max:255',
            'slug'=>'required|min:5|max:10',
            'body'=>'required'
        ]);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = clean($request->body);
        $post->save();

        $post->tags()->sync($request->tags,true);

        Session::flash('success', 'This post EDITED');

        return redirect()->route('post.show',$post->id);
        }
        else{
            Session::flash('danger', 'Not permited');
            return redirect()->route('post.show',$post->id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->find($post);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success','Post DELETED');
        return redirect()->route('post.index');
    }
}
