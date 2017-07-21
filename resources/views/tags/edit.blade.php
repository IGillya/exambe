@extends('welcome')

@section('title','| Edit Tag')
    @section('content')

        {{ Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'put'],$tag->id) }}
            {{ Form::label('name', 'Title: ') }}
            {{ Form::text('name', null,['class'=>'form-control']) }}

            {{ Form::submit('Edit',['class'=>'btn btn-success']) }}

        {{ Form::close() }}

        @endsection