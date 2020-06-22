@extends("layouts.global")
@section("title") Edit Prelim @endsection
@section("content")
<div class="col-md-8">
  @if(session('status'))
  <div class="alert alert-success">
      {{session('status')}}
  </div>
@endif
   
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('prelims.update', [$prelim->id])}} "method="POST">
    @csrf
    <input type="hidden"  value="PUT"  name="_method">
    
  
    <label class="desc ">Description</label><br>
    <input value="{{$prelim->description}}" id="description" type="text" class="form-control input_desc" name="description" placeholder="Arcmcap, Escutheon, etc"/>
    <br>
    <label class="finding">Finding</label><br>
    <input value="{{$prelim->finding}}" id="finding" type="text" class="form-control input_find" name="finding" placeholder="Broken, Dirty, etc"/>
    <br>
    <label class="seat">Seat Position</label><br>
    <input value="{{$prelim->seat_position}}" id="seat_postion" type="text" class="form-control input_seat" name="seat_position" placeholder="1A,1B etc"/>
    <br>
    <label class="act">Action</label><br>
    <input value="{{$prelim->action}}" id="action" type="text" class="form-control input_act" name="action" placeholder="Replace, Repair, etc"/>
    <br>
    <input type="submit" id="submit" class="btn btn-primary" value="Save"/>
</form>

</div>


@endsection