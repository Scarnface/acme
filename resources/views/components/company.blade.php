@props(['company'])

<div class="card card-custom">
    <div class="card-header font-bold text-2xl">
        {{ ucwords($company->name) }}
        <a href="#" class="float-right text-xs text-red-800 hover:text-gray-500">EDIT</a>
    </div>
    <div class="card-body flex flex-wrap justify-content-center align-content-center w-full">
        <div class="flex justify-content-center w-full mb-6">
            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ ucwords($company->name) }} Logo" width="300"/>
        </div>
        <div class="flex align-items-center justify-content-center w-full mb-6">
            <i class="fi-xwluxl-globe-wide text-2xl mr-4"></i>
            <a href="{{ $company->website }}" class="dashboard-button">{{ $company->website }}</a>
        </div>
        <div class="flex align-items-center justify-content-center w-full mb-6">
            <i class="fi-xwluxl-envelope-wide text-2xl mr-4"></i>
            <a href="mailto:{{ $company->email }}" class="dashboard-button">{{ $company->email }}</a>
        </div>
    </div>
</div>
