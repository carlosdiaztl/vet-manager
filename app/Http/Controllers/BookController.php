<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // ->only('edit','destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(2);
        // is vet is true ??


        // if(auth()->user()->isVet()){
        //     $books= Book::all();
        //     return view('vet.books',compact('books'));
        // }
        if (auth()->user()) {
            $books =  auth()->user()->dates;

            return view('books.index', compact('books'));
        }
        // return view('books.index');

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = auth()->user()->pets;
        return view('books.create', compact('pets'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $busqueda = Book->where(function ($query) use ($request) {
        //     return $query->where('hora', $request->input('hora'));
        // });


        $validatedData = $request->validate([
            'date' => [
                'required',
                'date_format:Y-m-d',
                Rule::unique('books')->where(function ($query) use ($request) {
                    return $query->where('hour', $request->input('hour'));
                }),
            ],
            'hour' => 'required|date_format:H:i',
            'mascotaName' => "required"
        ]);
        // $request->validate([
        //     'fecha' => 'required|date_format:Y-m-d',
        //     'hora' => "required|date_format:H:i",
        //     'mascotaName' => "required"
        // ]);


        $book = [
            'date' => $request['date'],
            'hour' => $request['hour'],
            'petName' => $request['mascotaName'],
            'user_id' => auth()->user()->id,

        ];
        // dd($book);
        Book::create($book);
        //
        return redirect()->route('books.index')->withSuccess("Se ha agregado tu cita para el dia  {$request['fecha']} a las {$request['hora']}  con exito ");
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->withSuccess("Su reserva para el dia {$book->date} a las {$book->hour} ha sido eliminada  ");
        //
    }
}
