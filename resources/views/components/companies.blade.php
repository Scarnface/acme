@extends('layouts.app')

@section('content')

    @if( $companies->count() === 1)
        <div class="flex justify-content-center mb-6">
        @foreach ($companies as $company)
            <x-company :company="$company"></x-company>
        @endforeach
        </div>

        @if( $employees->isNotEmpty() )
            <div class="lg:grid lg:grid-cols-6">
                @foreach ($employees as $employee)
                    <x-employee :employee="$employee"></x-employee>
                @endforeach
            </div>

            <div class="mb-20">
                {{ $employees->links() }}
            </div>
        @endif
    @else
        <h1 class="text-3xl font-bold text-center mt-6 mb-6">COMPANIES</h1>

        <x-company-toolbar></x-company-toolbar>

        <div class="flex justify-content-center mb-6">
        @foreach ($companies as $company)
            <x-company :company="$company"></x-company>
        @endforeach
        </div>

        <div class="mb-20">
            {{ $companies->links() }}
        </div>
    @endif

    <a class="text-lg text-red-800 hover:text-gray-500" href="{{ route('home') }}">Return to dashboard</a>

@endsection
