<h3>Preliminary : {{$aircrafts->registrasi}} </h3>
<h3>Date :  ({{$aircrafts->created_at}}) </h3>

<br>
<table class="table table-bordered">
    <thead>
    <tr>
    <th><b>Descrption</b></th>
    <th><b>Finding</b></th>
    <th><b>seat Position</b></th>
    <th><b>P/N</b></th>
    <th><b>QTY</b></th>
    <th><b>Action</b></th>
    <th><b>EST. MANHOURS</b></th>
    <th><b>VJC Remark </b></th>
    <th><b>VJC MHR Remask</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($prelim as $p )
    
    <tr>
    <td>{{$p->description}}</td>
    <td>{{$p->finding}}</td>
    <td>{{$p->seat_position}}</td>
    <td></td>
    <td></td>
    <td>{{$p->action}}</td>
    <td></td>
    <td></td>
    <td></td>
        </tr>
        @endforeach
        </tbody>
        </table>