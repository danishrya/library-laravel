@extends('layout.app')
@section('content')
<main class="flex-1 overflow-y-auto p-5">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Books Management</h1>
        <div class="flex space-x-2">
            <a href="create.html" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
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
    
    <!-- Search and Filter Options -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <div class="relative">
                    <input type="text" id="search" placeholder="Title, author, ISBN..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 pl-10 py-2 border">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>
            
            <div>
                <label for="genre" class="block text-sm font-medium text-gray-700 mb-1">Genre</label>
                <select id="genre" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2 border">
                    <option value="">All Genres</option>
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="academic">Academic</option>
                    <option value="children">Children's</option>
                    <option value="reference">Reference</option>
                </select>
            </div>
            
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2 border">
                    <option value="">All Status</option>
                    <option value="available">Available</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="reserved">Reserved</option>
                    <option value="overdue">Overdue</option>
                </select>
            </div>
            
            <div>
                <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                <select id="sort" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2 border">
                    <option value="title_asc">Title (A-Z)</option>
                    <option value="title_desc">Title (Z-A)</option>
                    <option value="author_asc">Author (A-Z)</option>
                    <option value="year_desc">Publication Year (Newest)</option>
                    <option value="year_asc">Publication Year (Oldest)</option>
                    <option value="popularity">Popularity</option>
                </select>
            </div>
        </div>
        
        <div class="flex justify-end mt-4">
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-md mr-2">
                Reset
            </button>
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md">
                Apply Filters
            </button>
        </div>
    </div>
    
    <!-- Books Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
        <div class="table-container">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Author
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ISBN
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Year
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Genre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Rating
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
                            <div class="text-sm font-medium text-gray-900">To Kill a Mockingbird</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Harper Lee</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">978-0-06-112008-4</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1960</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Fiction</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ml-1 text-gray-600">4.5</span>
                            </div>
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
                            <div class="text-sm font-medium text-gray-900">The Great Gatsby</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">F. Scott Fitzgerald</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">978-0-7432-7356-5</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1925</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Fiction</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ml-1 text-gray-600">4.5</span>
                            </div>
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
                    
                    <!-- Book 3 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">The Catcher in the Rye</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">J.D. Salinger</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">978-0-316-76948-0</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1951</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Fiction</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="ml-1 text-gray-600">4.0</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-available">
                                Available
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=3" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 4 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Of Mice and Men</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">John Steinbeck</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">978-0-14-017739-8</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1937</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Fiction</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="ml-1 text-gray-600">4.0</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-reserved">
                                Reserved
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=4" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 5 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Lord of the Flies</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">William Golding</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">978-0-571-05686-6</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1954</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Fiction</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span class="ml-1 text-gray-600">3.5</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-available">
                                Available
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=5" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 6 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">1984</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">George Orwell</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">978-0-452-28423-4</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1949</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Fiction</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ml-1 text-gray-600">4.5</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-available">
                                Available
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=6" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 7 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Brave New World</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Aldous Huxley</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">978-0-06-085052-4</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1932</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Fiction</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="ml-1 text-gray-600">4.0</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-borrowed">
                                Borrowed
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=7" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Book 8 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Pride and Prejudice</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Jane Austen</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">978-0-14-143951-8</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1813</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Fiction</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ml-1 text-gray-600">5.0</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-available">
                                Available
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="book-detail.html?id=8" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="text-yellow-600 hover:text-yellow-900">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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