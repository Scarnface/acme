@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-center mt-6 mb-10">Employees</h1>

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($employees as $employee)
            <x-employee :employee="$employee"></x-employee>
        @endforeach
    </div>

    <div class="mb-20">
        {{ $employees->links() }}
    </div>

    <a class="text-lg text-red-800 hover:text-gray-500 mt-10" href="{{ route('home') }}">Go Back</a>

@endsection
