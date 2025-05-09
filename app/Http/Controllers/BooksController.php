<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view("books.index", compact('books'));
    }

    public function create(){
        return view("books.create");
    }

    public function store(Request $request){
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'description' => 'required|string',
            'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
            'jumlah_halaman' => 'required|integer|min:1',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')
        ->with('success', 'Buku berhasil ditambahkan');
        
    }

    public function show(Book $books){
        return view('books.show', compact('books'));
    }

    public function edit(Book $books){
        return view('books.edit', compact('books'));
    }
    
    public function update(Request $request, Book $books){
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'description' => 'required|string',
            'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
            'jumlah_halaman' => 'required|integer|min:1',
        ]);
        $books->update($request->all());

        return redirect()->route('books.index')
        ->with('success', 'Buku berhasil diupdate');
    }
    
    public function destroy(Book $books){
        $books->delete();
        
        return redirect()->route('books.index')
        ->with('success', 'Buku berhasil dihapus');
    }
}
