<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .sidebar {
            transition: all 0.3s ease;
        }
        
        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            border-left: 4px solid white;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        .table-container::-webkit-scrollbar {
            height: 8px;
        }
        
        .table-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .table-container::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        
        .table-container::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        
        .btn-action {
            transition: all 0.2s ease;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
        }
        
        .dropdown {
            position: relative;
            display: inline-block;
        }
        
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 8px;
        }
        
        .dropdown:hover .dropdown-content {
            display: block;
        }
        
        .dropdown-item {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #333;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background-color: #f1f1f1;
        }
        
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            animation: modalopen 0.4s;
        }
        
        @keyframes modalopen {
            from {opacity: 0; transform: translateY(-50px);}
            to {opacity: 1; transform: translateY(0);}
        }
        
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover {
            color: black;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div>
        {{-- Header --}}
        @include('layout.header')
    
        <div class="flex min-h-screen">
            {{-- Sidebar --}}
            @include('layout.sidebar')
    
            {{-- Main Content Area --}}
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
    <script>
        // Sidebar toggle for mobile
        document.getElementById('openSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.remove('-translate-x-full');
        });
        
        document.getElementById('closeSidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.add('-translate-x-full');
        });
        
        // Modal functionality
        const modal = document.getElementById('viewBookModal');
        const closeBtn = document.getElementsByClassName('close')[0];
        
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }
        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        
        // Sample book data
        const books = [
            {
                id: 1,
                title: "Harry Potter and the Philosopher's Stone",
                publisher: "Bloomsbury Publishing",
                description: "Harry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry's eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry.",
                year: 1997,
                pages: 223
            },
            {
                id: 2,
                title: "To Kill a Mockingbird",
                publisher: "J. B. Lippincott & Co.",
                description: "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. 'Shoot all the bluejays you want, if you can hit 'em, but remember it's a sin to kill a mockingbird.' A lawyer's advice to his children as he defends the real mockingbird of Harper Lee's classic novel - a black man charged with the rape of a white girl.",
                year: 1960,
                pages: 281
            },
            {
                id: 3,
                title: "The Great Gatsby",
                publisher: "Charles Scribner's Sons",
                description: "The story of the fabulously wealthy Jay Gatsby and his love for the beautiful Daisy Buchanan, of lavish parties on Long Island at a time when The New York Times noted 'gin was the national drink and sex the national obsession,' it is an exquisitely crafted tale of America in the 1920s.",
                year: 1925,
                pages: 180
            },
            {
                id: 4,
                title: "1984",
                publisher: "Secker & Warburg",
                description: "Among the seminal texts of the 20th century, Nineteen Eighty-Four is a rare work that grows more haunting as its futuristic purgatory becomes more real. Published in 1949, the book offers political satirist George Orwell's nightmarish vision of a totalitarian, bureaucratic world and one poor stiff's attempt to find individuality.",
                year: 1949,
                pages: 328
            },
            {
                id: 5,
                title: "Pride and Prejudice",
                publisher: "T. Egerton, Whitehall",
                description: "Since its immediate success in 1813, Pride and Prejudice has remained one of the most popular novels in the English language. Jane Austen called this brilliant work 'her own darling child' and its vivacious heroine, Elizabeth Bennet, 'as delightful a creature as ever appeared in print.'",
                year: 1813,
                pages: 432
            }
        ];
        
        function viewBook(id) {
            const book = books.find(b => b.id === id);
            if (book) {
                const detailsHTML = `
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="md:col-span-1">
                            <img src="https://via.placeholder.com/200x300?text=${encodeURIComponent(book.title)}" alt="${book.title}" class="w-full rounded-lg shadow-md">
                        </div>
                        <div class="md:col-span-2 space-y-3">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Judul Buku</h3>
                                <p class="text-lg font-semibold">${book.title}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Penerbit</h3>
                                <p>${book.publisher}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Tahun Terbit</h3>
                                <p>${book.year}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Jumlah Halaman</h3>
                                <p>${book.pages} halaman</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Deskripsi</h3>
                                <p class="text-gray-700">${book.description}</p>
                            </div>
                        </div>
                    </div>
                `;
                
                document.getElementById('bookDetails').innerHTML = detailsHTML;
                modal.style.display = "block";
            }
        }
    </script>
</body>
</html>