<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('js/tailwind.min.js') }}"></script>
    <script src="{{ asset('js/htmx.min.js') }}"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <div id="sidebar" class="fixed inset-y-0 left-0 bg-gray-800 text-white w-64 transform -translate-x-full transition duration-300">
        <div class="p-4">
            <div class="flex justify-between">
                <h2 class="text-2xl font-semibold">Main Menu</h2>    
                <button onclick="sidebar.classList.add('-translate-x-full')" class="text-white hover:text-gray-300">&times;</button>
            </div>
            <ul class="mt-4">
                <li class="mt-2"><a href="" class="block px-2 py-1 hover:bg-gray-500 rounded">Home</a></li>
                <li class="mt-2"><a href="" class="block px-2 py-1 hover:bg-gray-500 rounded">Students</a></li>
                <li class="mt-2"><a href="" class="block px-2 py-1 hover:bg-gray-500 rounded">Bills</a></li>
            </ul>
        </div>
    </div>
    
    <div class="flex-grow p-4 transition-transform duration-300">
        <button title="click me to open sidebar" onclick="sidebar.classList.toggle('-translate-x-full')" class="py-1 px-3 bg-gray-500 text-xl hover:bg-gray-800 text-white shadow-md rounded">III</button>
        
      

            @yield('content') 
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const togglebtn = document.getElementById('togglebtn');
    </script>
</body>
</html>
