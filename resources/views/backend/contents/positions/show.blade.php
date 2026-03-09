<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Position Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('backend.position.index') }}">
                                <i class="fas fa-arrow-left"></i> Positions
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Detail</li>
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
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-white">Position Information</h3>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Position ID:</strong>
                                    <p>{{ $position->id ?? 'Code ERROR' }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>Position Title:</strong>
                                    <p>{{ $position->title ?? 'Title ERROR' }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Department:</strong>
                                    <p>{{ $position->department->name ?? 'N/A' }}</p>
                                </div>

                                <div class="col-md-6">
                                    <strong>Level:</strong>
                                    <p>{{ $position->level ?? '-' }}</p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <strong>Description:</strong>
                                <p>{{ $position->description ?? '-' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Managerial:</strong>
                                @if($position->is_managerial)
                                    <span class="badge badge-info">Yes</span>
                                @else
                                    <span class="badge badge-secondary">No</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <strong>Status:</strong>
                                @if($position->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <a href="{{ route('backend.position.edit', $position->id ?? 1) }}"
                                   class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('backend.position.index') }}"
                                   class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
