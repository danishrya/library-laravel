<div class="sidebar bg-indigo-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 z-50">
    <div class="flex items-center justify-between px-4">
        <div class="flex items-center space-x-2">
            <i class="fas fa-book-open text-2xl"></i>
            <span class="text-2xl font-semibold">E-Library</span>
        </div>
        <button class="md:hidden focus:outline-none" id="closeSidebar">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <nav class="mt-10">
        <a href="{{ route('dashboard') }}" class="sidebar-link active block py-2.5 px-4 rounded transition duration-200 flex items-center space-x-3">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('books.index') }}" class="sidebar-link block py-2.5 px-4 rounded transition duration-200 flex items-center space-x-3">
            <i class="fas fa-book"></i>
            <span>Books</span>
        </a>
        <a href="" class="sidebar-link block py-2.5 px-4 rounded transition duration-200 flex items-center space-x-3">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
        <a href="#" class="sidebar-link block py-2.5 px-4 rounded transition duration-200 flex items-center space-x-3">
            <i class="fas fa-exchange-alt"></i>
            <span>Transactions</span>
        </a>
        <a href="#" class="sidebar-link block py-2.5 px-4 rounded transition duration-200 flex items-center space-x-3">
            <i class="fas fa-chart-bar"></i>
            <span>Reports</span>
        </a>
        <a href="#" class="sidebar-link block py-2.5 px-4 rounded transition duration-200 flex items-center space-x-3">
            <i class="fas fa-cog"></i>
            <span>Settings</span>
        </a>
    </nav>
</div>