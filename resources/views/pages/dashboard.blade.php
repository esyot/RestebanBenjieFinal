@extends('layouts.header') 

@section('content')
@include('modals.student-create')

    <div class="flex justify-between mb-4 shadow-md p-2 bg-gray-200 items-center">
        <div class="flex items-center">
        <button title="click me to open sidebar" onclick="sidebar.classList.toggle('-translate-x-full')"
    class="py-1 px-3 bg-gray-500 text-xl m-2 hover:bg-gray-800 text-white shadow-md rounded">III</button>
        <h1 class="text-2xl font-semibold">Dashboard</h1>
        </div>
    
          </div>





@endsection