@extends('layouts.app')

@section('content')
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

    <a class="text-lg text-red-800 hover:text-gray-500" href="{{ route('home') }}">Return to dashboard</a>

@endsection
