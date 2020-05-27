@extends("layouts.global")
@section("title") Preliminary list @endsection
@section("content")
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
        <form action="{{route('prelims.index')}}">
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
            <a href="{{route('prelims.create')}}" class="btn btn-primary">Create user</a>
        </div>
    </div>
    <br>
<table class="table table-bordered">
<thead>
<tr>
<th><b>Aircraft</b></th>
<th><b>Registration</b></th>
</tr>
</thead>
<tbody>
@foreach($prelim as $p)
<tr>
<td>{{$p->airlines}}</td>
<td>{{$p->registrasi}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection