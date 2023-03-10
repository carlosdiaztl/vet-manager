@extends('layouts.app')
@section('content')
    <h1> Agregar nueva mascota</h1>
    <div class="card">
        <div class="card-body">
            <form class="form" action="{{ route('pets.store') }} " method="POST">
                @csrf
                <div class="form-row">
                    <label class="form-label"> Name</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-row mt-3">
                    <label class="form-label"> Tipo de mascota</label>
                    <select class="custom-select" name="tipo" required>
                        <option value="" selected>Select... </option>
                        <option {{ old('tipo') }} value="gato">Gato </option>
                        <option {{ old('tipo') }} value="conejo">Conejo </option>
                        <option {{ old('tipo') }} value="perro">Perro </option>
                        <option {{ old('tipo') }} value="caballo">Caballo </option>
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
@endsection
