@extends("layouts.global")
@section("title") Create Prelim @endsection
@section("content")
<div class="col-md-8">
  @if(session('status'))
  <div class="alert alert-success">
      {{session('status')}}
  </div>
@endif
   
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('prelims.store')}}"method="POST">
    @csrf
   <fieldset>
    <label for ="aircraft">Select Aircrafts</label>
    <select class="form-control" name="aircraft">
       <option>---Select Aircraft---</option>
          @foreach ($aircraft as $air)
      <option value="{{$air->id}}"> {{$air->registrasi}} ( {{$air->airlines}} )</option>
        @endforeach    
  </select>
  <br>
  <div id="entry1" class="clonedInput" name="clonedInput">
    <!---<h2 id="reference" name="reference" class="heading-reference">#1</h2> -->
    <br>
    <div class="form-group">
    <label class="desc ">Description</label><br>
    <input id="description" type="text" class="form-control input_desc" name="description" placeholder="Arcmcap, Escutheon, etc"/>
    </div>
    <br>
    <div class="form-group">
    <label class="finding">Finding</label><br>
    <input id="finding" type="text" class="form-control input_find" name="finding" placeholder="Broken, Dirty, etc"/>
    </div>
    <br>
    <div class="form-group">
    <label class="seat">Seat Position</label><br>
    <input id="seat_postion" type="text" class="form-control input_seat" name="seat_position" placeholder="1A,1B etc"/>
    </div>
    <br>
    <div class="form-group">
    <label class="act">Action</label><br>
    <input id="action" type="text" class="form-control input_act" name="action" placeholder="Replace, Repair, etc"/>
    </div>
    </div>
    <input type="submit" id="submit" class="btn btn-primary" value="Save"/>
  </fieldset>
</form>

</div>


@endsection