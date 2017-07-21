@extends('welcome')

@section('title', '| All Tags')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>

                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show',$tag->id) }}" class="label label-default">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route'=>'tags.store','method'=>'post']) !!}
                <h1>New Tag</h1>
                {!! Form::label('name','Name: ') !!}
                {!! Form::text('name', null,['class'=>'form-control']) !!}
                {!! Form::submit('Create New Tag',['class'=>'btn btn-info']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection