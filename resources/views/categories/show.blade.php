@extends('welcome')

@section('title',"| $category->name" )

    @section('content')

     {{ $category->posts()->count() }}

        @foreach($category->posts as $post)

            {{ $post->title }}

        @endforeach
     <div class="row">
         <div class="col-md-8">
             <h1>{{ $category->name }} Category <small>{{ $category->posts->count()}}</small></h1>
         </div>
         <div class="col-md-2">
             <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary pull-right">edit</a>
         </div>
         <div class="col-md-2">
             {{ Form::open(['route'=>['categories.destroy',$category->id],'method'=>'delete']) }}
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
                     <th>Title</th>
                     <th>Tags</th>
                     <th></th>
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($category->posts as $post)
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