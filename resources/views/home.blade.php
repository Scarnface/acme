@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card w-full">
                <div class="card-header text-3xl font-bold">Dashboard</div>

                <div class="card-body flex">
                    <div class="text-center w-6/12">
                        <a href="{{ route('companies') }}" class="text-2xl">Companies</a>
                    </div>
                    <div class="text-center w-6/12">
                        <a href="{{ route('employees') }}" class="text-2xl">Employees</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
