@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center mt-6 mb-6">COMPANY</h1>

    <div class="flex justify-content-center mb-6">
        @include('company.components.clist')
    </div>

    <a class="text-lg text-red-800 hover:text-gray-500" href="{{ route('home') }}">Return to dashboard</a>
@endsection
