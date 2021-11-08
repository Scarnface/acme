<h1>Employees</h1>

@foreach ($employees as $employee)
    <div class="card">
        <div class="card-header">{{ ucwords($employee->first_name) . ' ' . ucwords($employee->last_name) }}</div>
        <div class="card-body">
            <p>{{ $employee->company }}</p>
            <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
            <a href="tel:{{ $employee->phone_number }}">{{ $employee->phone_number }}</a>
        </div>
    </div>
@endforeach
