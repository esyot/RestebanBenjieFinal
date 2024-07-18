<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="{{ asset('js/tailwind.min.js') }}"></script>
    <script src="{{ asset('js/htmx.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="">

    <div id="sidebar" class="fixed inset-y-0 left-0 bg-gray-800 text-white w-64 transform -translate-x-full transition duration-300">
        <div class="p-4">
            <div class="flex justify-between">
                <h2 class="text-2xl font-semibold">Main Menu</h2>    
                <button onclick="sidebar.classList.add('-translate-x-full')" class="text-white hover:text-gray-300">&times;</button>
            </div>
            <ul class="mt-4">
    <li class="mt-2"><a href="{{ route('dashboard')}}" class="block px-2 py-1 hover:bg-gray-500 rounded">Home</a></li>
    <li class="mt-2">
     
            <li class="mt-2"><a href="{{ route('students.view')}}" class="block px-2 py-1 hover:bg-gray-400 rounded">Students</a></li>
            <li class="mt-2"><a href="{{ route('accounts')}}" class="block px-2 py-1 hover:bg-gray-400 rounded">Accounts</a></li>

        </ul>
    </li>
</ul>

        </div>
    </div>
    
    <div class="flex-grow transition-transform duration-300">
       
        @yield('content') 
           
        </div>
    </div>  
     
    <script>
        const sidebar = document.getElementById('sidebar');
        const togglebtn = document.getElementById('togglebtn');
    </script>
</body>
</html>
