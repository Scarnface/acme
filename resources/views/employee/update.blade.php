@extends('layouts.app')

@section('content')
    <x-panel class="max-w-lg mx-auto mt-10">
        <section class="px-6 py-8">
            <h1 class="text-lg text-center font-bold mb-6">Edit Employee</h1>
            <form method="POST" action="{{ route('employee.store', $employees->id)}}" enctype="multipart/form-data">
                @csrf

                <x-form.input name="first_name" value="{{ $employees->first_name }}" />
                <x-form.input name="last_name" value="{{ $employees->last_name }}" />
                <x-form.input name="email" value="{{ $employees->email }}" />
                <x-form.input name="phone_number" value="{{ $employees->phone_number }}" />

                <x-form.field>
                    <button type="submit" class="btn btn-dark">Update</button>
                </x-form.field>

                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="list-none text-red-500 text-xs mt-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </section>
    </x-panel>
@endsection
