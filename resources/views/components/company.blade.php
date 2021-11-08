@props(['company'])

<div class="card col-span-2">
    <div class="card-header">{{ ucwords($company->name) }}</div>
    <div class="card-body">
        <img src="{{ asset('storage/' . $company->logo) }}"  alt="Company Logo" width="100" height="50"/>
        <a href="{{ $company->website }}">{{ $company->website }}</a>
        <a href="mailto:{{ $company->email }}">{{ $company->email }}</a>
    </div>
</div>
