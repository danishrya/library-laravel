@extends('layout.app')
@section('content')
<!-- Main content -->
<main class="flex-1 overflow-y-auto p-5">
    <div class="flex justify-between items-center mb-6">
        <div class="flex items-center space-x-2">
            <a href="dashboard.html" class="text-indigo-600 hover:text-indigo-800">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-2xl font-semibold text-gray-800">Book Details</h1>
        </div>
        <div class="flex space-x-2">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                <i class="fas fa-edit"></i>
                <span>Edit Book</span>
            </button>
            <button class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                <i class="fas fa-trash"></i>
                <span>Delete</span>
            </button>
        </div>
    </div>
    
    <!-- Book Details -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/3 flex flex-col items-center mb-6 md:mb-0">
                <img src="https://covers.openlibrary.org/b/id/8091016-L.jpg" alt="To Kill a Mockingbird" class="w-64 h-auto rounded-lg shadow-md object-cover">
                
                <div class="mt-6 flex items-center">
                    <div class="star-rating flex">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="ml-2 text-gray-600">4.5/5 (128 ratings)</span>
                </div>
                
                <div class="mt-4 w-full">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-700">Availability Status:</span>
                        <span class="status-badge status-available">
                            Available
                        </span>
                    </div>
                    
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-700">Copies Available:</span>
                        <span class="text-sm">3 of 5</span>
                    </div>
                    
                    <div class="mt-4 flex space-x-2">
                        <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg flex-1 flex items-center justify-center space-x-2 transition duration-200">
                            <i class="fas fa-book"></i>
                            <span>Borrow</span>
                        </button>
                        <button class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-lg flex items-center justify-center space-x-2 transition duration-200">
                            <i class="fas fa-bookmark"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="md:w-2/3 md:pl-8">
                <h2 class="text-2xl font-bold text-gray-900">To Kill a Mockingbird</h2>
                <p class="text-lg text-gray-600 mt-1">by Harper Lee</p>
                
                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Publisher</h3>
                        <p class="text-base">J. B. Lippincott & Co.</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Publication Year</h3>
                        <p class="text-base">1960</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">ISBN</h3>
                        <p class="text-base">978-0-06-112008-4</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Language</h3>
                        <p class="text-base">English</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Pages</h3>
                        <p class="text-base">281</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Genre</h3>
                        <p class="text-base">Southern Gothic, Bildungsroman</p>
                    </div>
                </div>
                
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-500">Synopsis</h3>
                    <p class="text-base mt-2 text-gray-700 leading-relaxed">
                        Set in the small Southern town of Maycomb, Alabama, during the Depression, "To Kill a Mockingbird" follows three years in the life of 8-year-old Scout Finch, her brother, Jem, and their father, Atticus—three years punctuated by the arrest and eventual trial of a young Black man accused of raping a white woman. Though her story explores big themes, Harper Lee chooses to tell it through the eyes of a child. The result is a tough and tender novel of race, class, justice, and the pain of growing up.
                    </p>
                    <p class="text-base mt-2 text-gray-700 leading-relaxed">
                        Like the slow-moving occupants of her fictional town, Lee takes her time getting to the heart of her tale; we first meet the Finches the summer before Scout's first year at school. This is lucky for us, because otherwise we might never meet Dill Harris, a 7-year-old boy who comes to visit his aunt every summer and becomes the children's best friend and fellow troublemaker.
                    </p>
                </div>
                
                <div class="mt-6">
                    <h3 class="text-sm font-medium text-gray-500">Tags</h3>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Classic</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Fiction</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">American Literature</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Historical</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">Pulitzer Prize</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endsection