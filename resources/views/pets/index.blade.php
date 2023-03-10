@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Mascotas</h1>
        {{-- @dd($pets) --}}

        @empty($pets[0])
            <h4>No tienes mascotas deseas agregar una ?</h4>
        @else
            <div class="card">
                <h5 class="card-header">Tus mascotas</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($pets as $pet)
                                <tr>
                                    <td>
                                        {{ $pet->id }}
                                    </td>
                                    <td> {{ $pet->name }}</td>
                                    <td>
                                        {{ $pet->type }}
                                    </td>

                                    <td class="">
                                        <div class="d-flex">
                                            <a href="{{ route('pets.edit', $pet) }} "><img width="20px"
                                                    src="https://cdn-icons-png.flaticon.com/512/1827/1827933.png"
                                                    alt="">
                                            </a>
                                            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="list-group-item list-group-item-action px-2"
                                                    href="#"><img width="20px"
                                                        src="https://cdn-icons-png.flaticon.com/512/5590/5590342.png"
                                                        alt="">
                                                </button>

                                            </form>

                                            <a href="#">
                                                <img width="20px" src="https://cdn-icons-png.flaticon.com/512/159/159604.png"
                                                    alt="">
                                            </a>

                                        </div>



                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @endempty
        <a href="{{ route('pets.create') }} " class="btn btn-primary mt-2">Crear o vincular una nueva mascota</a>


    </div>
@endsection
