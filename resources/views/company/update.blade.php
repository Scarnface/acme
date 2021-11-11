@extends('layouts.app')

@section('content')
    <x-panel class="max-w-lg mx-auto mt-10">
        <section class="px-6 py-8">
            <h1 class="text-lg text-center font-bold mb-6">Edit Company</h1>
            <form method="POST" action="{{ route('company.store', $companies->id)}}" enctype="multipart/form-data">
                @csrf

                <x-form.input name="name" value="{{ $companies->name }}" />
                <x-form.input name="email" value="{{ $companies->email }}" />
                <x-form.input name="logo" value="{{ $companies->logo }}" type="file" />
                <x-form.input name="website" value="{{ $companies->website }}" />

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
