@props(['employee'])

<div class="card col-span-6">
    <div class="card-header flex font-bold text-xl">
        <a href="{{ route('employee.show', $employee) }}"
           class="text-red-800 hover:text-gray-500">
            {{ ucwords($employee->first_name) . ' ' . ucwords($employee->last_name) }}
        </a>

        <div class="flex ml-auto">
            <form action="{{ route('employee.edit', $employee)}}" method="GET">
                @csrf
                <input class="btn btn-dark mr-6" type="submit" value="EDIT" />
            </form>
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
            <a href="/companies/{{ $employee->company }}" class="dashboard-button">{{ $employee->company }}</a>
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
