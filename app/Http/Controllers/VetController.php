<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class VetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function isVet()
    {
        if (auth()->user()->admin)
            return true;
    }

    public function index()
    {
        function isVet()
        {
            if (auth()->user()->admin)
                return true;
        }


        if (isVet()) {
            $books = Book::with('user')->paginate(10);
            // dd($books);
            return view('vet.index', compact('books'));
        }
        return redirect()->route('home')->withErrors('No tienes ese acceso ');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
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
    public function destroy(string $id)
    {
        //
    }
}
