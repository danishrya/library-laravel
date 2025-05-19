@extends('layout.app')
@section('content')
<main class="flex-1 overflow-y-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Books Management</h1>
        <div class="flex space-x-2">
            <a href="{{ route('books.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1.5 px-3 rounded-lg flex items-center space-x-1 transition duration-200 text-sm">
                <i class="fas fa-plus"></i>
                <span>Add New Book</span>
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Books Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
        <div class="table-container overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Book Name
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Publisher
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Year
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pages
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-xs">
                    @forelse($books as $book)
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">{{ $book->nama_buku }}</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">{{ $book->penerbit }}</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">{{ $book->tahun_terbit }}</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">{{ $book->jumlah_halaman }}</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('books.show', $book) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                @if(auth()->user() && auth()->user()->is_admin)
                                <a href="{{ route('books.edit', $book) }}" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                            No books found. <a href="{{ route('books.create') }}" class="text-indigo-600 hover:underline">Add a book</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        {{ $books->links() }}
    </div>
</main>
@endsection