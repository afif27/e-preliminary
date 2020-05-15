@extends('layouts.global')
@section('title') Edit User @endsection
@section('content')
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.update', [$user->id])}} "method="POST">
    @csrf
    <input type="hidden"  value="PUT"  name="_method">
    <label for="name">Name</label>
    <input value="{{$user->name}}" class="form-control" placeholder="Full Name" type="text" name="name" id="name"/>
    <br>
    <label for="nopeg">No Pegawai </label>
    <input value="{{$user->nopeg}}" class="form-control" placeholder="nopeg" type="text"  name="nopeg" id="nopeg"/>
    <br>
    <label for="">Status</label>
    <br/>
    <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE"  type="radio" class="form-control" id="active" name="status">
    <label   label for="active">Active</label>
    <input {{$user->status == "INACTIVE" ? "checked" : ""}}value="INACTIVE"type="radio" class="form-control" id="inactive" name="status">
    <label for="inactive">Inactive</label>
    <br><br>
    <label for="">Roles</label>
    <br>
    <input type="radio"{{in_array("PPC", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="PPC" value="PPC">
    <label for="PPC">PPC</label>
    <input type="radio" {{in_array("PRODUKSI", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="PRODUKSI"value="PRODUKSI">
    <label for="PRODUKSI">PRODUKSI</label> 
    <input type="radio" {{in_array("MANAGER", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="MANAGER" value="MANAGER">
    <label for="MANAGER">Manager</label>
    <br>
    <br>
    <label for="phone">Phone number</label>
    <br>
    <input value="{{$user->phone}}" type="text" name="phone" class="form-control">
    <br>
    <label for="avatar">Avatar image</label>
    <br>
    Current avatar: <br>
@if($user->avatar)
<img src="{{asset('storage/'.$user->avatar)}}" width="120px" />
<br>
@else
No avatar
@endif
<br>
<input id="avatar" name="avatar" type="file" class="form-control">
<small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>

    <hr class="my-3">
    <label for="email">Email</label>
    <input value="{{$user->email}}" class="form-control" placeholder="user@mail.com" type="text" name="email" id="email"/>

<br>
<input  class="btn btn-primary" type="submit" value="Save"/>
</form>
</div>
@endsection