@extends('welcome')
@section('title', '| Edit')
    @section('content')

        <div class="row">
                {!! Form::model($post,['route'=>['post.update',$post->id],'method'=>'PUT']) !!}


            <div class="col-md-8 ">

                {{ Form::label('title', 'Title: ') }}
                {{ Form::text('title', null, ['class'=>'form-control']) }}
                <p></p>
                {{ Form::label('slug', 'Slug: ') }}
                {{ Form::text('slug', null,['class'=>'form-control']) }}

                {{ Form::label('tags','Tag: ') }}
                <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"> {{ $tag->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('body','Body: ') }}
                {{ Form::textarea('body',null,['class'=>'form-control']) }}
                <p class="lead">

                </p>
                <div class="col-md-4 pull-right">
                    <div class="well">
                        <p>Created At: {{ date ('M, j, Y H:i',strtotime($post->created_at)) }}</p>
                        <hr>

                        <p>Last Updated At:{{ date ('M, j, Y H:i',strtotime($post->updated_at)) }}</p>

                    </div>
                    <div class="row btn-group" >
                        <div class="col-sm-6">
                            {!! Html::linkRoute('post.show','Cancel',[$post->id],['class'=>'btn btn-primary btn-block']) !!}

                        </div>
                        <div class="col-sm-6">
                            {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) }}

                        </div>
                        {!! Form::close() !!}
                    </div>
                        {!! Form::open(['route'=>['post.destroy',$post->id], 'method'=>'delete']) !!}
                        {!! Form::submit('delete',['class'=>'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}




            </div>

        </div>

        @endsection
@section('script')
                {!! Html::script('js/select2.js') !!}
                <script type="text/javascript">
                    $('.select2-multi').select2();
                    $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
                </script>
    @endsection