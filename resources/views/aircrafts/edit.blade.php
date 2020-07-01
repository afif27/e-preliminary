@extends('layouts.global')
@section('title') edit Aircraft @endsection
@section('content')
<div class="col-md-8">
    <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('aircrafts.update',[$aircraft->id])}}" method="POST">
@csrf
<input type="hidden"  value="PUT"  name="_method">

<label for="registasi">Registration Name</label><br>
<input value="{{$aircraft->registrasi}}" type="text" class="form-control" name="registrasi" id="registrasi"/>
<br>
<label for="airlines">Airlane Name</label>
<input value="{{$aircraft->airlines}}" type="text" class="form-control" name="airlines" id="airlines"/>
<br>
<div class="form-group">
    <label>RTS Plan </label>
    <div class="input-group date">
     <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
        <input value="{{$aircraft->rts_plan}}" type="text" class="form-control datepicker glyphicon glyphicon-th" name="rts_plan">
    </div>
   </div>
<br>
<input type="submit" class="btn btn-primary" value="Save"/>
</form>
</div>
@endsection