@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-3xl font-bold text-center mt-6 mb-10">DASHBOARD</h1>

            <div class="card w-full">
                <div class="card-header text-2xl font-bold">View</div>

                <div class="card-body flex">
                    <div class="text-center w-6/12">
                        <a href="{{ route('companies') }}" class="dashboard-button">Companies</a>
                    </div>
                    <div class="text-center w-6/12">
                        <a href="{{ route('employees') }}" class="dashboard-button">Employees</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
