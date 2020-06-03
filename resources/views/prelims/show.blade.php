@extends("layouts.global")
@section("title")  list Preliminary {{$aircrafts->registrasi}} @endsection
@section("content")
<div class="col-md-8">
   
   
<table class="table table-bordered">
<thead>
<tr>
<th><b>Descrption</b></th>
<th><b>Finding</b></th>
<th><b>seat Position</b></th>
</tr>
</thead>
<tbody>
@foreach($prelims as $p )

<tr>
<td>{{$p->description}}</td>
<td>{{$p->finding}}</td>
<td>{{$p->seat_position}}</td>

    </tr>
    @endforeach
    </tbody>
    </table>
</div>
@endsection