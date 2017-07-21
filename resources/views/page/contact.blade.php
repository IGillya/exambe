@extends('welcome')
    @section('title', '| Contact')
    @section('content')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(['route' => 'contactme']) !!}
                    {{ Form::label('email','Email') }}
                    {{ Form::text('email',null,array('class'=>'form-control')) }}
                    {{ Form::label('subject','Subject') }}
                    {{ Form::text('subject',null,array('class'=>'form-control')) }}
                    {{ Form::label('message', 'Message') }}
                    {{ Form::textarea('message',"text your message", array('class'=>'form-control')) }}
                    {{ Form::submit ('Send',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px')) }}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        @endsection