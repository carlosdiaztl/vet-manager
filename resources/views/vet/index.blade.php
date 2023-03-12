@extends('layouts.app')

@section('content')
    <div class="col-xl-12">
        <div class="nav-align-top nav-tabs-shadow mb-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                        Calendario
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                        Tabla
                    </button>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                    <div class="container">
                        <h1> Hola vet</h1>
                        {{-- @dd($pets) --}}

                        @empty($books[0])
                            <h4>De momento no hay ninguna reserva o cita </h4>
                        @else
                            <div class="container">
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <div class="card-title">Calendario
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id='calendar'></div>
                                        <div id="evento" class="modal">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Evento</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" id="form1">

                                                            <div class="mb-3">
                                                                <label for="type" class="form-label">Tipo cita</label>
                                                                <input type="text" class="form-control" name="type"
                                                                    id="type" readonly>
                                                            </div>

                                                            <div class="row g-2">
                                                                <div class="col mb-0">
                                                                    <label for="usuario" class="form-label">Nombre
                                                                        usuario</label>
                                                                    <input type="text" id="usuario" class="form-control"
                                                                        readonly />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="identificacion"
                                                                        class="form-label">Identificacion</label>
                                                                    <input type="number" id="identificacion"
                                                                        class="form-control" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="row g-2">
                                                                <div class="col mb-0">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" id="email"
                                                                        class="form-control"readonly />
                                                                </div>
                                                                <div class="col mb-0">
                                                                    <label for="phone" class="form-label">Telefono</label>
                                                                    <input type="phone" id="phone" class="form-control"
                                                                        placeholder="phone" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="petName" class="form-label">Nombre de la
                                                                    mascota</label>
                                                                <input type="text" class="form-control" name="petName"
                                                                    id="petName" readonly>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="start" class="form-label">Hora de
                                                                    inicio</label>
                                                                <input type="text" class="form-control" name="start"
                                                                    id="start" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="date_end" class="form-label">Hora y fecha de
                                                                    fin</label>
                                                                <input type="text" class="form-control" name="date_end"
                                                                    id="date_end" readonly>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                    data-bs-target="#evento">
                                    Launch
                                </button>
                            </div>
                        @endempty

                    </div>
                </div>
                <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                    <div class="container">


                        <h1> Hola vet</h1>
                        {{-- @dd($pets) --}}

                        @empty($books[0])
                            <h4>De momento no hay ninguna reserva o cita </h4>
                        @else
                            <div class="container">
                                <div class="card">
                                    <h5 class="card-header">Tus Citas</h5>
                                    <div class="table-responsive text-nowrap">
                                        <table class="datatables-basic table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Cliente</th>
                                                    <th>Fecha</th>
                                                    <th>Mascota</th>
                                                    <th>Tipo de cita</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                @foreach ($books as $book)
                                                    {{-- @dd($books) --}}
                                                    <tr>
                                                        <td>
                                                            {{ $book->id }}
                                                        </td>
                                                        <td>
                                                            {{ $book->getRelations()['user']->name }}
                                                        </td>
                                                        <td> {{ $book->date }}</td>
                                                        <td> {{ $book->petName }}</td>
                                                        <td>
                                                            {{ $book->type }}
                                                        </td>

                                                        <td class="">
                                                            <div class="d-flex">
                                                                <a href="{{ route('books.edit', $book) }} "><img
                                                                        width="20px"
                                                                        src="https://cdn-icons-png.flaticon.com/512/1827/1827933.png"
                                                                        alt="">
                                                                </a>
                                                                <form action="{{ route('books.destroy', $book) }}"
                                                                    method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="list-group-item list-group-item-action px-2"
                                                                        href="#"><img width="20px"
                                                                            src="https://cdn-icons-png.flaticon.com/512/5590/5590342.png"
                                                                            alt="">
                                                                    </button>

                                                                </form>

                                                                <a href="#">
                                                                    <img width="20px"
                                                                        src="https://cdn-icons-png.flaticon.com/512/159/159604.png"
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
                            </div>
                        @endempty
                    </div>

                </div>
            </div>
        </div>



    </div>
@endsection
