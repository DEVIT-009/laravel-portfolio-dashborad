<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Department</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Department</li>
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
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">Department List</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('backend.department.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Add Department
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="departmentsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($departments ?? [] as $index => $department)
                                    <tr>
                                        <td>{{ $department->id ?? 'Blank' }}</td>
                                        <td>{{ $department->name ?? 'Blank' }}</td>
                                        <td>
                                            <div class="d-flex align-items-center" style="gap: 5px;">
                                                <span
                                                    class="d-inline-block rounded-circle {{ $department->status == 'active' ? 'bg-success' : 'bg-danger' }}"
                                                    style="width: 10px; height: 10px;">

                                                </span>
                                                <span class="text-capitalize">
                                                    {{ $department->status ?? 'Blank' }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>{{ $department->created_at->format('d/m/Y') ?? '' }}</td>
                                        <td class="text-nowrap" style="max-width: 120px">
                                            <a
                                                href="{{ route('backend.department.show', $department->id) }}"
                                                class="btn btn-outline-info btn-sm" title="View"
                                            >
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a
                                                href="{{ route('backend.department.edit', $department->id) }}"
                                                class="btn btn-outline-primary btn-sm" title="Edit"
                                            >
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            <form
                                                action="{{ route('backend.department.destroy', $department->id) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this department?');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                                    <i class="fas fa-user-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @if(isset($departments) && $departments->hasPages())
                            <div class="card-footer clearfix">
                                <div class="float-right">
                                    {{ $departments->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
