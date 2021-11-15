<div class="flex justify-content-center mb-6">
    <a href="{{ route('company.create') }}" class="btn btn-dark">Add New Company</a>

    <div class="w-6/12 bg-gray-100 rounded-xl px-3 py-2 ml-8">
        <form method="GET" action="{{ route('companies') }}">
            <input type="text"
                   name="search"
                   placeholder="Search companies..."
                   class="bg-transparent placeholder-black font-semibold text-sm"
                   value="{{ request('search') }}"
            >
        </form>
    </div>
</div>
