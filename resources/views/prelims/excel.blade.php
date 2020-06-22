<table class="table table-bordered">
    <thead>
    <tr>
    <th><b>Descrption</b></th>
    <th><b>Finding</b></th>
    <th><b>seat Position</b></th>
    <th><b>Action</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($prelim as $p )
    
    <tr>
    <td>{{$p->description}}</td>
    <td>{{$p->finding}}</td>
    <td>{{$p->seat_position}}</td>
    <td>{{$p->action}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>