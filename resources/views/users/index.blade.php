@extends("layouts.global")
@section("title") Users list @endsection
@section("content")
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
        <form action="{{route('users.index')}}">
        <div class="input-group mb-3">
        <input value="{{Request::get('keyword')}}"name="keyword"class="form-control col-md-10" type="text" placeholder="Filter berdasarkan nopeg atau nama"/>
        <div class="input-group-append">
        <input type="submit"value="Filter"class="btn btn-primary">
        </div>
        </div>
        </form>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
            <a href="{{route('users.create')}}" class="btn btn-primary">Create user</a>
        </div>
    </div>
    <br>
<table class="table table-bordered">
<thead>
<tr>
<th><b>Name</b></th>
<th><b>Username</b></th>
<th><b>Email</b></th>
<th><b>Avatar</b></th>
<th><b>Action</b></th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td>{{$user->name}}</td>
<td>{{$user->username}}</td>
<td>{{$user->email}}</td>
<td> @if($user->avatar) <img src="{{asset('storage/'.$user->avatar)}}" width="50px"/> 
     @else 
     N/A 
      @endif 
     </td>
     <td>
         <a class="btn btn-info text-white btn-sm" href="{{route('users.edit',[$user->id])}}">Edit</a>
        <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', [$user->id])}}" method="POST">
            @csrf
        <input type="hidden" name="_method"  value="DELETE">
        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
        </form>
        <a href="{{route('users.show', [$user->id])}}" class="btn btn-primary btn-sm">Detail</a>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection