@extends('layouts.app')

@section('content')
<div class="col-sm-7" id="create-card">
    <div class="card bg-dark mb-3 text-white">
        
        {!! Form::open(['action' => ['NotesController@update',$note->id],'method'=>'POST']) !!}

            <div class="card-header">
                <div class="form-group">
                    {{Form::text('title',$note->title,['class'=> 'form-control','placeholder'=>'Enter title here...'])}}
                </div>
            </div>
            <div class="card-body">

                <div class="form-group">
                    {{Form::textarea('body',$note->body,['class'=>'form-control','placeholder'=>'Enter body of the note'])}}
                </div>
            
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-warning','id'=>'create-card-btn'])}}
            

        {!! Form::close() !!}

      </div>
</div>
@endsection