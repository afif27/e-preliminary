@extends("layouts.global")
@section("title") Create User @endsection
@section("content")
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.store')}}"method="POST">
    @csrf
    <label for="name">Name</label>
    <input class="form-control" placeholder="Full Name" type="text" name="name" id="name"/>
    <br>
    <label for="username">Username</label>
    <input class="form-control" placeholder="username" type="text"  name="username" id="username"/>
    <br>
    <label for="nopeg">No Pegawai </label>
    <input class="form-control" placeholder="nopeg" type="text"  name="nopeg" id="nopeg"/>
    <br>
    <label for="">Roles</label>
    <br>
    <input type="radio" name="roles[]" id="PPC" value="PPC">
    <label for="PPC">PPC</label>
    <input type="radio" name="roles[]" id="PRODUKSI"value="PRODUKSI">
    <label for="PRODUKSI">PRODUKSI</label> 
    <input type="radio" name="roles[]" id="MANAGER" value="MANAGER">
    <label for="MANAGER">Manager</label>
    <br>
    <br>
    <label for="phone">Phone number</label>
    <br>
    <input type="text" name="phone" class="form-control">
    <br>
    <br> <label for="avatar">Avatar image</label>
    <br>
    <input id="avatar"name="avatar" type="file" class="form-control">
    <hr class="my-3">
    <label for="email">Email</label>
    <input class="form-control" placeholder="user@mail.com" type="text" name="email" id="email"/>
<br>
    <label for="password">Password</label>
    <input class="form-control" placeholder="password" type="password" name="password" id="password"/>
<br>
    <label for="password_confirmation">Password Confirmation</label>
    <input class="form-control" placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
<br>
<input  class="btn btn-primary" type="submit" value="Save"/>
</form>
</div>
@endsection