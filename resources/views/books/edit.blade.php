@extends('layouts.app')
@section('content')

 <!-- Edit book content -->
 <main class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold tracking-tight">Edit Buku</h2>
        <a href="{{ route('books.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Kembali</a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold">Detail Buku</h3>
            <p class="text-sm text-gray-500">Edit informasi buku</p>
        </div>
        <div class="p-5">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('books.update', $books) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="nama_buku" class="block text-sm font-medium mb-2">Nama Buku</label>
                    <input type="text" id="nama_buku" name="nama_buku" value="{{ old('nama_buku', $books->nama_buku) }}" placeholder="Masukkan judul buku" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div class="mb-5">
                    <label for="penerbit" class="block text-sm font-medium mb-2">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit', $books->penerbit) }}" placeholder="Nama penerbit" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>

                <div class="mb-5">
                    <label for="description" class="block text-sm font-medium mb-2">Deskripsi</label>
                    <textarea id="description" name="description" placeholder="Deskripsi singkat tentang buku" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">{{ old('description', $books->description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    <div>
                        <label for="tahun_terbit" class="block text-sm font-medium mb-2">Tahun Terbit</label>
                        <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $books->tahun_terbit) }}" placeholder="Contoh: 2023" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    </div>

                    <div>
                        <label for="jumlah_halaman" class="block text-sm font-medium mb-2">Jumlah Halaman</label>
                        <input type="number" id="jumlah_halaman" name="jumlah_halaman" value="{{ old('jumlah_halaman', $books->jumlah_halaman) }}" placeholder="Contoh: 320" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('books.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">Batal</a>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-primary-600 border border-transparent rounded-md hover:bg-primary-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection
