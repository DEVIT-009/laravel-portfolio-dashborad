<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Employee</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Card Header -->
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">Employee List</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('Backend.employee.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Add Employee
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="employeesTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Hire Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($employees ?? [] as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>

                                        <td>{{ $employee->full_name }}</td>

                                        <td>{{ ucfirst($employee->gender) }}</td>

                                        <td>{{ optional($employee->dob)->format('d/m/Y') }}</td>

                                        <td>{{ $employee->department->name ?? 'N/A' }}</td>

                                        <td>{{ $employee->position->title ?? 'N/A' }}</td>

                                        <td>{{ $employee->email }}</td>

                                        <td>
                                            <div class="d-flex align-items-center" style="gap: 5px;">
                                                <span
                                                    class="d-inline-block rounded-circle {{ $employee->status === 'active' ? 'bg-success' : 'bg-danger' }}"
                                                    style="width: 10px; height: 10px;">
                                                </span>
                                                <span>{{ ucfirst($employee->status) }}</span>
                                            </div>
                                        </td>

                                        <td>{{ optional($employee->hire_date)->format('d/m/Y') }}</td>

                                        <td class="text-nowrap">
                                            <a
                                                href="{{ route('Backend.employee.show', $employee->id) }}"
                                                class="btn btn-outline-info btn-sm"
                                            >
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a
                                                href="{{ route('Backend.employee.edit', $employee->id) }}"
                                                class="btn btn-outline-primary btn-sm"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form
                                                action="{{ route('Backend.employee.destroy', $employee->id) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this employee?');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-muted">
                                            No employees found.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if(isset($employees) && $employees->hasPages())
                            <div class="card-footer clearfix">
                                <div class="float-right">
                                    {{ $employees->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
