@extends('layouts.app')
@section('content')
    <h1> Agregar nueva cita</h1>
    <div class="col-12">


        <div class="card">

            <div class="card-body">

                <form class="" action="{{ route('books.store') }} " method="POST">
                    @csrf
                    <div class="form-row">
                        <label class="form-label"> fecha</label>
                        <input class="form-control" type="date" name="date" value="{{ old('date') }}" required>
                    </div>
                    <div class="form-row">
                        <label class="form-label"> fecha</label>
                        <input class="form-control" type="time" name="hour" value="{{ old('hour') }}" required>
                    </div>
                    <div class="form-row mt-3">
                        @empty($pets[0])
                            <h4>Por favor agrega primero una mascota </h4>
                            <a class="btn btn-success" href="{{ route('pets.create') }} ">Agregar una mascota</a>
                        @else
                            <label class="form-label"> Selecciona tu mascota</label>
                            <select class="custom-select" name="mascotaName" required>
                                <option value="" selected>Select... </option>


                                @foreach ($pets as $pet)
                                    <option value="{{ $pet->name }} ">{{ $pet->name }} </option>
                                @endforeach
                            @endempty


                        </select>
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
@endsection
