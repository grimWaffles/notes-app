@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <!--Main content-->
          @if (count($notes)>0)
              <!--To do-->
          @else
            <h3 id="main-tag-no-notes">Whoops you dont have any notes!</h3>
          @endif
            
        </div>
    </div>
</div>
@endsection
