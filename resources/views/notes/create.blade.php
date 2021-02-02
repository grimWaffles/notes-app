@extends('layouts.app')

@section('content')
<div class="col-sm-7" id="create-card">
    <div class="card bg-dark mb-3 text-white">
        
        {!! Form::open(['action' => 'NotesController@store','method'=>'POST']) !!}

            <div class="card-header">
                <div class="form-group">
                    {{Form::text('title','',['class'=> 'form-control','placeholder'=>'Enter title here...'])}}
                </div>
            </div>
            <div class="card-body">

                <div class="form-group">
                    {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Enter body of the note'])}}
                </div>
            
            </div>
            
            {{Form::submit('Save',['class'=>'btn btn-success text-white','id'=>'create-card-btn'])}}
            

        {!! Form::close() !!}

      </div>
</div>
@endsection