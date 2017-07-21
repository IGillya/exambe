@extends('welcome')

@section('title', "| $post->title")
@section('scripthead')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=di3ys5yjaswzfitijupkp4irypnv81kusge82hg16wah3v9n"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            menubar:false
        });
    </script>
@endsection

    @section('content')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{ $post->title }}</h1>
                <p>{!! $post->body !!} </p>
                <label for="category">Category</label>
                <p>{{ $post->category->name }}</p>
                <br>
                <small>Tags: </small>
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                    @endforeach
                <hr>

        </div>
            <div class="row">
                <div id="single_post"class="col-md-8 col-md-offset-2">
                    @foreach($post->comments as $comment)
                        <label for="name">Commentator: </label>
                        <span> {{ $comment->user_name }}</span>
                    <p></p>
                        <blockquote>{!! $comment->comment !!}
                        <footer class="small">{{ $comment->created_at }}</footer>
                        </blockquote>
                        @if(Auth::check())
                            <a href="{{ route('comments.edit', $comment->id) }}" class="glyphicon glyphicon-pencil"></a>

                            {{ Form::open(['route'=>['comments.destroy',$comment->id ],'method'=>'delete']) }}
                            {{ Form::submit('Delete') }}
                            {{ Form::close() }}
                        @endif
                        <hr>

                    @endforeach

                        <div class="row center-block">

                            <div id="comment-form">

                                {{ Form::open(['route'=>['comments.store',$post->id],'method'=>'Post']) }}


                                <div class="col-md-10">
                                    {{Form::label('comment', 'Comment: ')}}
                                    {{ Form::textarea('comment', null, ['class'=>'form-control']) }}
                                    {{ Form::submit('Add Comment',['class'=>'btn btn-success']) }}
                                </div>

                            </div>

                        </div>
                </div>



        @endsection

                @section('script')
                    {!! Html::script('js/select2.js') !!}
                    <script type="text/javascript">
                        $('.select2-multi').select2();
                    </script>
    @endsection