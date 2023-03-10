@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> Citas</h1>
        {{-- @dd($bookss) --}}
        @empty($books[0])
            <h4>No tienes citas deseas agregar una ?</h4>
        @else
            {{-- @dd($pets) --}}
            <div class="card">
                <h5 class="card-header">Tus reservas</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($books as $books)
                                <tr>
                                    <td>
                                        {{ $books->id }}
                                    </td>
                                    <td> {{ $books->date }}</td>
                                    <td>
                                        {{ $books->hour }}
                                    </td>

                                    <td class="">
                                        <div class="d-flex">
                                            <a href="{{ route('books.edit', $books) }} "><img width="20px"
                                                    src="https://cdn-icons-png.flaticon.com/512/1827/1827933.png"
                                                    alt="">
                                            </a>
                                            <form action="{{ route('books.destroy', $books) }}" method="POST">
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
        <a href="{{ route('books.create') }} " class="btn btn-primary mt-2">Agendar una nueva cita</a>


    </div>
@endsection
