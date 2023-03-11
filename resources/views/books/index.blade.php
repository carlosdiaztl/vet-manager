@extends('layouts.app')
@section('content')
    <div class="container">
        <h1> Citas</h1>
        {{-- @dd($bookss) --}}
        @empty($books[0])
            <div class="card">
                <div class="card-title">
                    <h4>No tienes citas deseas agregar una ?</h4>

                </div>
            </div>
        @else
            {{-- @dd($pets) --}}
            <div class="card">
                <h5 class="card-header">Tus reservas</h5>
                <div class="table-responsive text-nowrap">
                    <table class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Tipo de cita</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($books as $book)
                                <tr>
                                    <td>
                                        {{ $book->id }}
                                    </td>
                                    <td> {{ $book->date }}</td>
                                    <td>
                                        {{ $book->type }}
                                    </td>

                                    <td class="">
                                        <div class="d-flex">
                                            <a href="{{ route('books.edit', $book) }} "><img width="20px"
                                                    src="https://cdn-icons-png.flaticon.com/512/1827/1827933.png"
                                                    alt="">
                                            </a>
                                            <form action="{{ route('books.destroy', $book) }}" method="POST">
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
        <div class="card mt-2">
            <div class="card-header">
                <div class="card-title">Calendario
                </div>
            </div>
            <div class="card-body">
                <div id='calendar'></div>
                <div class="modal fade" id="evento" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Body
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal trigger button -->
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#evento">
            Launch
        </button>

        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->



        <!-- Optional: Place to the bottom of scripts -->
        <script>
            const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
        </script>
    </div>
@endsection
