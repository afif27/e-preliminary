@extends("layouts.global")
@section("title")  list Preliminary {{$aircrafts->registrasi}} @endsection
@section("content")
<div class="col-md-8">
    <form onsubmit="return confirm('Export to excel ?')" class="d-inline" action="{{route('prelims.excel', [$aircrafts->id])}}" method="get">
        @csrf
    <input type="hidden" name="_method"  value="EXPORT EXCEL">
    <input type="submit" value="EXPORT EXCEL" class="btn btn-danger btn-sm">
    </form>
    <br>

   
<table class="table table-bordered">
<thead>
<tr>
<th><b>Descrption</b></th>
<th><b>Finding</b></th>
<th><b>seat Position</b></th>
<th><b>Action</b></th>
<th><b>Edit</b></th>
</tr>
</thead>
<tbody>
@foreach($prelims as $p )

<tr>
<td>{{$p->description}}</td>
<td>{{$p->finding}}</td>
<td>{{$p->seat_position}}</td>
<td>{{$p->action}}</td>
<td> <a class="btn btn-info text-white btn-sm" href="{{route('prelims.edit',[$p->id])}}">Edit</a></td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection