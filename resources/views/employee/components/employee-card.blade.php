<div class="card col-span-6">
    <div class="card-header flex align-items-center font-bold text-xl">
        @if(Route::current()->getName() != 'employee.show')
            <a href="{{ route('employee.show', $employee) }}"
               class="text-red-800 hover:text-gray-500">
                {{ ucwords($employee->first_name) . ' ' . ucwords($employee->last_name) }}
            </a>
        @else
            <h3 class="mb-0">{{ ucwords($employee->first_name) . ' ' . ucwords($employee->last_name) }}</h3>
        @endif
        <div class="flex ml-auto">
            <a href="{{ route('employee.edit', $employee) }}">
                <input class="btn btn-dark mr-6" type="submit" value="EDIT" />
            </a>
            <form action="{{ route('employee.destroy', $employee)}}" method="POST">
                @method('DELETE')
                @csrf
                <input class="btn btn-dark" type="submit" value="DELETE" />
            </form>
        </div>

    </div>

    <div class="card-body flex justify-content-center align-items-center-center w-full">
        <div class="flex align-items-center justify-content-center w-full">
            <i class="fi-cnluhl-factory-window text-2xl mr-4"></i>
            <a href="/companies/{{ $employee->company_id }}" class="dashboard-button">{{ ucwords($employee->company->name) }}</a>
        </div>
        <div class="flex align-items-center justify-content-center w-full">
            <i class="fi-xwluxl-envelope-wide text-2xl mr-4"></i>
            <a href="mailto:{{ $employee->email }}" class="dashboard-button">{{ $employee->email }}</a>
        </div>
        <div class="flex align-items-center justify-content-center w-full">
            <i class="fi-xwlrxl-phone-wide text-2xl mr-4"></i>
            <a href="tel:{{ $employee->phone_number }}" class="dashboard-button">{{ $employee->phone_number }}</a>
        </div>
    </div>
</div>
