@extends('welcome')
@section('title', '| Home')
@section('content')


    <div class="row">
        <div class="col-md-8 col-md-offset-2">

             @foreach($posts as $post)
                <div class="jumbotron">
                 <h3>Title: {{ $post->title }}</h3>
                    <div id="postid">
                        {{ $post->id }}
                    </div>
                    <div id="im">
                        @if($post->image != null) <img id="im" src="{{ asset('images/'. $post->image) }}" >

                    </div>
                    @else "have no image"
                    @endif

                 <p>About: {{ substr(strip_tags($post->body),0, 30)}}{{ strlen(strip_tags($post->body))>30?"...":"" }}</p>
                <a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
                    <div id="post_date">
                        {{ date ('M, j, Y H:i',strtotime($post->created_at)) }}
                    </div>
        </div>

                <hr>


                 @endforeach

    </div>

@endsection
        @section('pagination')
            <div class="text-center align-bottom">
                {!! $posts->links() !!}
            </div>
@endsection
