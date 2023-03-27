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
                {{ $books->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endempty
