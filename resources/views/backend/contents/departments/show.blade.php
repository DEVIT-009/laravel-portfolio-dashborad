<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Department Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('backend.department.index') }}">
                                <i class="fas fa-arrow-left"></i> Departments
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h3 class="card-title text-white">Department Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Department ID:</strong>
                                    <p>{{ $department->id ?? 'Code ERROR'}}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Department Name:</strong>
                                    <p>{{ $department->name ?? 'Name ERROR'}}</p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <strong>Description:</strong>
                                <p>{{ $department->description ?? '-' }}</p>
                            </div>

                            <div class="mb-3">
                                <strong>Status:</strong>
                                @if($department->status === 'active')
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <a href="{{ route('backend.department.edit', $department->id ?? 1) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('backend.department.index') }}" class="btn btn-secondary">
                                    Back
                                </a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
