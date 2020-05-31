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
    <select class="form-control" name="aircraft[]">
       <option>---Select Aircraft---</option>
          @foreach ($aircraft as $air)
      <option value="{{$air->id}}"> {{$air->registrasi}} ( {{$air->airlines}} )</option>
        @endforeach    
  </select>
  <br>
  <div id="entry1" class="clonedInput" name="clonedInput">
    <h2 id="reference" name="reference" class="heading-reference">#1</h2>
    <br>
    <div class="form-group">
    <label class="desc ">Description</label><br>
    <input id="description" type="text" class="form-control input_desc" name="description[]" placeholder="Arcmcap, Escutheon, etc"/>
    </div>
    <br>
    <div class="form-group">
    <label class="finding">Finding</label><br>
    <input id="finding" type="text" class="form-control input_find" name="finding[]" placeholder="Broken, Dirty, etc"/>
    </div>
    <br>
    <div class="form-group">
    <label class="seat">Seat Position</label><br>
    <input id="seat_postion" type="text" class="form-control input_seat" name="seat_position[]" placeholder="1A,1B etc"/>
    </div>
    <br>
    <div class="form-group">
    <label class="act">Action</label><br>
    <input id="action" type="text" class="form-control input_act" name="action[]" placeholder="Replace, Repair, etc"/>
    </div>
    </div>
    <p>
      <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">Tambah form</button>
        <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">Hapus form diatas</button>
      </p>
    <input type="submit" id="submit" class="btn btn-primary" value="Save"/>
  </fieldset>
</form>

</div>
@section('footer-scripts')
<script type="text/javascript">
$(document).ready(function() {
  $(function () {
    $('#btnAdd').click(function () {
        var num     = $('.clonedInput').length, // Cek berapa banyak form yang telah kita duplikasi
            newNum  = new Number(num + 1),      // Tambahkan nilai 1 untuk setiap ID duplikasi
            newElem = $('#entry' + num).clone().attr('id', 'entry' + newNum).fadeIn('slow'); // Buat elemen baru dengan fungsi clone(), dan manipulasi ID dengan nilai newNum
        // H2 - section
        newElem.find('.heading-reference').attr('id', 'ID' + newNum + '_reference').attr('name', 'ID' + newNum + '_reference').html('Entry #' + newNum);
  
        // Nama depan - text
        newElem.find('.desc').attr('for', 'ID' + newNum + '_description[]');
        newElem.find('.input_desc').attr('id', 'ID' + newNum + '_description[]').attr('name', 'ID' + newNum + '_description[]').val('');
  
        // Nama belakang - text
        newElem.find('.finding').attr('for', 'ID' + newNum + '_finding[]');
        newElem.find('.input_find').attr('id', 'ID' + newNum + '_finding[]').attr('name', 'ID' + newNum + '_finding[]').val('');
  
        // Status- checkbox
        newElem.find('.seat').attr('for', 'ID' + newNum + '_seat_position[]');
        newElem.find('.input_seat').attr('id', 'ID' + newNum + '_seat_position[]').attr('name', 'ID' + newNum + '_seat_position[]').val('');
  
        // Email - text
        newElem.find('.act').attr('for', 'ID' + newNum + '_action[]');
        newElem.find('.input_act').attr('id', 'ID' + newNum + '_action[]').attr('name', 'ID' + newNum + '_action[]').val('');
  
        
    // Insert elemen baru setelah field input duplikasi yang terakhir 
        $('#entry' + num).after(newElem);
        $('#ID' + newNum + '_description').focus();
  
    // Enable tombol remove
        $('#btnDel').attr('disabled', false);
  
    // Sesuaikan nilai '5' sesuai kebutuhan untuk mengatur jumlah duplikasi maksimal yang diperbolehkan.
        if (newNum == 5)
        $('#btnAdd').attr('disabled', true).prop('value', "Batas maksimal duplikasi");
      });

        $('#btnDel').click(function () {
          // Dialog konfirmasi penghapusan
              if (confirm("Apakah anda yakin ingin menghapus form diatas? Form tidak dapat dikembalikan."))
                  {
                      var num = $('.clonedInput').length;
                      // Berapa banyak form duplikasi yang telah dibuat
                      $('#entry' + num).slideUp('slow', function () {$(this).remove();
                      // Jika hanya satu form, disable tombol remove 
                          if (num -1 === 1)
                      $('#btnDel').attr('disabled', true);
                      // enable tombol "add"
                      $('#btnAdd').attr('disabled', false).prop('value', "add section");});
                  }
              return false; // Hapus form duplikasi terakhir
          });
          // Enable tombol "add"
          $('#btnAdd').attr('disabled', false);
          // Disable tombol "remove"
          $('#btnDel').attr('disabled', true);
          $('#submit').click(function(){            
           $.ajax({  
                url:'{{url('/prelims/create/ajax')}}',  
                method:"POST",  
                data:$('#btnAdd').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                      alert(data.success);
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
  });
});
        </script>
        @endsection

@endsection