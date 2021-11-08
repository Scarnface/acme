@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center mt-6 mb-10">Companies</h1>

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($companies as $company)
            <x-company :company="$company"></x-company>
        @endforeach
    </div>
    {{ $companies->links() }}
@endsection
