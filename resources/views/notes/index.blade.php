@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            
            <!--Main content-->
          @if (count($notes)>0)
            <div class="row">
                @foreach ($notes as $note)
                    <div class="card bg-dark mb-3 text-white" style="width: 20rem; margin-left:20px">
                        <div class="card-body">
                        <h5 class="card-title">{{$note->title}}</h5>
                        <small>{{$note->created_at}}</small>
                        <br><br>
                        <p class="card-text">{{$note->body}}</p>
                        <br><br>

                        <div class="col-sm">
                            <a href="/notes/{{$note->id}}/edit" class="card-link btn btn-warning">Update</a>
                        
                        {!! Form::open(['action' => ['NotesController@destroy',$note->id],'method'=>'POST']) !!}
                            
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger','id'=>'delete-btn'])}}
                        {!! Form::close() !!}
                        </div>

                    </div>
                    </div>
                @endforeach
            </div>
          @else
            <h3 id="main-tag-no-notes">Whoops you dont have any notes!</h3>
            <div class="text-center">
                <a type="button" class="btn btn-success btn-lg text-white" href="/notes/create">Create a new note!</a>
            </div>
          @endif
            
        </div>
    </div>
</div>
@endsection