@extends('layouts.global')

@section('content')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   Selamat datang <b>{{Auth::user()->name}}</b> , Selamat Bekerja !
                </div>
            </div>
        </div>
 
@endsection
