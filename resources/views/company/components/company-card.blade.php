<div class="card card-custom mx-4">
    <div class="card-header flex align-items-center font-bold text-2xl">
        @if(Route::current()->getName() != 'company.show')
            <a href="{{ route('company.show', $company) }}"
               class="text-red-800 hover:text-gray-500">{{ ucwords($company->name) }}
            </a>
        @else
            <h3 class="mb-0">{{ ucwords($company->name) }}</h3>
        @endif
    </div>

    <div class="card-body flex flex-wrap justify-content-center align-content-center w-full pb-4">
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

    <div class="flex justify-content-center">
        <a href="{{ route('company.edit', $company) }}">
            <input class="btn btn-dark mb-4 mr-6" type="submit" value="EDIT" />
        </a>
        <form action="{{ route('company.destroy', $company) }}" method="POST">
            @method('DELETE')
            @csrf
            <input class="btn btn-dark mb-4" type="submit" value="DELETE" />
        </form>
    </div>
</div>
