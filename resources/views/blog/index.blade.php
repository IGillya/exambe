@extends('welcome')
@section('title', '| BLOG')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('post.create') }}" class="btn btn-lg btn-block btn-primary">Create New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th></th>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <th><span class="link alert-link">{{ $post->title }}</span></th>
                        <th>{{ substr(strip_tags($post->body),0,30) }}{{ strlen(strip_tags($post->body))> 30? "...":"" }}</th>
                        <th>{{ date ('M, j, Y H:i',strtotime($post->created_at)) }}</th>
                        <th><a href="{{ route('post.show',$post->id) }}" class="btn btn-info  btn-group">View</a>
                            <a href="{{ route('post.edit',$post->id) }}" class="btn  btn-success btn-group">Edit</a>
                        </th>
                    </tr>
                @endforeach

                </tbody>
            </table>


        </div>
    </div>


@endsection
@section('pagination')
    <div class="text-center align-bottom">
        {!! $posts->links() !!}
    </div>
@endsection