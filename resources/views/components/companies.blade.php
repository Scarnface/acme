@extends('layouts.app')

@section('content')
    @if( $companies->count()  === 1)
        <h1 class="text-2xl font-bold text-center mt-6 mb-10">Company</h1>
        <div class="flex justify-content-center mb-6">
    @else
        <h1 class="text-2xl font-bold text-center mt-6 mb-10">Companies</h1>
        <div class="flex justify-content-between mb-6">
    @endif

    @foreach ($companies as $company)
        <x-company :company="$company"></x-company>
    @endforeach
    </div>

    <div class="mb-20">
        {{ $companies->links() }}
    </div>

    <a class="text-lg text-red-800 hover:text-gray-500" href="{{ route('home') }}">Go Back</a>

@endsection
