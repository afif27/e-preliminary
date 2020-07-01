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
<td>@if($a->status == "OPEN")
    <button type="button" class="badge bg-danger text-light" data-toggle="modal" data-target="#modal-status">{{$a->status}}</button>
    @elseif($a->status == "PROGRESS")
    <button type="button" class="badge bg-warning text-light" data-toggle="modal" data-target="#modal-status">{{$a->status}}</button>
    @elseif($a->status == "FINISH")
    <button type="button"class="badge bg-success text-light" data-toggle="modal" data-target="#modal-status">{{$a->status}}</button>
    @endif
    <div class="modal fade" id="modal-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form enctype="multipart/form-data" action="{{route('aircrafts.updateStatus', [$a->id])}} "method="POST">
                @csrf
                <input type="hidden"  value="PUT"  name="_method">
              <input type="radio" name="status" id="OPEN" value="OPEN">
              <label for="OPEN">OPEN</label>
              <input type="radio" name="status" id="PROGRESS"value="PROGRESS">
              <label for="PROGRESS">PROGRESS</label> 
              <input type="radio" name="status" id="FINISH" value="FINISH">
              <label for="FINISH">FINISH</label>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" id="submit" class="btn btn-primary" value="Save"/>
            </div>
          </form>
          </div>
        </div>
      </div>
    </td>
    
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