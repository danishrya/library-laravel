<main class="flex-1 overflow-y-auto p-5">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Add New Book</h1>
        <a href="dashboard.html" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
            <i class="fas fa-arrow-left"></i>
            <span>Back to List</span>
        </a>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <form id="bookForm" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="bookTitle" class="block text-sm font-medium text-gray-700">Nama Buku <span class="text-red-500">*</span></label>
                    <input type="text" id="bookTitle" name="bookTitle" required class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none p-2 border">
                    <p class="text-xs text-gray-500">Masukkan judul lengkap buku</p>
                </div>
                
                <div class="space-y-2">
                    <label for="publisher" class="block text-sm font-medium text-gray-700">Penerbit <span class="text-red-500">*</span></label>
                    <input type="text" id="publisher" name="publisher" required class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none p-2 border">
                    <p class="text-xs text-gray-500">Masukkan nama penerbit buku</p>
                </div>
                
                <div class="space-y-2">
                    <label for="publishYear" class="block text-sm font-medium text-gray-700">Tahun Terbit <span class="text-red-500">*</span></label>
                    <input type="number" id="publishYear" name="publishYear" min="1800" max="2099" required class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none p-2 border">
                    <p class="text-xs text-gray-500">Masukkan tahun terbit buku (1800-2099)</p>
                </div>
                
                <div class="space-y-2">
                    <label for="pageCount" class="block text-sm font-medium text-gray-700">Jumlah Halaman <span class="text-red-500">*</span></label>
                    <input type="number" id="pageCount" name="pageCount" min="1" required class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none p-2 border">
                    <p class="text-xs text-gray-500">Masukkan jumlah halaman buku</p>
                </div>
            </div>
            
            <div class="space-y-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="4" required class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none p-2 border"></textarea>
                <p class="text-xs text-gray-500">Masukkan deskripsi atau sinopsis buku</p>
            </div>
            
            <div class="space-y-2">
                <label for="coverImage" class="block text-sm font-medium text-gray-700">Cover Buku</label>
                <div class="flex items-center space-x-4">
                    <div class="w-32 h-40 bg-gray-200 rounded-md flex items-center justify-center">
                        <img id="coverPreview" src="https://via.placeholder.com/128x160?text=Cover" alt="Cover Preview" class="max-w-full max-h-full rounded-md">
                    </div>
                    <div class="flex-1">
                        <input type="file" id="coverImage" name="coverImage" accept="image/*" class="hidden">
                        <button type="button" id="uploadButton" class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                            <i class="fas fa-upload"></i>
                            <span>Upload Cover</span>
                        </button>
                        <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG. Max size: 2MB</p>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4 border-t">
                <button type="button" id="resetButton" class="bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                    <i class="fas fa-redo"></i>
                    <span>Reset</span>
                </button>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg flex items-center space-x-2 transition duration-200">
                    <i class="fas fa-save"></i>
                    <span>Save Book</span>
                </button>
            </div>
        </form>
    </div>
</main>