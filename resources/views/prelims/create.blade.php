@extends("layouts.global")
@section("title") Create Prelim @endsection
@section("content")
<div class="col-md-8">
   
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('prelims.store')}}"method="POST">
    @csrf
    <label for ="aircrafts">Select Aircrafts</label>
    <select class="form-control" name="aircrafts">
   
    <option>---Select Aircraft---</option>
      
    @foreach ($registrasi as $data => $regis)
      <option value="{{ $regis }}"> {{$airlines[$data]}}</option>
    
    @endforeach    
  </select>
   
</form>
</div>
@endsection