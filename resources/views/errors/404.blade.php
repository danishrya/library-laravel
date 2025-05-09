@extends('layout.app')

@section('content')
<main class="flex-1 flex items-center justify-center p-6">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-900 mb-4">404</h1>
        <p class="text-2xl text-gray-600 mb-8">Halaman tidak ditemukan</p>
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-primary-600 text-white rounded-md hover:bg-primary-700 transition">Kembali ke Dashboard</a>
    </div>
</main>
@endsection

