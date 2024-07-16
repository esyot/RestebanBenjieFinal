@extends('layouts.header')

@section('content')
@include('modals.student-create')

    <div class="flex justify-end mb-4">
        <button onclick="document.getElementById('student-create').classList.remove('hidden')" class="px-2 py-2 bg-blue-500 hover:bg-blue-800 text-blue-100 rounded">Add Student</button>
    </div>


<div id="students-list" class="grid grid-cols-3 gap-3 min-h-auto w-full p-6">
       @include('inclusions.students-list', )


@endsection