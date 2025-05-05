<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required',
            'penerbit' => 'required',
            'description' => 'required',
            'tahun_terbit' => 'required|date_format:Y',
            'halaman' => 'required|integer'
        ]);

        Books::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Books::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Books::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_buku' => 'required',
            'penerbit' => 'required',
            'description' => 'required',
            'tahun_terbit' => 'required|date_format:Y',
            'halaman' => 'required|integer'
        ]);

        $book = Books::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Books::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Books::where('nama_buku', 'LIKE', "%{$query}%")
            ->orWhere('penerbit', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhere('tahun_terbit', 'LIKE', "%{$query}%")
            ->orWhere('halaman', 'LIKE', "%{$query}%")
            ->get();

        return view('books.index', compact('books'));
    }
    
}
