@extends('layout.app')
@section('content')
<main class="flex-1 overflow-y-auto p-5">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Books Management</h1>
        <div class="flex space-x-2">
            <a href="{{ route('books.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                <i class="fas fa-plus"></i>
                <span>Add New Book</span>
            </a>
            <button class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                <i class="fas fa-filter"></i>
                <span>Filter</span>
            </button>
        </div>
    </div>
    
    <!-- Book Categories -->
    <div class="flex flex-wrap gap-4 mb-6">
        <button class="bg-indigo-600 text-white px-4 py-2 rounded-full text-sm font-medium">
            All Books (2,547)
        </button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-50">
            Fiction (1,125)
        </button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-50">
            Non-Fiction (600)
        </button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-50">
            Academic (425)
        </button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-50">
            Children's (225)
        </button>
        <button class="bg-white text-gray-700 px-4 py-2 rounded-full text-sm font-medium hover:bg-gray-50">
            Reference (172)
        </button>
    </div>
    
    <!-- View Toggle -->
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-4">
            <button id="gridViewBtn" class="text-indigo-600 hover:text-indigo-800 focus:outline-none">
                <i class="fas fa-th-large text-lg"></i>
            </button>
            <button id="listViewBtn" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                <i class="fas fa-list text-lg"></i>
            </button>
        </div>
        <div class="flex items-center space-x-2">
            <span class="text-sm text-gray-600">Sort by:</span>
            <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-1 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                <option>Recently Added</option>
                <option>Title (A-Z)</option>
                <option>Title (Z-A)</option>
                <option>Most Borrowed</option>
                <option>Publication Year</option>
            </select>
        </div>
    </div>
    
    <!-- Grid View -->
    <div id="gridView" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">
        <!-- Book 1 -->
        <div class="book-card bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <img src="https://covers.openlibrary.org/b/id/8091016-L.jpg" alt="To Kill a Mockingbird" class="w-full h-56 object-cover">
                <div class="absolute top-2 right-2">
                    <span class="status-badge status-available">
                        Available
                    </span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">To Kill a Mockingbird</h3>
                <p class="text-sm text-gray-600 mb-2">Harper Lee</p>
                <div class="flex items-center text-yellow-400 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span class="ml-1 text-gray-600">4.5</span>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mb-4">
                    <span>1960</span>
                    <span>281 pages</span>
                    <span>Fiction</span>
                </div>
                <div class="flex space-x-2">
                    <a href="book-detail.html?id=1" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded text-sm flex-1 text-center">
                        View Details
                    </a>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-1 px-2 rounded text-sm">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Book 2 -->
        <div class="book-card bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <img src="https://covers.openlibrary.org/b/id/12000553-L.jpg" alt="The Great Gatsby" class="w-full h-56 object-cover">
                <div class="absolute top-2 right-2">
                    <span class="status-badge status-borrowed">
                        Borrowed
                    </span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">The Great Gatsby</h3>
                <p class="text-sm text-gray-600 mb-2">F. Scott Fitzgerald</p>
                <div class="flex items-center text-yellow-400 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span class="ml-1 text-gray-600">4.5</span>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mb-4">
                    <span>1925</span>
                    <span>180 pages</span>
                    <span>Fiction</span>
                </div>
                <div class="flex space-x-2">
                    <a href="book-detail.html?id=2" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded text-sm flex-1 text-center">
                        View Details
                    </a>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-1 px-2 rounded text-sm">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Book 3 -->
        <div class="book-card bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <img src="https://covers.openlibrary.org/b/id/10519651-L.jpg" alt="The Catcher in the Rye" class="w-full h-56 object-cover">
                <div class="absolute top-2 right-2">
                    <span class="status-badge status-available">
                        Available
                    </span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">The Catcher in the Rye</h3>
                <p class="text-sm text-gray-600 mb-2">J.D. Salinger</p>
                <div class="flex items-center text-yellow-400 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <span class="ml-1 text-gray-600">4.0</span>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mb-4">
                    <span>1951</span>
                    <span>234 pages</span>
                    <span>Fiction</span>
                </div>
                <div class="flex space-x-2">
                    <a href="book-detail.html?id=3" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded text-sm flex-1 text-center">
                        View Details
                    </a>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-1 px-2 rounded text-sm">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Book 4 -->
        <div class="book-card bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <img src="https://covers.openlibrary.org/b/id/12645114-L.jpg" alt="Of Mice and Men" class="w-full h-56 object-cover">
                <div class="absolute top-2 right-2">
                    <span class="status-badge status-reserved">
                        Reserved
                    </span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">Of Mice and Men</h3>
                <p class="text-sm text-gray-600 mb-2">John Steinbeck</p>
                <div class="flex items-center text-yellow-400 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <span class="ml-1 text-gray-600">4.0</span>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mb-4">
                    <span>1937</span>
                    <span>107 pages</span>
                    <span>Fiction</span>
                </div>
                <div class="flex space-x-2">
                    <a href="book-detail.html?id=4" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded text-sm flex-1 text-center">
                        View Details
                    </a>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-1 px-2 rounded text-sm">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Book 5 -->
        <div class="book-card bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <img src="https://covers.openlibrary.org/b/id/8231990-L.jpg" alt="Lord of the Flies" class="w-full h-56 object-cover">
                <div class="absolute top-2 right-2">
                    <span class="status-badge status-available">
                        Available
                    </span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">Lord of the Flies</h3>
                <p class="text-sm text-gray-600 mb-2">William Golding</p>
                <div class="flex items-center text-yellow-400 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                    <span class="ml-1 text-gray-600">3.5</span>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mb-4">
                    <span>1954</span>
                    <span>224 pages</span>
                    <span>Fiction</span>
                </div>
                <div class="flex space-x-2">
                    <a href="book-detail.html?id=5" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded text-sm flex-1 text-center">
                        View Details
                    </a>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-1 px-2 rounded text-sm">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Book 6 -->
        <div class="book-card bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <img src="https://covers.openlibrary.org/b/id/8028347-L.jpg" alt="1984" class="w-full h-56 object-cover">
                <div class="absolute top-2 right-2">
                    <span class="status-badge status-available">
                        Available
                    </span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">1984</h3>
                <p class="text-sm text-gray-600 mb-2">George Orwell</p>
                <div class="flex items-center text-yellow-400 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span class="ml-1 text-gray-600">4.5</span>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mb-4">
                    <span>1949</span>
                    <span>328 pages</span>
                    <span>Fiction</span>
                </div>
                <div class="flex space-x-2">
                    <a href="book-detail.html?id=6" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded text-sm flex-1 text-center">
                        View Details
                    </a>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-1 px-2 rounded text-sm">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Book 7 -->
        <div class="book-card bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <img src="https://covers.openlibrary.org/b/id/7222373-L.jpg" alt="Brave New World" class="w-full h-56 object-cover">
                <div class="absolute top-2 right-2">
                    <span class="status-badge status-borrowed">
                        Borrowed
                    </span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">Brave New World</h3>
                <p class="text-sm text-gray-600 mb-2">Aldous Huxley</p>
                <div class="flex items-center text-yellow-400 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <span class="ml-1 text-gray-600">4.0</span>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mb-4">
                    <span>1932</span>
                    <span>311 pages</span>
                    <span>Fiction</span>
                </div>
                <div class="flex space-x-2">
                    <a href="book-detail.html?id=7" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded text-sm flex-1 text-center">
                        View Details
                    </a>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-1 px-2 rounded text-sm">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Book 8 -->
        <div class="book-card bg-white rounded-lg shadow-md overflow-hidden">
            <div class="relative">
                <img src="https://covers.openlibrary.org/b/id/8141405-L.jpg" alt="Pride and Prejudice" class="w-full h-56 object-cover">
                <div class="absolute top-2 right-2">
                    <span class="status-badge status-available">
                        Available
                    </span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">Pride and Prejudice</h3>
                <p class="text-sm text-gray-600 mb-2">Jane Austen</p>
                <div class="flex items-center text-yellow-400 text-sm mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <span class="ml-1 text-gray-600">5.0</span>
                </div>
                <div class="flex justify-between text-xs text-gray-500 mb-4">
                    <span>1813</span>
                    <span>432 pages</span>
                    <span>Fiction</span>
                </div>
                <div class="flex space-x-2">
                    <a href="book-detail.html?id=8" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded text-sm flex-1 text-center">
                        View Details
                    </a>
                    <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-1 px-2 rounded text-sm">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- List View (Hidden by default) -->
    <div id="listView" class="hidden mb-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Book
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Year
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Genre
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Book 1 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-md object-cover" src="https://covers.openlibrary.org/b/id/8091016-L.jpg" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            To Kill a Mockingbird
                                        </div>
                                        <div class="text-xs text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span class="text-gray-500">4.5</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Harper Lee</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">1960</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Fiction</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="status-badge status-available">
                                    Available
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="book-detail.html?id=1" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- Book 2 -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-md object-cover" src="https://covers.openlibrary.org/b/id/12000553-L.jpg" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            The Great Gatsby
                                        </div>
                                        <div class="text-xs text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span class="text-gray-500">4.5</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">F. Scott Fitzgerald</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">1925</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Fiction</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="status-badge status-borrowed">
                                    Borrowed
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="book-detail.html?id=2" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                </div>
                            </td>
                        </tr>
                        
                        <!-- More book rows... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="flex items-center justify-between">
        <div class="flex-1 flex justify-between sm:hidden">
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Previous
            </a>
            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Next
            </a>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">8</span> of <span class="font-medium">2,547</span> results
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Previous</span>
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        1
                    </a>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        2
                    </a>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        3
                    </a>
                    <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                        ...
                    </span>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        319
                    </a>
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Next</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</main>
@endsection