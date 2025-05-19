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
        $books = Book::latest()->paginate(10); // Changed from all() to paginate(10)
        return view("books.index", compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     */
    public function show(Book $books)
    {
        return view('books.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $books)
    {
        return view('books.edit', compact('books'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $books)
    {
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
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $books)
    {
        $books->delete();
        
        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus');
    }
}