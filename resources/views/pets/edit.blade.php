@extends('layouts.app')
@section('content')
    <div class="container">
        <h1> Edita la informacion de tu mascota</h1>
        <div class="card">
            <div class="card-body">
                <form class="form" action="{{ route('pets.update', $pet) }} " method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <label class="form-label"> Name</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') ?? $pet->name }}"
                            required>
                    </div>
                    <div class="form-row mt-3">
                        <label class="form-label"> Tipo de mascota</label>
                        <select class="custom-select" name="tipo" required>
                            <option value="">Select... </option>
                            <option {{ old('type') == 'gato' ? 'selected' : ($pet->type == 'gato' ? 'selected' : '') }}
                                value="gato">Gato </option>
                            <option {{ old('type') == 'conejo' ? 'selected' : ($pet->type == 'conejo' ? 'selected' : '') }}
                                value="conejo">Conejo </option>
                            <option {{ old('type') == 'perro' ? 'selected' : ($pet->type == 'perro' ? 'selected' : '') }}
                                value="perro">Perro </option>
                            <option
                                {{ old('type') == 'caballo' ? 'selected' : ($pet->type == 'caballo' ? 'selected' : '') }}
                                value="caballo">Caballo </option>
                        </select>
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
@endsection
