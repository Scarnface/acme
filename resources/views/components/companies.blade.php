@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-center mt-6 mb-10">Companies</h1>

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($companies as $company)
            <x-company :company="$company"></x-company>
        @endforeach
    </div>
    <div class="mb-20">
        {{ $companies->links() }}
    </div>
    <a class="text-lg text-red-800 hover:text-gray-500" href="{{ route('home') }}">Go Back</a>

@endsection
