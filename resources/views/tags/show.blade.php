@extends('welcome')

@section('title', "| $tag->name")

    @section('content')
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $tag->name }} Tag <small>{{ $tag->posts->count()}}</small></h1>
            </div>
            <div class="col-md-2">
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right">edit</a>
            </div>
            <div class="col-md-2">
                {{ Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'delete']) }}
                {{ Form::submit('delete',['class'=>'btn btn-danger']) }}
                {{ Form::close() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Post Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tag->posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td><a href="{{ route('blog.single',$post->slug) }}">{{ $post->title  }}</a></td>
                            <td>@foreach($post->tags as $tag)
                                    <span class="label label-default">
                                     {{ $tag->name }}
                                        @endforeach
                                    </span>
                            </td>
                            <td>
                                <a href="{{ route('post.show',$post->id) }}" class="btn btn-default btn-sm">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>




        @endsection