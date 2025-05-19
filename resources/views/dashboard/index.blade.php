@extends('layout.app')

@section('content')
<div class="space-y-6 w-full">
    <div class="flex item-center justify-betweeen">
        <h1 class="text-2xlfont-boldtext-gray-900">dashboard</h1>
    </div>
</div>
<main class="flex-1 overflow-y-auto p-5">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Dashboard Overview</h1>
        <div class="flex space-x-2">
            <div class="relative">
                <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 90 days</option>
                    <option>This year</option>
                    <option>All time</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <i class="fas fa-chevron-down text-xs"></i>
                </div>
            </div>
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md flex items-center space-x-2">
                <i class="fas fa-download"></i>
                <span>Export</span>
            </button>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Books -->
        <div class="stat-card bg-white rounded-lg shadow-md p-6 border-l-4 border-indigo-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Books</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">{{ $totalBooks ?? 'N/A' }}</h3>
                    <p class="text-sm text-green-600 flex items-center mt-2">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>12% from last month</span>
                    </p>
                </div>
                <div class="bg-indigo-100 p-3 rounded-full">
                    <i class="fas fa-book text-indigo-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View all books</a>
            </div>
        </div>
        
        <!-- Active Users -->
        {{-- <div class="stat-card bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500"><a href="{{ route('') }}">Total Users</a></p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">1,823</h3>
                    <p class="text-sm text-green-600 flex items-center mt-2">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>8% from last month</span>
                    </p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-users text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="#" class="text-sm text-green-600 hover:text-green-800 font-medium">View all users</a>
            </div>
        </div>
         --}}
        <!-- Books Borrowed -->
        <div class="stat-card bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Books Borrowed</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">342</h3>
                    <p class="text-sm text-yellow-600 flex items-center mt-2">
                        <i class="fas fa-arrow-down mr-1"></i>
                        <span>3% from last month</span>
                    </p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="fas fa-exchange-alt text-yellow-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="#" class="text-sm text-yellow-600 hover:text-yellow-800 font-medium">View all transactions</a>
            </div>
        </div>
        
        <!-- Overdue Books -->
        <div class="stat-card bg-white rounded-lg shadow-md p-6 border-l-4 border-red-500">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Overdue Books</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">28</h3>
                    <p class="text-sm text-red-600 flex items-center mt-2">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>5% from last month</span>
                    </p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-exclamation-circle text-red-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="#" class="text-sm text-red-600 hover:text-red-800 font-medium">View overdue books</a>
            </div>
        </div>
    </div>
    
    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Book Categories Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Book Categories</h2>
                <button class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
            <div class="h-80">
                <canvas id="categoriesChart"></canvas>
            </div>
        </div>
        
        <!-- Monthly Activity Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Monthly Activity</h2>
                <button class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
            </div>
            <div class="h-80">
                <canvas id="activityChart"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Recent Activities and Popular Books -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Recent Activities -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Recent Activities</h2>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View all</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-start space-x-4">
                    <div class="bg-green-100 p-2 rounded-full">
                        <i class="fas fa-book-reader text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">
                            <span class="font-semibold">Sarah Johnson</span> borrowed <span class="font-semibold">To Kill a Mockingbird</span>
                        </p>
                        <p class="text-xs text-gray-500 mt-1">Today, 10:30 AM</p>
                    </div>
                    <span class="status-badge status-borrowed">Borrowed</span>
                </div>
                
                <div class="flex items-start space-x-4">
                    <div class="bg-indigo-100 p-2 rounded-full">
                        <i class="fas fa-user-plus text-indigo-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">
                            <span class="font-semibold">New user</span> registered: <span class="font-semibold">Michael Chen</span>
                        </p>
                        <p class="text-xs text-gray-500 mt-1">Today, 9:15 AM</p>
                    </div>
                    <span class="status-badge status-available">New User</span>
                </div>
                
                <div class="flex items-start space-x-4">
                    <div class="bg-green-100 p-2 rounded-full">
                        <i class="fas fa-book text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">
                            <span class="font-semibold">New book</span> added: <span class="font-semibold">The Great Gatsby</span>
                        </p>
                        <p class="text-xs text-gray-500 mt-1">Yesterday, 3:45 PM</p>
                    </div>
                    <span class="status-badge status-available">New Book</span>
                </div>
                
                <div class="flex items-start space-x-4">
                    <div class="bg-red-100 p-2 rounded-full">
                        <i class="fas fa-exclamation-triangle text-red-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">
                            <span class="font-semibold">Emily Rodriguez</span> has <span class="font-semibold">2 overdue books</span>
                        </p>
                        <p class="text-xs text-gray-500 mt-1">Yesterday, 2:30 PM</p>
                    </div>
                    <span class="status-badge status-overdue">Overdue</span>
                </div>
                
                <div class="flex items-start space-x-4">
                    <div class="bg-green-100 p-2 rounded-full">
                        <i class="fas fa-undo text-green-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-800">
                            <span class="font-semibold">David Wilson</span> returned <span class="font-semibold">1984</span>
                        </p>
                        <p class="text-xs text-gray-500 mt-1">Yesterday, 11:20 AM</p>
                    </div>
                    <span class="status-badge status-available">Returned</span>
                </div>
            </div>
        </div>
        
        <!-- Popular Books -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Popular Books</h2>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View all</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <img src="https://covers.openlibrary.org/b/id/8091016-L.jpg" alt="To Kill a Mockingbird" class="w-12 h-16 object-cover rounded">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-800">To Kill a Mockingbird</h4>
                        <p class="text-xs text-gray-500">Harper Lee</p>
                        <div class="flex items-center mt-1">
                            <div class="text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-xs text-gray-500 ml-1">4.5</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-800">128</p>
                        <p class="text-xs text-gray-500">Borrows</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <img src="https://covers.openlibrary.org/b/id/12000553-L.jpg" alt="The Great Gatsby" class="w-12 h-16 object-cover rounded">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-800">The Great Gatsby</h4>
                        <p class="text-xs text-gray-500">F. Scott Fitzgerald</p>
                        <div class="flex items-center mt-1">
                            <div class="text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-xs text-gray-500 ml-1">4.5</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-800">112</p>
                        <p class="text-xs text-gray-500">Borrows</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <img src="https://covers.openlibrary.org/b/id/10519651-L.jpg" alt="The Catcher in the Rye" class="w-12 h-16 object-cover rounded">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-800">The Catcher in the Rye</h4>
                        <p class="text-xs text-gray-500">J.D. Salinger</p>
                        <div class="flex items-center mt-1">
                            <div class="text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500 ml-1">4.0</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-800">98</p>
                        <p class="text-xs text-gray-500">Borrows</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <img src="https://covers.openlibrary.org/b/id/12645114-L.jpg" alt="Of Mice and Men" class="w-12 h-16 object-cover rounded">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-800">Of Mice and Men</h4>
                        <p class="text-xs text-gray-500">John Steinbeck</p>
                        <div class="flex items-center mt-1">
                            <div class="text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500 ml-1">4.0</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-800">87</p>
                        <p class="text-xs text-gray-500">Borrows</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <img src="https://covers.openlibrary.org/b/id/8231990-L.jpg" alt="Lord of the Flies" class="w-12 h-16 object-cover rounded">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-800">Lord of the Flies</h4>
                        <p class="text-xs text-gray-500">William Golding</p>
                        <div class="flex items-center mt-1">
                            <div class="text-yellow-400 text-xs">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-xs text-gray-500 ml-1">3.5</span>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-800">76</p>
                        <p class="text-xs text-gray-500">Borrows</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Book Inventory Status -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Book Inventory Status</h2>
            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View details</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700">Fiction</span>
                    <span class="text-sm font-medium text-gray-700">75%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-value bg-indigo-600" style="width: 75%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-1">1,125 of 1,500 books available</p>
            </div>
            
            <div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700">Non-Fiction</span>
                    <span class="text-sm font-medium text-gray-700">60%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-value bg-green-600" style="width: 60%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-1">600 of 1,000 books available</p>
            </div>
            
            <div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700">Academic</span>
                    <span class="text-sm font-medium text-gray-700">85%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-value bg-yellow-500" style="width: 85%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-1">425 of 500 books available</p>
            </div>
            
            <div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-sm font-medium text-gray-700">Children's</span>
                    <span class="text-sm font-medium text-gray-700">45%</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-value bg-red-500" style="width: 45%"></div>
                </div>
                <p class="text-xs text-gray-500 mt-1">225 of 500 books available</p>
            </div>
        </div>
    </div>
    
    <!-- Recent Registrations -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Recent User Registrations</h2>
            <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View all users</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Registration Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        Michael Chen
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">michael.chen@example.com</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Today, 9:15 AM
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-available">
                                Active
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        Jessica Williams
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">jessica.w@example.com</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Yesterday, 4:30 PM
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-available">
                                Active
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/75.jpg" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        Robert Johnson
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">robert.j@example.com</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            Yesterday, 2:15 PM
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-available">
                                Active
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/42.jpg" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        Amanda Lee
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">amanda.lee@example.com</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            2 days ago
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-badge status-available">
                                Active
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection