@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edita tu cita</h1>
        <div class="col-12">


            <div class="card">

                <div class="card-body">

                    <form class="" action="{{ route('books.update', $book) }} " method="POST">

                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <label class="form-label"> fecha</label>
                            <input required type="datetime-local" name="date" value="{{ old('date') ?? $book->date }}">

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

                                    @dump($pets)
                                    @foreach ($pets as $pet)
                                        <option
                                            {{ (old($pet->name) == $pet->name ? 'selected' : $pet->name == $book->petName) ? 'selected' : '' }}
                                            value="{{ $pet->name }}">
                                            {{ $pet->name }} </option>
                                        {{-- <option value="{{ $pet->name }} ">{{ $pet->name }} </option> --}}
                                    @endforeach
                                @endempty


                            </select>
                            <div class="form-row mt-3">
                                <label class="form-label"> Tipo de consulta</label>
                                <select class="custom-select" name="type" required>
                                    <option
                                        {{ (old($book->type) == 'consulta-basica' ? 'selected' : $book->type == 'consulta-basica') ? 'selected' : '' }}
                                        value="consulta-basica">
                                        consulta-basica </option>
                                    <option
                                        {{ (old($book->type) == 'especializada' ? 'selected' : $book->type == 'especializada') ? 'selected' : '' }}
                                        value="especializada">
                                        especializada </option>
                                    <option
                                        {{ (old($book->type) == 'peluqueria' ? 'selected' : $book->type == 'peluqueria') ? 'selected' : '' }}
                                        value="peluqueria">
                                        peluqueria </option>

                                    {{-- 
                                    <option value="{{ $book->type }}" selected>{{ $book->type }} </option>


                                    <option {{ old('type') }} value="consulta-basica">
                                        {{ 'consulta-basica' == $book->type ? '' : 'consulta-basica' }} </option>
                                    <option {{ old('type') }} value="especializada">
                                        {{ 'especializada' == $book->type ? '' : 'especializada' }} </option>
                                    <option {{ old('type') }} value="peluqueria">
                                        {{ 'peluqueria' == $book->type ? '' : 'peluqueria' }} </option> --}}

                                </select>
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Editar

                            </button>

                        </div>


                    </form>




                </div>
            </div>
        </div>
    </div>
@endsection
