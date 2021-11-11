@extends('layouts.app')

@section('content')
    <x-panel class="max-w-lg mx-auto mt-10">
        <section class="px-6 py-8">
            <h1 class="text-lg text-center font-bold mb-6">Create New Employee</h1>
            <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                @csrf

                <x-form.input name="first_name"/>
                <x-form.input name="last_name"/>
                <x-form.input name="company_id"/>
                <x-form.input name="company"/>  {{-- Make dropdown then autoset compnay_id from selection --}}
                <x-form.input name="email"/>
                <x-form.input name="phone_number"/>

                <x-form.field>
                    <button type="submit" class="btn btn-dark">Create</button>
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
