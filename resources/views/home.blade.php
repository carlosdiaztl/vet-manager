@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Que deseas hacer hoy?</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex flex-column">
                            <a href="{{ route('books') }}" class="col-6 btn btn-primary m-2">Reservar una cita</a>
                            <a href="">Ver mascotas</a>

                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
