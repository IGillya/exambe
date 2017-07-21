<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{

    public function store(Request $request, $post_id)
    {
        $user = Auth::user();

        $this->validate($request,[
            'comment'=>'required|max:255'
        ]);
        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->comment=$request->comment;
        $comment->approved = true;
        $comment->user_id = $user->id;
        $comment->user_name = $user->name;
        $comment->post()->associate($post);

        $comment->save();
        Session::flash('success', 'Comment Added');

      return redirect()->route('blog.single',$post->slug);
    }


    public function edit($id)
    {

        $comment = Comment::find($id);
        return view ('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this->validate($request,[
           'comment'=>'required'
        ]);
        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success','Comment updated');

        return redirect()->route('post.show',$comment->post->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        Session::flash('success','Comment DELETED');
        return back();
    }

}
