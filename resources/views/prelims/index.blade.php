@extends("layouts.global")
@section("title") Aircraft list Preliminary @endsection
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
            <a href="{{route('prelims.create')}}" class="btn btn-primary">Input Prelim</a>
        </div>
    </div>
    <br>
<table class="table table-bordered">
<thead>
<tr>
<th><b>Regitrasi</b></th>
<th><b>Airline</b></th>
<th><b>RTS Plan</b></th>
<th><b>Status</b></th>
<th><b>Action</b></th>
</tr>
</thead>
<tbody>
@foreach($aircrafts as $a)

<tr>
<td>{{$a->registrasi}}</td>
<td>{{$a->airlines}}</td>
<td>{{$a->rts_plan}}</td>
<td></td>
    
     <td>
        
        <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('prelims.destroy', [$a->id])}}" method="POST">
            @csrf
        <input type="hidden" name="_method"  value="DELETE">
        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
        </form>
        <a href="{{route('prelims.show', [$a->id])}}" class="btn btn-primary btn-sm">Detail</a>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection