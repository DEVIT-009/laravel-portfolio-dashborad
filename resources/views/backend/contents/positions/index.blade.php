<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Position</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Position</li>
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
                                    <h3 class="card-title">Position List</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{ route('Backend.position.create') }}" class="btn btn-success">
                                        <i class="fas fa-plus"></i> Add Position
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="positionsTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Department</th>
                                    <th>Level</th>
                                    <th>Managerial</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($positions ?? [] as $position)
                                    <tr>
                                        <td>{{ $position->id }}</td>

                                        <td>{{ $position->title }}</td>

                                        <td>
                                            {{ $position->department->name ?? 'N/A' }}
                                        </td>

                                        <td>{{ $position->level ?? '-' }}</td>

                                        <td>
                                                <span class="badge {{ $position->is_managerial ? 'badge-info' : 'badge-secondary' }}">
                                                    {{ $position->is_managerial ? 'Yes' : 'No' }}
                                                </span>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center" style="gap: 5px;">
                                                    <span
                                                        class="d-inline-block rounded-circle {{ $position->status ? 'bg-success' : 'bg-danger' }}"
                                                        style="width: 10px; height: 10px;">
                                                    </span>
                                                <span>
                                                        {{ $position->status ? 'Active' : 'Inactive' }}
                                                    </span>
                                            </div>
                                        </td>

                                        <td>{{ optional($position->created_at)->format('d/m/Y') }}</td>

                                        <td class="text-nowrap">
                                            <a
                                                href="{{ route('Backend.position.show', $position->id) }}"
                                                class="btn btn-outline-info btn-sm"
                                            >
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a
                                                href="{{ route('Backend.position.edit', $position->id) }}"
                                                class="btn btn-outline-primary btn-sm"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form
                                                action="{{ route('Backend.position.destroy', $position->id) }}"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this position?');"
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
                                        <td colspan="8" class="text-center text-muted">
                                            No positions found.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if(isset($positions) && $positions->hasPages())
                            <div class="card-footer clearfix">
                                <div class="float-right">
                                    {{ $positions->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
