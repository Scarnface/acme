@extends('layouts.app')

@section('content')
    @if( $employees->count() != 1)
        <h1 class="text-3xl font-bold text-center mt-6 mb-10">EMPLOYEES</h1>
    @endif

    <x-employee-toolbar></x-employee-toolbar>

    <div class="lg:grid lg:grid-cols-6">
    @foreach ($employees as $employee)
        <x-employee :employee="$employee"></x-employee>
    @endforeach
    </div>

    @if( $employees->count() != 1)
        <div class="mb-20">
            {{ $employees->links() }}
        </div>
    @endif

    <a class="text-lg text-red-800 hover:text-gray-500" href="{{ route('home') }}">Return to dashboard</a>

@endsection
