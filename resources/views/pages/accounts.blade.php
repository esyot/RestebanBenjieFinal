@extends('layouts.header') 

@section('content')


    <div class="flex justify-between mb-4 shadow-md p-2 bg-gray-200 items-center">
        <div class="flex items-center">
        <button title="click me to open sidebar" onclick="sidebar.classList.toggle('-translate-x-full')"
    class="py-1 px-3 bg-gray-500 text-xl m-2 hover:bg-gray-800 text-white shadow-md rounded">III</button>
        <h1 class="text-2xl font-semibold">Accounts</h1>
        </div>
    
        <button hx-get="{{ route('account.create') }}" hx-trigger="click" hx-swap="innerHTML" hx-target="#account"
        class="px-2 py-2 bg-blue-500 hover:bg-blue-800 text-blue-100 rounded">Create New Account</button>
    </div>


<div id="accounts-list" class="grid grid-cols-3 gap-3 min-h-auto w-full p-6">
    
       @include('inclusions.accounts-list' )



<div id="account"></div>



@endsection