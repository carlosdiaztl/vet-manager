<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PetController extends Controller
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
        $pets = auth()->user()->pets;
        // dd($pets);
        return view('pets.index', compact('pets'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|min:4|max:30|string",
            'tipo' => "required|in:caballo,perro,gato,conejo",

        ]);
        $pet = [
            'name' => $request['name'],
            'type' => $request['tipo'],
            'user_id' => auth()->user()->id,

        ];

        Pet::create($pet);
        // dd($pet);
        return redirect()->route('pets.index')->withSuccess("Se ha agregado {$request['name']} con exito ");
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
    public function edit(Pet $pet)
    {
        return view('pets.edit', compact('pet'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => "required|min:4|max:30|string",
            'tipo' => "required|in:caballo,perro,gato,conejo",

        ]);
        $pet->update([
            'name' => $request['name'],
            'type' => $request['tipo'],
            // 'user_id' => auth()->user()->id,

        ]);

        // dd($pet);
        return redirect()->route('pets.index')->withSuccess("Se ha editado {$request['name']} con exito ");
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        // dd($pet);
        $pet->delete();
        return redirect()->route('pets.index')
            ->withSuccess("La mascota  {$pet->name}  ha sido eliminada");;
        //
    }
}
