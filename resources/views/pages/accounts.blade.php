@extends('layouts.header') 

@section('content')

@include('modals.account-create', ['students'=>$students])



    <div class="flex justify-between mb-4 shadow-md p-2 bg-gray-200 items-center">
        <div class="flex justify-between items-center">
            <button title="click me to open sidebar" onclick="sidebar.classList.toggle('-translate-x-full')"
            class="py-1 px-3 bg-gray-500 text-xl m-2 hover:bg-gray-800 text-white shadow-md rounded">III</button>
            <h1 class="text-2xl font-semibold">Accounts</h1>
          
        </div>
        <input hx-get="/accounts" hx-trigger="input" hx-target="#accounts-list" hx-swap="innerHTML" name="filter" placeholder="Search accounts" type="text" class="px-4 py-2 rounded border border-gray-300">          
           
    
    </div>
    <div class="flex justify-end">
    <button onclick="document.getElementById('account-create').classList.remove('hidden');" 
        class="mr-2 px-4 py-2 bg-blue-500 hover:bg-blue-800 text-blue-100 rounded shadow-md">Create New Account</button>
    </div>
    


    <div id="accounts-list" class="grid grid-cols-3 gap-3 min-h-auto w-full p-6">
    
       @include('inclusions.accounts-list' )


<div id="account"></div>




@endsection

