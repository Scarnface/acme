@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-center mt-6 mb-10">Companies</h1>

    <div class="lg:grid lg:grid-cols-6 mx-10">
        @foreach ($companies as $company)
            <x-company :company="$company"></x-company>
        @endforeach
    </div>
    <div class="mx-10">
        {{ $companies->links() }}
    </div>
    <a class="nav-link text-lg text-red-800 hover:text-gray-500 mt-10 mx-6" href="{{ route('home') }}">Go Back</a

@endsection
