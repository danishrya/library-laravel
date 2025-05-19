@extends('layout.app')
@section('content')
<main class="flex-1 overflow-y-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Book Details</h1>
        <div class="flex space-x-2">
            <a href="{{ route('books.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white py-1.5 px-3 rounded-lg flex items-center space-x-1 transition duration-200 text-sm">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Books</span>
            </a>
            @if(auth()->user() && auth()->user()->is_admin)
            <a href="{{ route('books.edit', $books) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white py-1.5 px-3 rounded-lg flex items-center space-x-1 transition duration-200 text-sm">
                <i class="fas fa-edit"></i>
                <span>Edit Book</span>
            </a>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $books->nama_buku }}</h2>
                
                <div class="mb-4">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase">Publisher</h3>
                    <p class="text-gray-800">{{ $books->penerbit }}</p>
                </div>
                
                <div class="mb-4">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase">Publication Year</h3>
                    <p class="text-gray-800">{{ $books->tahun_terbit }}</p>
                </div>
                
                <div class="mb-4">
                    <h3 class="text-sm font-semibold text-gray-600 uppercase">Number of Pages</h3>
                    <p class="text-gray-800">{{ $books->jumlah_halaman }}</p>
                </div>
            </div>
            
            <div>
                <h3 class="text-sm font-semibold text-gray-600 uppercase mb-2">Description</h3>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-800 whitespace-pre-line">{{ $books->description }}</p>
                </div>
            </div>
        </div>
    </div>
    
    @if(auth()->user() && auth()->user()->is_admin)
    <div class="mt-6 flex justify-end">
        <form action="{{ route('books.destroy', $books) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg flex items-center space-x-1 transition duration-200">
                <i class="fas fa-trash"></i>
                <span>Delete Book</span>
            </button>
        </form>
    </div>
    @endif
</main>
@endsection