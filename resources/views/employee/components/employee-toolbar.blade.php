<div class="flex justify-content-center mb-6">
    <a href="{{ route('employee.create') }}" class="btn btn-dark">Add New Employee</a>

    <div class="w-6/12 bg-gray-100 rounded-xl px-3 py-2 ml-8">
        <form method="GET" action="{{ route('employees') }}">
            <input type="text"
                   name="search"
                   placeholder="Search employees..."
                   class="bg-transparent placeholder-black font-semibold text-sm"
                   value="{{ request('search') }}"
            >
        </form>
    </div>
</div>
