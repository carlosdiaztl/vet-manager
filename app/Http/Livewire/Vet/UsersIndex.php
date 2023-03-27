<?php

namespace App\Http\Livewire\Vet;

use App\Models\Book;
use Livewire\Component;

class UsersIndex extends Component
{
    public $query;

    public function render()
    {

        $books = Book::with('user')->paginate(10);
        // dd($books);
        return view('livewire.vet.users-index', compact('books'));
    }
}
