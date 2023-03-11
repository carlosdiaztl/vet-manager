@extends('layouts.app')
@section('content')
    <div class="container">
        <h1> Agregar nueva cita</h1>
        <div class="col-12">


            <div class="card">

                <div class="card-body">

                    <form class="" action="{{ route('books.store') }} " method="POST">
                        @csrf
                        <div class="form-row">
                            <label class="form-label"> fecha</label>
                            <input required type="datetime-local" name="date" value="{{ old('date') }}">

                            {{-- <input class="form-control" type="datetime-local" name="date" value="{{ old('date') }}"
                                required> --}}
                        </div>

                        {{-- <div class="form-row">
                            <label class="form-label"> fecha</label>
                            <input class="form-control" type="time" name="hour" value="{{ old('hour') }}" required>
                        </div> --}}
                        <div class="form-row mt-3">
                            @empty($pets[0])
                                <h4>Por favor agrega primero una mascota </h4>
                                <a class="btn btn-success" href="{{ route('pets.create') }} ">Agregar una mascota</a>
                            @else
                                <label class="form-label"> Selecciona tu mascota</label>
                                <select class="custom-select" name="mascotaName" required>
                                    <option value="" selected>Selecciona una opcion ...</option>


                                    @foreach ($pets as $pet)
                                        <option value="{{ $pet->name }} ">{{ $pet->name }} </option>
                                    @endforeach
                                @endempty


                            </select>
                            <div class="form-row mt-3">
                                <label class="form-label"> Tipo de consulta</label>
                                <select class="custom-select" name="type" required>
                                    <option value="" selected>Selecciona una opcion ... </option>
                                    <option {{ old('type') }} value="consulta-basica">Consulta-basica </option>
                                    <option {{ old('type') }} value="especializada">Especializada </option>
                                    <option {{ old('type') }} value="peluqueria">Peluqueria </option>

                                </select>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Agregar

                            </button>

                        </div>


                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection
