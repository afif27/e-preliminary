@extends('layouts.global')
@section('title') Input Airlane @endsection
@section('content')
<div class="col-md-8">
    <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('aircrafts.store')}}" method="POST">
@csrf
<label>Registration Name</label><br>
<input type="text" class="form-control" name="registrasi" placeholder="masukan registrasi pesawat"/>
<br>
<label>Airlane Name</label>
<input type="text" class="form-control" name="airlane" placeholder="masukan nama airlanes"/>
<br>
<div class="form-group">
    <label>RTS Plan </label>
    <div class="input-group date">
     <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
        <input placeholder="masukkan tanggal" type="text" class="form-control datepicker glyphicon glyphicon-th" name="rts_plan">
    </div>
   </div>
<br>
<input type="submit" class="btn btn-primary" value="Save"/>
</form>
</div>
@endsection
