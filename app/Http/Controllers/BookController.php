<?php

namespace App\Http\Controllers;


use App\Models\Book;
use Carbon\Carbon;
use DateInterval;
use DateTime;
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
        function notBetweenBookings($attribute, $value, $parameters,)
        {

            $start_date = Carbon::parse($parameters[0]);
            $end_date = Carbon::parse($parameters[1]);

            $bookings = Book::whereBetween('date', [$start_date, $end_date])
                ->orWhereBetween('date_end', [$start_date, $end_date])
                ->get();
            // dd($bookings, !empty($bookings), empty($bookings));
            foreach ($bookings as $book) {
                if ($book->id == true)
                    return false;
            }
            return true;
        }
        $fecha =  $request['date'];
        $fecha_obj = DateTime::createFromFormat('Y-m-d\TH:i', $fecha);
        $fecha_obj->add(new DateInterval('PT30M'));
        $nueva_fecha = $fecha_obj->format('Y-m-d\TH:i');
        $request['date_end'] = $nueva_fecha;
        $validatedData = $request->validate([
            'date' => [
                'required',
                'date_format:Y-m-d\TH:i',
                Rule::unique('books'),
                function ($attribute, $value, $fail) use ($nueva_fecha, $fecha) {
                    $reservationAvailable = notBetweenBookings($attribute, Carbon::parse($value), [Carbon::parse($fecha), Carbon::parse($nueva_fecha)]);
                    if (!$reservationAvailable) {
                        $fail('La fecha seleccionada u hora no está disponible.');
                    }
                },

            ],
            'date_end' => [
                'date_format:Y-m-d\TH:i',
                Rule::unique('books'),
            ],

            'mascotaName' => "required",
            'type' => "required|in:consulta-basica,especializada,peluqueria",
        ]);

        // dd($validatedData);


        $book = [
            'date' => $validatedData['date'],
            'date_end' => $validatedData['date_end'],
            'petName' => $validatedData['mascotaName'],
            'type' => $validatedData['type'],

            'user_id' => auth()->user()->id,

        ];

        // dd($book);
        Book::create($book);
        //
        return redirect()->route('books.index')->withSuccess("Se ha agregado tu cita para el dia  {$request['fecha']} a las   con exito ");
    }
    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

        $eventos =  auth()->user()->dates;
        // $event = Book::all();
        return response()->json($eventos);
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
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'date' => [
                'required',
                'date_format:Y-m-d\TH:i',
                Rule::unique('books')->ignore($book),
            ],
            'date_end' => [
                'required',
                'date_format:Y-m-d\TH:i',
                Rule::unique('books')->ignore($book),
            ],
            'mascotaName' => "required"

        ]);
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
