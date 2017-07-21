@extends('welcome')

@section('title', '| Edit Comment')

    @section('content')

        <h1>Edit Comment</h1>
        {{ Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT']) }}

        {{ Form::label('comment','Comment: ') }}
        {{ Form::textarea('comment', null, ['class'=> 'form-control']) }}

        {{ Form::submit('Update comment',['class'=>'btn btn-success']) }}


        {{ Form::close() }}


        @endsection