@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center mt-6 mb-10">Employees</h1>

    <div class="lg:grid lg:grid-cols-6">
        @foreach ($employees as $employee)
            <x-employee :employee="$employee"></x-employee>
        @endforeach
    </div>
    {{ $employees->links() }}
@endsection
