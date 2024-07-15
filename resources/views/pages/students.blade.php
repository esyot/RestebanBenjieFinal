@extends('layouts.header')

@section('content')



<div class="grid grid-col-3 gap-3">
        <div class="flex justify-between">

        @foreach($students as $student)
 
        <div class="p-6 m-2 rounded bg-blue-200 shadow-md">
            <div class="text-xl font-semibold"> {{ $student->first_name}} {{ $student->last_name}}  {{ $student->middle_name }}</div>
            <div class="">Date of Birth:  {{ $student->DOB}} </div>
            <div class="">Address: {{$student->address}}</div>

            <div class="flex justify-end mt-4">
                <button class="py-2 px-2 bg-blue-500 hover:bg-blue-800 rounded text-blue-100">Edit</button>
                <button onclick="document.getElementById('confirm-delete{{$student->id}}').classList.remove('hidden')" class="py-2 px-2 ml-1 bg-red-500 hover:bg-red-800 text-red-100 rounded">Delete</button>
                 </div> 
        </div>

        @include('modals.confirm-delete')
        @endforeach

</div>

</div>

@endsection