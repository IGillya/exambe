@extends('welcome')
@section('title', '| View post')
    @section('content')
<div class="row">
    <div class="col-md-8 ">
        <h1>{{ $post->title }}</h1>
        <p class="lead">
            {!! $post->body !!}
        </p>
        <div class="col-md-4">
            <div class="well">
                <label>Link<p><a href="{{ url('blog',$post->slug) }}">{{ url('blog',$post->slug) }}</a></p></label>
                <hr>
                <label for="category">Category</label>
                <p>{{ $post->category->name }}</p>
                <small>Tags</small>
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
                <hr>

                <label>Created At: {{ date ('M, j, Y H:i',strtotime($post->created_at)) }}</label>
                <hr>

                <hr>

                <label><p>Last Updated At:{{ date ('M, j, Y H:i',strtotime($post->updated_at)) }}</p></label>


            </div>
                <div class="row">
                    @can('update',$post)
                    <div class="col-sm-6">
                        {!! Html::linkRoute('post.edit','Edit',[$post->id],['class'=>'btn btn-primary btn-block']) !!}

                    </div>

                    <div class="col-sm-6">
                        {!! Form::open(['route'=>['post.destroy',$post->id], 'method'=>'delete']) !!}
                        {!! Form::submit('delete',['class'=>'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                    @endcan
                    <div class="col-sm-12">
                        {!! Html::linkRoute('post.index','See All',[],['class'=>'btn btn-info btn-block']) !!}

                    </div>



                 </div>
    </div>
</div>


        @endsection
