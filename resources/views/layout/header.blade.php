<header class="bg-white shadow-md flex items-center justify-between p-4">
    <div class="flex items-center">
        <button class="md:hidden focus:outline-none mr-3" id="openSidebar">
            <i class="fas fa-bars text-gray-600 text-lg"></i>
        </button>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <i class="fas fa-search text-gray-500"></i>
            </span>
            <input type="text" placeholder="Search..." class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>
    </div>
    
    <div class="flex items-center space-x-4">
        <button class="relative p-1 rounded-full text-gray-600 hover:bg-gray-100 focus:outline-none">
            <i class="fas fa-bell text-lg"></i>
            <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
        </button>
        
        <div class="dropdown">
            <button class="flex items-center space-x-2 focus:outline-none">
                <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User" class="w-8 h-8 rounded-full">
                <span class="font-medium text-gray-700">Admin User</span>
                <i class="fas fa-chevron-down text-xs text-gray-500"></i>
            </button>
            <div class="dropdown-content">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cog mr-2"></i> Settings
                </a>
                <a href="{{ route('login') }}" class="dropdown-item border-t">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </div>
    </div>
</header>