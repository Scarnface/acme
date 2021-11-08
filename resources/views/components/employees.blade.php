@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-center mt-6 mb-10">Employees</h1>

    <div class="lg:grid lg:grid-cols-6 mx-10">
        @foreach ($employees as $employee)
            <x-employee :employee="$employee"></x-employee>
        @endforeach
    </div>
    <div class="mx-10">
        {{ $employees->links() }}
    </div>

@endsection
