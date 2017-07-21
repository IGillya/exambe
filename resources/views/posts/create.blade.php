@extends('welcome')
    @section('title', '| Create')
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
            <div class="col-md-8  col-md-offset-2">
                <h1>Create New Post</h1>
                <hr>
                {!! Form::open(['route' => 'post.store', 'files'=>true]) !!}
                {{ Form::label('title','Title:') }}
                {{ Form::text('title',null, array('class'=>'form-control')) }}

                {{ Form::label('slug', 'Slug:') }}
                {{ Form::text('slug',null,['class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'10']) }}

                {{ Form::label('category_id','Category: ') }}
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                </select>

                {{ Form::label('tags','Tag: ') }}
                <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('image', 'Image: ') }}
                {{ Form::file('image',null,['class'=>'form-control']) }}

                {{ Form::label('body', "Post Body :") }}
                {{ Form::textarea('body', null, array('class'=>'form-control')) }}

                {{ Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px')) }}
                {!! Form::close() !!}
            </div>
        </div>


        @endsection
@section('script')
    {!! Html::script('js/select2.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
           </script>
@endsection