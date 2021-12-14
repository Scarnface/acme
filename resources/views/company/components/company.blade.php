@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center mt-6 mb-6">COMPANY</h1>

    <div class="flex justify-content-center mb-6">
        @include('company.components.company-card')
    </div>

    <a class="text-lg text-red-800 hover:text-gray-500" href="{{ route('companies') }}">Go Back</a>
@endsection
