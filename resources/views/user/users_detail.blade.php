@extends('layout.app')
@section('content')
<main class="flex-1 overflow-y-auto p-5">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-2">
            <a href="users.html" class="text-indigo-600 hover:text-indigo-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-semibold text-gray-800">User Details</h1>
        </div>
        <div class="flex space-x-2">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                <i class="fas fa-edit"></i>
                <span>Edit User</span>
            </button>
            <button class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                <i class="fas fa-trash"></i>
                <span>Delete</span>
            </button>
        </div>
    </div>
    
    <!-- User Profile -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/3 flex flex-col items-center mb-6 md:mb-0">
                <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Sarah Johnson" class="w-40 h-40 rounded-full object-cover border-4 border-indigo-100">
                <h2 class="text-xl font-semibold mt-4">{{ Auth::user()->firstName }}  {{ Auth::user()->lastName }}</h2>
                <p class="text-gray-500">{{ Auth::user()->role }}</p>
                <div class="mt-2">
                    <span class="status-badge status-active">
                        Active
                    </span>
                </div>
                <div class="mt-6 w-full max-w-xs">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm text-gray-600">Books Borrowed</span>
                        <span class="text-sm font-medium">12</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 60%"></div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">12 of 20 books limit</p>
                </div>
            </div>
            
            <div class="md:w-2/3 md:pl-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">FIRSTNAME</h3>
                        <p class="text-base">{{ Auth::user()->firstName }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">LASTNAME</h3>
                        <p class="text-base">{{ Auth::user()->lastName  }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">EMAIL Address</h3>
                        <p class="text-base">{{ Auth::user()->email  }}</p>
                    </div>
                    {{-- <div>
                        <h3 class="text-sm font-medium text-gray-500">User ID</h3>
                        <p class="text-base">USR-001</p>
                    </div> --}}
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">created at</h3>
                        <p class="text-base">{{ Auth::user()->created_at }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">updated_at</h3>
                        <p class="text-base">{{ Auth::user()->updated_at }}</p>
                    </div>
                    {{-- <div>
                        <h3 class="text-sm font-medium text-gray-500">Membership Type</h3>
                        <p class="text-base">Premium (Annual)</p>
                    </div> --}}
                </div>
                
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-500">Biography</h3>
                    <p class="text-base mt-1">
                        Sarah is an avid reader with a particular interest in science fiction and historical fiction. She has been a member of our library for over a year and regularly participates in book club events.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    {{-- <!-- Tabs -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="border-b border-gray-200">
            <div class="flex space-x-8">
                <button class="tab-button active py-4 px-1" data-tab="borrowing-history">
                    Borrowing History
                </button>
                <button class="tab-button py-4 px-1" data-tab="activity-log">
                    Activity Log
                </button>
                <button class="tab-button py-4 px-1" data-tab="payment-history">
                    Payment History
                </button>
                <button class="tab-button py-4 px-1" data-tab="notes">
                    Notes
                </button>
            </div>
        </div>
        
        <!-- Borrowing History Tab -->
        <div id="borrowing-history" class="tab-content active pt-6">
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Book
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Borrowed Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Due Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Return Date
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
                                        <img class="h-10 w-10 rounded-md" src="https://via.placeholder.com/40x40?text=Book" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            The Great Gatsby
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            F. Scott Fitzgerald
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Apr 15, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Apr 29, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Apr 28, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="status-badge status-active">
                                    Returned
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-md" src="https://via.placeholder.com/40x40?text=Book" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            To Kill a Mockingbird
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Harper Lee
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                May 2, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                May 16, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                -
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="status-badge status-pending">
                                    Borrowed
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-md" src="https://via.placeholder.com/40x40?text=Book" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            1984
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            George Orwell
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Mar 10, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Mar 24, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Mar 22, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="status-badge status-active">
                                    Returned
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Activity Log Tab -->
        <div id="activity-log" class="tab-content pt-6">
            <div class="space-y-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-indigo-100 text-indigo-600">
                            <i class="fas fa-sign-in-alt text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium">Logged in</h3>
                        <p class="text-sm text-gray-500">Today at 09:45 AM</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-600">
                            <i class="fas fa-book text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium">Borrowed book: To Kill a Mockingbird</h3>
                        <p class="text-sm text-gray-500">May 2, 2023 at 02:30 PM</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-undo text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium">Returned book: The Great Gatsby</h3>
                        <p class="text-sm text-gray-500">Apr 28, 2023 at 11:15 AM</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-600">
                            <i class="fas fa-book text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium">Borrowed book: The Great Gatsby</h3>
                        <p class="text-sm text-gray-500">Apr 15, 2023 at 10:00 AM</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-8 w-8 rounded-full bg-purple-100 text-purple-600">
                            <i class="fas fa-credit-card text-sm"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-medium">Renewed membership</h3>
                        <p class="text-sm text-gray-500">Apr 1, 2023 at 09:30 AM</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Payment History Tab -->
        <div id="payment-history" class="tab-content pt-6">
            <div class="table-container">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Transaction ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                TRX-2023-0412
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Apr 1, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Annual Membership Renewal
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                $59.99
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="status-badge status-active">
                                    Paid
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                TRX-2023-0315
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Mar 15, 2023
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Late Return Fee - 1984
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                $2.50
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="status-badge status-active">
                                    Paid
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                TRX-2022-0412
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Apr 1, 2022
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                Annual Membership
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                $49.99
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="status-badge status-active">
                                    Paid
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Notes Tab -->
        <div id="notes" class="tab-content pt-6">
            <div class="space-y-4">
                <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium">Book Club Interest</h3>
                            <p class="text-sm text-gray-600 mt-1">
                                Sarah expressed interest in joining the science fiction book club. Follow up with her about the next meeting.
                            </p>
                        </div>
                        <div class="text-xs text-gray-500">
                            Added by Michael Chen on Feb 15, 2023
                        </div>
                    </div>
                </div>
                
                <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-sm font-medium">Special Accommodation</h3>
                            <p class="text-sm text-gray-600 mt-1">
                                Member has requested extended borrowing periods due to work travel schedule. Approved for up to 4 weeks instead of standard 2 weeks.
                            </p>
                        </div>
                        <div class="text-xs text-gray-500">
                            Added by Admin on Jan 20, 2023
                        </div>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h3 class="text-sm font-medium mb-2">Add New Note</h3>
                    <textarea class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" rows="3" placeholder="Type your note here..."></textarea>
                    <div class="flex justify-end mt-2">
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                            <i class="fas fa-plus"></i>
                            <span>Add Note</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</main>
@endsection