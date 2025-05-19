@extends('layout.app')
@section('content')
<main class="flex-1 overflow-y-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Edit Book</h1>
        <div class="flex space-x-2">
            <a href="{{ route('books.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white py-1.5 px-3 rounded-lg flex items-center space-x-1 transition duration-200 text-sm">
                <i class="fas fa-arrow-left"></i>
                <span>Back to Books</span>
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4 p-6">
        <form action="{{ route('books.update', $books) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label for="nama_buku" class="block text-sm font-medium text-gray-700 mb-1">Book Name</label>
                        <input type="text" name="nama_buku" id="nama_buku" value="{{ old('nama_buku', $books->nama_buku) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('nama_buku')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="penerbit" class="block text-sm font-medium text-gray-700 mb-1">Publisher</label>
                        <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit', $books->penerbit) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('penerbit')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="tahun_terbit" class="block text-sm font-medium text-gray-700 mb-1">Publication Year</label>
                            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit', $books->tahun_terbit) }}" min="1900" max="{{ date('Y') }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('tahun_terbit')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="jumlah_halaman" class="block text-sm font-medium text-gray-700 mb-1">Number of Pages</label>
                            <input type="number" name="jumlah_halaman" id="jumlah_halaman" value="{{ old('jumlah_halaman', $books->jumlah_halaman) }}" min="1" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                            @error('jumlah_halaman')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" id="description" rows="8" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ old('description', $books->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg transition duration-200">
                    Update Book
                </button>
            </div>
        </form>
    </div>
</main>
@endsection