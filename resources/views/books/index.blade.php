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
    <!-- Books Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-4">
        <div class="table-container overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Author
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ISBN
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Year
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Genre
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rating
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-xs">
                    <!-- Book 1 -->
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">To Kill a Mockingbird</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Harper Lee</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">978-0-06-112008-4</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">1960</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Fiction</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ml-1 text-gray-600">4.5</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Available
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=1" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 2 -->
                    {{-- <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">The Great Gatsby</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">F. Scott Fitzgerald</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">978-0-7432-7356-5</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">1925</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Fiction</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ml-1 text-gray-600">4.5</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Borrowed
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=2" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 3 -->
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">The Catcher in the Rye</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">J.D. Salinger</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">978-0-316-76948-0</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">1951</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Fiction</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="ml-1 text-gray-600">4.0</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Available
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=3" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 4 -->
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Of Mice and Men</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">John Steinbeck</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">978-0-14-017739-8</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">1937</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Fiction</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="ml-1 text-gray-600">4.0</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Reserved
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=4" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 5 -->
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Lord of the Flies</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">William Golding</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">978-0-571-05686-6</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">1954</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Fiction</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span class="ml-1 text-gray-600">3.5</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Available
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=5" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 6 -->
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">1984</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">George Orwell</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">978-0-452-28423-4</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">1949</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Fiction</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ml-1 text-gray-600">4.5</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Available
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=6" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 7 -->
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Brave New World</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Aldous Huxley</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">978-0-06-085052-4</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">1932</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Fiction</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="ml-1 text-gray-600">4.0</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Borrowed
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=7" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 8 -->
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="font-medium text-gray-900">Pride and Prejudice</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Jane Austen</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">978-0-14-143951-8</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">1813</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="text-gray-900">Fiction</div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ml-1 text-gray-600">5.0</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Available
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=8" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pagination - Simplified -->
    <div class="flex items-center justify-between text-sm">
        <div>
            <p class="text-gray-700">
                Showing <span class="font-medium">1</span> to <span class="font-medium">8</span> of <span class="font-medium">2,547</span> results
            </p>
        </div>
        <div>
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="relative inline-flex items-center px-2 py-1 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <i class="fas fa-chevron-left text-xs"></i>
                </a>
                <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-3 py-1 border text-sm font-medium">
                    1
                </a>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-3 py-1 border text-sm font-medium">
                    2
                </a>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-3 py-1 border text-sm font-medium">
                    3
                </a>
                <span class="relative inline-flex items-center px-3 py-1 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                    ...
                </span>
                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-3 py-1 border text-sm font-medium">
                    319
                </a>
                <a href="#" class="relative inline-flex items-center px-2 py-1 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <i class="fas fa-chevron-right text-xs"></i>
                </a>
            </nav>
        </div>
    </div>
</main>
@endsection