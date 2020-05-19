@extends("layouts.global")
@section("title") Aircraft list @endsection
@section("content")
<div class="col-md-8">
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
        <form action="{{route('aircrafts.index')}}">
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
            <a href="{{route('aircrafts.create')}}" class="btn btn-primary">Input Aircraft</a>
        </div>
    </div>
    <br>
<table class="table table-bordered">
<thead>
<tr>
<th><b>Regitrasi</b></th>
<th><b>Airline</b></th>
<th><b>RTS Plan</b></th>
<th><b>Days To RTS</b></th>
<th><b>Action</b></th>
</tr>
</thead>
<tbody>
@foreach($aircrafts as $index => $a)
<tr>
<td>{{$a->registrasi}}</td>
<td>{{$a->airlines}}</td>
<td>{{$a->rts_plan}}</td>
<td> 

    
</td> 
     <td>
         <a class="btn btn-info text-white btn-sm" href="{{route('aircrafts.edit',[$a->id])}}">Edit</a>
        <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('aircrafts.destroy', [$a->id])}}" method="POST">
            @csrf
        <input type="hidden" name="_method"  value="DELETE">
        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
        </form>
        <a href="{{route('aircrafts.show', [$a->id])}}" class="btn btn-primary btn-sm">Detail</a>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection