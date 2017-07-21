@extends('welcome')

@section('title', '| All Categories')
    @section('content')

        <div class="row">
            <div class="col-md-8">
                <h1>Categories</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Posts: </th>
                    </tr>

                    @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td><a href="{{ route('categories.show',$category->id) }}">{{ $category->name }}</a></td>
                        <td>{{ $category->posts()->count() }}
                        </td>
                    </tr>

                        @endforeach
                </table>

            </div>
            <div class="col-md-3">
                <div class="well">
                    {!! Form::open(['route'=>'categories.store','method'=>'post']) !!}
                    <h1>New Category</h1>
                    {!! Form::label('name','Name: ') !!}
                    {!! Form::text('name', null,['class'=>'form-control']) !!}
                    {!! Form::submit('Create New',['class'=>'btn btn-info']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        @endsection
@section('pagination')
    <div class="text-center align-bottom">
        {!! $categories->links() !!}
    </div>
@endsection